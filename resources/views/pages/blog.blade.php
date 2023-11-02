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
                @foreach ($blogs as $blog)

                    @php
                        if($blog->page_link == null)
                            $blog->page_link = '';

                        if($blog->page_link != '')
                            $link = $blog->page_link;
                        elseif($blog->page != null)
                            $link = '/pagina/' . $blog->page->slug;
                        else
                            $link = '/blog/' . $blog->slug;
                    @endphp

                    <x-moduleBlockGrid
                        name="{{ $blog->title }}"
                        text="{{ $blog->text_resume }}"
                        img="{{ \App\Services\ApiService::api() }}img/settings/blog/{{ $blog->src }}"
                        link="{{ $link }}"
                        linkTxt="{{ $blog->link_text }}"
                        bold="{{ $blog->bold_resume }}"
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
