<x-app-layout>
    <div>
        <div id="top"></div>
        <div class="lg:w-2/3 m-auto">
            <div class="hidden lg:block">
                <x-moduleTitle name="Diensten"
                    textA="Dagelijks raken wij wel in gedachten verzonken en dromen we even weg in alle mogelijkheden van natuursteen. Een leuke bezigheid, het laat ons elke keer weer beseffen dat de mogelijkheden eindeloos zijn. Die eindeloze opties zorgen er wel eens voor dat onze klanten zoekend de showroom inkomen. Ze hebben een idee… maar de uitwerking? <br />
    <br />
    Wij van Weerstand Natuursteen helpen je graag bij het vormgeven van je wensen in natuursteen. Dat is wat wij het liefste doen! Wij maken natuursteen projecten op maat voor zowel particulieren als bedrijven, grote en kleine projecten.
    "
                    textB="Op onze website kun je veel mogelijkheden van natuursteen verkennen. We stellen je creativiteit op prijs en verwelkomen je graag in onze showroom, zodat je om de tafel kan met onze ontwerper. Met zijn kennis en kunde zullen we er alles aan doen om je wensen te realiseren. Maak dus gerust een afspraak en ontdek de mogelijkheden van natuursteen."
                    button="Afspraak maken"
                    buttonL="contact"
                />
            </div>

            @php
                $right = true;
            @endphp

            @foreach ($services as $service)
                @php
                    $right = $right != true;
                    if($service->page_link == null)
                        $service->page_link = '';
                    
                    if($service->page_link != '')
                        $link = $service->page_link;
                    elseif($service->page != null)
                        $link = '/pagina/' . $service->page->slug;
                    else
                        $link = '/diensten/' . $service->slug;
                @endphp
                
                @if($right)
                    <x-moduleBlock
                        name="{{ $service->title }}"
                        text="{{ $service->resume }}"
                        img="{{ \App\Services\ApiService::api() }}img/settings/service/{{ $service->src }}"
                        link="{{ $link }}"
                        linkTxt="{{ $service->link_text }}"
                        imgRight="{{ $right }}"
                    />
                @else
                    <x-moduleBlock
                        name="{{ $service->title }}"
                        text="{{ $service->resume }}"
                        img="{{ \App\Services\ApiService::api() }}img/settings/service/{{ $service->src }}"
                        link="{{ $link }}"
                        linkTxt="{{ $service->link_text }}"
                    />
                @endif
            @endforeach

            <div class="block lg:hidden">
                <ModuleTitle name="Diensten"
                    textA="Dagelijks raken wij wel in gedachten verzonken en dromen we even weg in alle mogelijkheden van natuursteen. Een leuke bezigheid, het laat ons elke keer weer beseffen dat de mogelijkheden eindeloos zijn. Die eindeloze opties zorgen er wel eens voor dat onze klanten zoekend de showroom inkomen. Ze hebben een idee… maar de uitwerking? <br />
                            <br />
                            Wij van Weerstand Natuursteen helpen je graag bij het vormgeven van je wensen in natuursteen. Dat is wat wij het liefste doen! Wij maken natuursteen projecten op maat voor zowel particulieren als bedrijven, grote en kleine projecten."
                    textB="Op onze website kun je veel mogelijkheden van natuursteen verkennen. We stellen je creativiteit op prijs en verwelkomen je graag in onze showroom, zodat je om de tafel kan met onze ontwerper. Met zijn kennis en kunde zullen we er alles aan doen om je wensen te realiseren. Maak dus gerust een afspraak en ontdek de mogelijkheden van natuursteen."
                    button="Afspraak maken"
                    buttonL="/contact"
                />
            </div>
        </div>
    </div>
</x-app-layout>