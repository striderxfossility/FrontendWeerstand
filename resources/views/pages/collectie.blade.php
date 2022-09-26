<x-app-layout>
    <div>
        <div id="top">&nbsp;</div>
        <div class="lg:w-2/3 m-auto">
            <div class="hidden lg:block">
                <x-moduleTitle
                    name="Collectie" 
                    textA="De natuur heeft een enorme diversiteit aan natuursteen voor ons. Er is zoveel moois op deze aarde te vinden. Elk materiaal heeft bijzondere eigenschappen; keihard, tijdloos of een duizelingwekkend patroon? De aarde ontvouwt haar schatten in onze collectie van marmer, kwartsiet en graniet.
                            Wij zijn naast gepassioneerde natuursteenbewerkers ook trotse dealer van o.a. Dekton, Neolith en Silestone. "
                    textB="Esthetisch zijn deze materialen prachtig en het onderhoud is eenvoudiger dan natuursteen. Het materiaal stelt u in staat uw design dromen waar te maken! Het is niet voor niets dat architecten en interieurstylisten graag met deze materialen werken."
                />
            </div>

            <div class="lg:grid 3xl:grid-cols-4 xl:grid-cols-3 grid-cols-2 gap-20">
                @foreach ($collections as $collection)

                    @php
                        if($collection->page_link == null)
                            $collection->page_link = '';

                        if($collection->page_link != '')
                            $link = $collection->page_link;
                        elseif($collection->page != null)
                            $link = '/pagina/' . $collection->page->slug;
                        else
                            $link = '/collectie/' . $collection->slug;
                    @endphp

                    <x-moduleBlockGrid
                        name="{{ $collection->title }}"
                        text="{{ $collection->text_resume }}"
                        img="{{ \App\Services\ApiService::api() }}img/settings/collection/{{ $collection->src }}"
                        link="{{ $link }}"
                        linkTxt="{{ $collection->link_text }}"
                        bold="{{ $collection->bold_resume }}"
                    />
                @endforeach
            </div>

            <div class="block lg:hidden">
                <ModuleTitle
                    name="Collectie" 
                    textA="De natuur heeft een enorme diversiteit aan natuursteen voor ons. Er is zoveel moois op deze aarde te vinden. Elk materiaal heeft bijzondere eigenschappen; keihard, tijdloos of een duizelingwekkend patroon? De aarde ontvouwt haar schatten in onze collectie van marmer, kwartsiet en graniet. "
                    textB="Wij zijn naast gepassioneerde natuursteenbewerkers ook trotse dealer van o.a. Dekton, Neolith en Silestone. Op de vlakken van esthetiek en onderhoudsgemak zijn deze merken steengoed. Het materiaal stelt u in staat u design dromen waar te maken! Het is niet voor niets dat architecten en interieurstylisten graag met deze materialen werken."
                />
            </div>
        </div>
    </div>
</x-app-layout>
