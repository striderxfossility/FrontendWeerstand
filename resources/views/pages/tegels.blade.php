<x-app-layout>
    <div>
        <div id="top"></div>
        <div class="lg:w-2/3 m-auto">
            <div class="hidden lg:block">
                <x-moduleTitle
                    name="Vloeren" 
                    textA="Het kiezen van een natuurstenen vloer voor binnen of buiten kan voelen als een oneindige queste. Zo sta je niet alleen voor de keuze van het materiaal maar ook van afmeting, randafwerking, legverband en materiaalafwerking. Wij hebben deze queste meermaals gemaakt en zijn steeds weer op zoek naar de mooiste natuursteenvloeren."
                    textB="Onze persoonlijke connecties met natuursteengroeves verspreid over heel Europa hebben geleid tot een fraai assortiment van unieke vloeren. Alleen de mooiste en beste krijgt een plekje in onze exclusieve selectie.
                        Je merkt al dat wij er alles aan doen om jouw droomvloer te realiseren. We gaan zelfs zover dat we vloeren op maat zagen op jouw verzoek. Op deze manier is het mogelijk zelf natuursteen platen te selecteren waarvan we jouw vloer zagen.
                        <br /><br />
                        De vloer binnen, buiten of laten doorlopen van binnen naar buiten? We adviseren je graag over de mogelijkheden en eigenschappen van het materiaal van jouw voorkeur."
                />
            </div>

            <div class="lg:grid 3xl:grid-cols-4 xl:grid-cols-3 grid-cols-2 gap-20">
                @foreach ($tegels as $tegel)

                    @php
                        if($tegel->page_link == null)
                            $tegel->page_link = '';

                        if($tegel->page_link != '')
                            $link = $tegel->page_link;
                        elseif($tegel->page != null)
                            $link = '/pagina/' . $tegel->page->slug;
                        else
                            $link = '/tegels/' . $tegel->slug;
                    @endphp

                    <x-moduleBlockGrid
                        name="{{ $tegel->title }}"
                        text="{{ $tegel->text_resume }}"
                        img="{{ \App\Services\ApiService::api() }}img/settings/tile/{{ $tegel->src }}"
                        link="{{ $link }}"
                        linkTxt="{{ $tegel->link_text }}"
                        bold="{{ $tegel->bold_resume }}"
                    />
                @endforeach
            </div>

            <div class="block lg:hidden">
                <x-moduleTitle
                    name="Vloeren" 
                    textA=""
                    textB=""
                />
            </div>
        </div>
    </div>
</x-app-layout>