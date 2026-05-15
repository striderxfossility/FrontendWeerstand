#!/usr/bin/env sh
set -eu

if ! command -v kubectl >/dev/null 2>&1; then
  echo "kubectl is required" >&2
  exit 1
fi

: "${APP_IMAGE:?APP_IMAGE is required}"
K8S_NAMESPACE="${K8S_NAMESPACE:-default}"
K8S_DEPLOYMENT_NAME="${K8S_DEPLOYMENT_NAME:-weerstandnatuursteen-frontend}"
K8S_CONTAINER_NAME="${K8S_CONTAINER_NAME:-app}"
INGRESS_HOST="${INGRESS_HOST:-weerstandnatuursteen.nl}"
INGRESS_CLASS="${INGRESS_CLASS:-nginx}"
INGRESS_TLS_SECRET="${INGRESS_TLS_SECRET:-weerstandnatuursteen-frontend-tls}"
CERT_MANAGER_CLUSTER_ISSUER="${CERT_MANAGER_CLUSTER_ISSUER:-certmanager-cert-manager}"
CACHE_WARMER_CRON_SCHEDULE="${CACHE_WARMER_CRON_SCHEDULE:-*/3 * * * *}"

tmp_deployment_manifest="$(mktemp)"
tmp_service_manifest="$(mktemp)"
tmp_cache_urls_manifest="$(mktemp)"
tmp_ingress_manifest="$(mktemp)"
tmp_certificate_manifest="$(mktemp)"
tmp_cache_warmer_manifest="$(mktemp)"
trap 'rm -f "$tmp_deployment_manifest" "$tmp_service_manifest" "$tmp_cache_urls_manifest" "$tmp_ingress_manifest" "$tmp_certificate_manifest" "$tmp_cache_warmer_manifest"' EXIT

if ! kubectl -n "$K8S_NAMESPACE" get secret weerstandnatuursteen-frontend-urls >/dev/null 2>&1; then
  echo "Missing secret: weerstandnatuursteen-frontend-urls in namespace $K8S_NAMESPACE" >&2
  echo "Create/apply it first (for example from k8s/app-urls-secret.yaml)." >&2
  exit 1
fi

if [ -z "$(kubectl -n "$K8S_NAMESPACE" get secret weerstandnatuursteen-frontend-urls -o jsonpath='{.data.APP_KEY}' 2>/dev/null)" ]; then
  echo "Secret weerstandnatuursteen-frontend-urls is missing key APP_KEY in namespace $K8S_NAMESPACE" >&2
  exit 1
fi

cp k8s/cache-warmer-urls-configmap.yaml "$tmp_cache_urls_manifest"
kubectl -n "$K8S_NAMESPACE" apply -f "$tmp_cache_urls_manifest"

sed \
  -e "s|\${APP_IMAGE}|$APP_IMAGE|g" \
  k8s/deployment.yaml > "$tmp_deployment_manifest"
kubectl -n "$K8S_NAMESPACE" apply -f "$tmp_deployment_manifest"

cp k8s/service.yaml "$tmp_service_manifest"
kubectl -n "$K8S_NAMESPACE" apply -f "$tmp_service_manifest"

sed \
  -e "s|\${INGRESS_HOST}|$INGRESS_HOST|g" \
  -e "s|\${INGRESS_CLASS}|$INGRESS_CLASS|g" \
  -e "s|\${INGRESS_TLS_SECRET}|$INGRESS_TLS_SECRET|g" \
  k8s/ingress.yaml > "$tmp_ingress_manifest"
kubectl -n "$K8S_NAMESPACE" apply -f "$tmp_ingress_manifest"

sed \
  -e "s|\${INGRESS_HOST}|$INGRESS_HOST|g" \
  -e "s|\${INGRESS_TLS_SECRET}|$INGRESS_TLS_SECRET|g" \
  -e "s|\${CERT_MANAGER_CLUSTER_ISSUER}|$CERT_MANAGER_CLUSTER_ISSUER|g" \
  k8s/certificate.yaml > "$tmp_certificate_manifest"
kubectl -n "$K8S_NAMESPACE" apply -f "$tmp_certificate_manifest"

sed \
  -e "s|\${CACHE_WARMER_CRON_SCHEDULE}|$CACHE_WARMER_CRON_SCHEDULE|g" \
  k8s/cache-warmer-cronjob.yaml > "$tmp_cache_warmer_manifest"
kubectl -n "$K8S_NAMESPACE" apply -f "$tmp_cache_warmer_manifest"

kubectl -n "$K8S_NAMESPACE" set image deployment/"$K8S_DEPLOYMENT_NAME" \
  "$K8S_CONTAINER_NAME"="$APP_IMAGE" --record=false
kubectl -n "$K8S_NAMESPACE" rollout status deployment/"$K8S_DEPLOYMENT_NAME" --timeout=180s
