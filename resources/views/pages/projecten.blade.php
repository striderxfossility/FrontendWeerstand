<x-app-layout>
    <div>
        <div id="top"></div>
        <div class="lg:w-2/3 m-auto">
            <div class="hidden lg:block">
                <x-moduleTitle name="Projecten" 
                    textA="Onze passie en liefde voor natuursteen uiten zich in ons portfolio. Dankzij het vertrouwen van onze klanten kunnen wij dagelijks werken met onze geliefde materialen. Daar zijn we dankbaar voor en trots op! Elk project komt tot stand door samen met onze klant esthetische en praktische zaken af te wegen. Samen komen we steeds tot een fantastisch ontwerp waar men jarenlang plezier van heeft. "
                    textB="We kunnen veel vertellen over natuursteen en onze projecten, maar we laten het liever gewoon zien.  Laat je inspireren door bijzondere materialen, ontwerpen en details op deze pagina gevuld met onze recente projecten."
                />
            </div>

			<div class="lg:grid 3xl:grid-cols-4 xl:grid-cols-3 grid-cols-2 gap-20">
                @foreach ($projects as $project)
                    <x-moduleBlockGrid
                        name="{{ $project->title }}"
                        text="{{ $project->resume }}"
                        img="{{ \App\Services\ApiService::api() }}img/settings/project/{{ $project->src }}"
                        link="/projecten/{{ $project->slug }}"
                        linkTxt="{{ $project->link_text }}"
                    />
                @endforeach
			</div>

            <div class="block lg:hidden">
                <x-moduleTitle name="Projecten" 
                    textA="Onze passie en liefde voor natuursteen uiten zich in ons portfolio. Dankzij het vertrouwen van onze klanten kunnen wij dagelijks werken met onze geliefde materialen. Daar zijn we dankbaar voor en trots op! Elk project komt tot stand door samen met onze klant esthetische en praktische zaken af te wegen. Samen komen we steeds tot een fantastisch ontwerp waar men jarenlang plezier van heeft. "
                    textB="We kunnen veel vertellen over natuursteen en onze projecten, maar we laten het liever gewoon zien.  Laat je inspireren door bijzondere materialen, ontwerpen en details op deze pagina gevuld met onze recente projecten."
                />
            </div>
		</div>
	</div>
</x-app-layout>