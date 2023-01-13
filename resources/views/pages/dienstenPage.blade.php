<x-app-layout>
    <x-slot name="meta_title">{{ $service->meta_title }}</x-slot>
    <x-slot name="meta_description">{{ $service->meta_description }}</x-slot>
    <div>
        <div id="top"></div>
        @if($service != null)
            <div class="xl:w-3/4 m-auto" v-if="service != null">
                <div class="hidden lg:block">
                    <x-moduleTitle 
                        name="{{ $service->full_title }}"
                        bold="{{ $service->bold_full }}"
                        textA="{{ $service->text_a_full }}"
                        textB="{{ $service->text_b_full }}"
                    />
                </div>

                <div class="lg:grid 3xl:grid-cols-4 xl:grid-cols-3 grid-cols-2 gap-20">
                    @foreach ($service->activity as $activity)
                        <x-moduleBlockGrid
                            img="{{ \App\Services\ApiService::api() }}img/settings/activity/{{ $activity->src }}"
                            text="{{ $activity->resume }}"
                            link="/pagina/{{ $activity->page->slug }}"
                            linkTxt="{{ $activity->link_text }}"
                            name="{{ $activity->title }}"
                        />
                    @endforeach
                </div>

                <div class="block lg:hidden">
                    <x-moduleTitle 
                        name="{{ $service->full_title }}"
                        bold="{{ $service->bold_full }}"
                        textA="{{ $service->text_a_full }}"
                        textB="{{ $service->text_b_full }}"
                    />
                </div>
            </div>
        @endif
	</div>
</x-app-layout>