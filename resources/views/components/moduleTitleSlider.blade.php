<div>
    @php($imgArr = explode(',', $images))
    <div class="hidden lg:block mt-20" style="transform:scale(1.2, 1.2)">
        <div class="grid grid-cols-3 gap-7 text-white">
            @if(!isset($mat) && !str_contains($imgArr[0], 'http'))
                <a class="cursor-pointer relative col-span-2" href="{{ route('projecten') }}">
                    
                    @if(!str_contains($imgArr[0], 'http'))
                        <img v-if="!images[slideID].includes('http')" class="ml-2" src="{{ asset('img/' . $imgArr[0]) }}" />
                    @else
                        <img v-if="images[slideID].includes('http')" class="ml-2" :src="images[slideID]" />
                    @endif

                    @if(!isset($mat) && !str_contains($imgArr[0], 'http'))
                        <div class="ml-2 absolute w-full bg-red-500 p-2" style="background-color:rgb(82 81 73 / 70%); bottom:16px;">
                            <div class="font-cambria text-2xl">Natuursteen in en om het huis.</div>
                            <div class="text-md">Deze natuursteen projecten moet je gezien hebben.</div>
                        </div>
                    @endif
                </a>
            @else
                <div class="relative col-span-2" v-else>
                    <img v-if="!images[slideID].includes('http')" class="ml-2" :src="require('../../assets/' + images[slideID])" />
                    <img v-if="images[slideID].includes('http')" class="ml-2" :src="images[slideID]" />
                    
                    @if(!isset($mat) && !str_contains($imgArr[0], 'http'))
                        @if(isset($name))
                            <div class="ml-2 absolute bottom-0 w-full bg-red-500 p-2" style="background-color:rgb(82 81 73 / 70%)">
                                <div class="font-cambria text-2xl">Binnenkijken bij onze projecten</div>
                                <div class="text-md">Natuursteen in en om het huis</div>
                            </div>
                        @endif
                    @else
                        <img class="ml-2" src="https://backend.weerstandnatuursteen.nl/img/settings/bigslider/{{ $foto }}" />

                        @if(isset($name))
                            <div class="ml-2 absolute bottom-0 w-full bg-red-500 p-2" style="background-color:rgb(82 81 73 / 70%)">
                                <div class="font-cambria text-2xl">Binnenkijken bij onze projecten</div>
                                <div class="text-md">Natuursteen in en om het huis</div>
                            </div>
                        @endif
                    @endif
                </div>
            @endif

            <div>
                @if(!isset($mat) && !str_contains($imgArr[0], 'http'))
                    <a class="cursor-pointer relative" href="{{ route('collectie') }}">
                        <img src="{{ asset('img/Ervaar onze collectie.jpg') }}" />
                        <div class="absolute bottom-0 text-2xl w-full p-2" style="background-color:rgb(82 81 73 / 70%)">
                            <div class="text-md font-cambria">Ervaar de mooiste materialen in de online collectie</div>
                        </div>
                    </a>
                @else
                    <a class="cursor-pointer relative" href="{{ $matlink }}">
                        <img src="https://backend.weerstandnatuursteen.nl/img/settings/bigslider/{{ $matpic }}" />
                        <div class="absolute bottom-0 text-2xl w-full p-2" style="background-color:rgb(82 81 73 / 70%)">
                            <div class="text-md font-cambria">Materiaal in dit project:<br />{{ $mat }}</div>
                        </div>
                    </a>
                @endif

                @if(!isset($mat) && !str_contains($imgArr[0], 'http'))
                    <div class="relative pt-4">
                        <a href="{{ asset('Natuursteen inspiratie magazine.pdf') }}">
                            <img src="{{ asset('img/passie.jpg') }}" />
                            <div class="absolute bottom-0 text-2xl w-full bg-red-500 p-2" style="background-color:rgb(82 81 73 / 70%)">
                                <div class="text-md font-cambria">Download het natuursteen inspiratie magazine van Weerstand Natuursteen.</div>
                            </div>
                        </a>
                    </div>
                @else
                    <div style="padding-top:30px" class="relative pt-12">
                        <a href="">
                            <img src="https://backend.weerstandnatuursteen.nl/img/settings/bigslider/{{ $plaatfoto }}" />
                            
                            @if(isset($name))
                                <div class="absolute bottom-0 text-2xl w-full bg-red-500 p-2" style="background-color:rgb(82 81 73 / 70%)">
                                    <div class="text-md font-cambria">Download het natuursteen inspiratie magazine van Weerstand Natuursteen.</div>
                                </div>
                            @endif
                        </a>
                    </div>
                @endif

                <div class="relative pt-4" v-else>
                    <img v-if="!matbpic.includes('http')" :src="require('../../assets/' + matbpic)" />
                    <img v-if="matbpic.includes('http')" :src="matbpic" />
                </div>
            </div>
        </div>
    </div>
    @if(!str_contains($imgArr[0], 'http'))
        @if(isset($name))
            <div class="shadow-lg mt-12 text-left p-8 md:p-16 bg-white">
                <div class="block lg:hidden">
                    @if(!str_contains($imgArr[0], 'http'))
                        <img :src="require('../../assets/' + images[slideID])" style="top:100px; max-width:120%; width:120%; margin-left:-10%" class="m-auto" />
                    @else
                        <img :src="images[slideID]" style="top:100px; max-width:120%; width:120%; margin-left:-10%" class="m-auto" />
                    @endif
                </div>

                <h1 class="font-cambria font-bold mt-8 mb-4 text-4xl sm:text-2xl md:text-4xl text-left">{{ $name }}</h1>
                
                @if(isset($bold))
                    <p class="font-cambria pt-8 font-bold text-2xl">{{ $bold }}</p>
                @endif
                
                @if(isset($textA) && isset($textB))
                    <div class="lg:grid grid-cols-2 pt-8">
                        <p class="pt-8 text-xl lg:pr-12">{{ $textA }}</p>
                        <p class="pt-8 text-xl lg:pl-12">{!! $textB !!}</p>
                    </div>
                @endif

                @if(isset($textA) && !isset($textB))
                    <div class="grid grid-cols-1 pt-8">
                        <p class="pt-8 text-xl">{{ $textA }}</p>
                    </div>
                @endif
            </div>
        @else
            <div>&nbsp;<br />&nbsp;</div>
        @endif
    @endif
</div>

<div id="slideID" style="display:none;">0</div>

<script>
    function right() {
        if(this.slideID + 1 >= this.images.length) {
            this.slideID = 0
        } else {
            this.slideID = this.slideID + 1
        }
    },
    function left() {
        if(this.slideID - 1 < 0) {
            this.slideID = this.images.length - 1
        } else {
            this.slideID = this.slideID - 1
        }
    }
</script>
