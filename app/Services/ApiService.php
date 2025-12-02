<?php

namespace App\Services;
use GuzzleHttp\Client;

class ApiService {
    public static function get($url)
    {
        $backendUrl = env('APP_BACKEND_URL', 'https://backend.weerstandnatuursteen.nl/');
        
        try {
            $response = file_get_contents($backendUrl . 'api/' . $url);
            return json_decode($response);
        } catch (\Exception $e) {
            return null;
        }
    }

    public static function api()
    {
        return env('APP_BACKEND_URL', 'https://backend.weerstandnatuursteen.nl/');
    }
}