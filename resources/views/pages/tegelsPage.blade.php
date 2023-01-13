<x-app-layout>
    <x-slot name="meta_title">{{ $tegel->meta_title }}</x-slot>
    <x-slot name="meta_description">{{ $tegel->meta_description }}</x-slot>
    <div>
        <div id="top"></div>
		<div class="xl:w-3/4 m-auto" v-if="tile != null">
			<x-moduleTitle 
                name="{{ $tegel->full_title }}"
                bold="{{ $tegel->bold_full }}"
                textA="{{ $tegel->text_a_full }}"
                textB="{{ $tegel->text_b_full }}"
                button="Neem contact met ons op"
                buttonL="contact"
			/>

			<div class="lg:grid 3xl:grid-cols-4 xl:grid-cols-3 grid-cols-2 gap-20">
                @foreach ($tegel->floor as $floor)
                    <x-moduleBlockGrid
                        img="{{ \App\Services\ApiService::api() }}img/settings/floor/{{ $floor->src }}"
                        text="{{ $floor->resume }}"
                        name="{{ $floor->title }}"
                    />
                @endforeach
			</div>
		</div>
	</div>
</x-app-layout>