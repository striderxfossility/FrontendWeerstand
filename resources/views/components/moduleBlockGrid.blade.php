<div class="relative shadow-lg mt-12 text-center lg:pb-8 bg-white w-full md:w-1/2 lg:w-full m-auto h-full">

    <div class="">
        @if(isset($link))
            <a href="{{ $link }}">
                @if($img != '' && !str_contains($img, 'http'))
                    <img src="{{ asset('img/' . $img) }}" style="transform:scale(1.1, 1)" class="w-full scale-100 mt-6 h-auto m-auto" />
                @else
                    <img src="{{ $img }}" style="transform:scale(1.1, 1)" class="w-full scale-100 mt-6 h-auto m-auto" />
                @endif
            </a>
        @else
            <div>
                @if($img != '' && !str_contains($img, 'http'))
                    <img src="{{ asset('img/' . $img) }}" style="transform:scale(1.1, 1)" class="w-full scale-100 mt-6 h-auto m-auto" />
                @else
                    <img src="{{ $img }}" style="transform:scale(1.1, 1)" class="w-full scale-100 mt-6 h-auto m-auto" />
                @endif
            </div>
        @endif
    </div>

    <div class="p-4">
        <h2 v-if="name" class="font-cambria mb-4 text-left font-bold text-4xl">
            @if(isset($link))
                <a href="{{ $link }}">
                    {{ $name }}
                </a>
            @else
                <div>
                    {{ $name }}
                </div>
            @endif
        </h2>

        @if(isset($bold))
            <p class="font-bold text-left text-xl">
                {{ $bold }}
            </p>
        @endif

        @if(isset($text))
            <p class="pt-4 text-left text-xl">
                {{ $text }}
            </p>
        @endif

        @if(isset($link) && isset($name) && isset($text))
            <div class="lg:absolute bottom-0 my-4 lg:my-10">
                <a href="{{ $link }}" class="font-cambria buttonx tracking-widest uppercase block px-3 py-2 font-semibold text-sm text-center text-white transition-colors duration-200 transform md:inline">
                    {{ $linkTxt }}
                </a>
            </div>
        @endif

        @if(isset($offer))
            @if($offer)
                <div class="lg:absolute bottom-0 my-4 lg:my-10">
                    <div onclick="popup('{{ str_replace(' ', '', $name) }}')" class="cursor-pointer font-cambria buttonx tracking-widest uppercase block px-3 py-2 font-semibold text-sm text-center text-white transition-colors duration-200 transform md:inline">
                        Offerte aanvragen
                    </div>
                </div>
            @endif
        @endif

        @if(isset($link) && !isset($name) && !isset($text))
            <div class="bottom-0 mt-10 my-4">
                <a href="{{ $link }}" class="font-cambria buttonx tracking-widest uppercase block px-3 py-2 font-semibold text-sm text-center text-white transition-colors duration-200 transform md:inline">
                    {{ $linkTxt }}
                </a>
            </div>
        @endif

        @if(isset($subTitle))
            <div>

                @if(isset($name))
                    <h2 class="font-cambria mb-4 text-left font-bold text-3xl">{{ $subTitle }}</h2>
                @endif

                @if(isset($subText))
                    <p  class="pt-4 text-left text-xl">{{ $subText }}</p>
                @endif

                @if(isset($subLink))
                    <div class="lg:absolute bottom-0 my-4 lg:my-10">
                        <a href="{{ $link }}" class="font-cambria buttonx tracking-widest uppercase block px-3 py-2 font-semibold text-sm text-center text-white transition-colors duration-200 transform md:inline">
                            {{ $subLinkTxt }}
                        </a>
                    </div>
                @endif
            </div>
        @endif
    </div>

    <div style="background-color:rgb(82 81 73 / 43%); z-index:20; display:none;" class="w-full h-full m-auto shadow-lg rounded m-20 fixed left-0 top-0 text-white p-10 text-2xl"  id="popupOfferForm-{{ str_replace(' ', '', $name) }}"> 
        <div class="bg-white text-gray-600 w-auto p-20 px-40 m-5">
            <div class="text-4xl font-bold mb-10">Offerte voor vensterbanken aanvragen</div>
            <div class="grid grid-cols-3 text-left">
                <div class="p-2">
                    <div class="font-bold">Naam</div>
                    <div><input id="name" class="p-2 rounded border-2 border-green-400 w-full" type="text" /></div>
                </div>

                <div class="p-2">
                    <div class="font-bold">E-Mail</div>
                    <div><input id="email" class="p-2 rounded border-2 border-green-400 w-full" type="text" /></div>
                </div>

                <div class="p-2">
                    <div class="font-bold">Telefoonnummer</div>
                    <div><input id="mobile" class="p-2 rounded border-2 border-green-400 w-full" type="text" /></div>
                </div>
            </div>

            <div class="grid grid-cols-2 text-left mt-10">
                <div class="p-2">
                    <div class="font-bold">Afmeting</div>
                    <div><input id="measurement" class="p-2 rounded border-2 border-green-400 w-full" type="text" /></div>
                </div>

                <div class="p-2">
                    <div class="font-bold">Dikte</div>
                    <div><input id="thickness" class="p-2 rounded border-2 border-green-400 w-full" type="text" /></div>
                </div>
            </div>

            <div class="text-left mt-10">
                <div class="p-2">
                    <div class="font-bold">Bericht</div>
                    <div><textarea id="description" class="p-2 rounded h-40 border-green-400 border-2 w-full"></textarea></div>
                </div>
            </div>

            <input id="mat-{{ str_replace(' ', '', $name) }}" type="hidden" />

            <div class="text-right mt-10">
                <div class="p-2 text-right">
                    <div onclick="send('{{ str_replace(' ', '', $name) }}')" class="cursor-pointer bg-green-500 text-white p-2 w-40 text-center">Verzenden</div>
                </div>
            </div>

            <div class="fixed top-20 right-20 cursor-pointer" v-on:click="close">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
function popup(mat)
{
    document.getElementById('popupOfferForm-' + mat).style.display = "block"
    document.getElementById('mat-' + mat).value = mat
}

function send(mat)
{
    let form = {
        name : document.getElementById('name').value,
        email : document.getElementById('email').value,
        mobile : document.getElementById('mobile').value,
        measurement : document.getElementById('measurement').value,
        thickness : document.getElementById('thickness').value,
        description : document.getElementById('description').value,
        material : mat
    }

    jQuery.ajax({
        url: "{{ \App\Services\ApiService::api() }}api/offerWindowSillForm",
        method: 'post',
        data: {form: form},
        success: function(result) 
        {
            console.log(result)
            document.getElementById('popupOfferForm-' + mat).style.display = "none"
        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            alert(thrownError);
        }
    });
}
</script>