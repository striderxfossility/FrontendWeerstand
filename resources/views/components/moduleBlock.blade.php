<div class="relative mt-12 p-4 text-center md:text-left bg-white">
    <div class="z-10 md:flex relative">
        @if(!isset($imgRight))
            <div class="md:flex-none py-10 md:pl-4">
                @if(isset($link))
                    <a href="{{ $link }}">
                        @if(!str_contains($img, 'http'))
                            <a href="{{ route($link) }}">
                                <img src="{{ asset('img/' . $img) }}" class="object-cover m-auto" />
                            </a>
                        @else
                            <img src="{{ $img }}" class="object-cover m-auto" />
                            @endif
                    </a>
                @else
                    <div>
                        @if(!str_contains($img, 'http'))
                            <a href="{{ $link }}">
                                <img src="{{ asset('img/' . $img) }}" class="object-cover m-auto" />
                            </a>
                        @else
                            <img src="{{ $img }}" class="object-cover m-auto" />
                        @endif
                    </div>
                @endif
            </div>
        @else
            <div class="md:flex-none md:hidden py-10 md:pr-4">
                @if(isset($link))
                    <a href="{{ $link }}">
                        @if(!str_contains($img, 'http'))
                            <img src="{{ asset('img/' . $img) }}" class="object-cover m-auto" />
                        @else
                            <img src="{{ $img }}" class="object-cover m-auto" />
                        @endif
                    </a>
                @else
                    <div>
                        @if(!str_contains($img, 'http'))
                            <a href="{{ $link }}">
                                <img src="{{ asset('img/' . $img) }}" class="object-cover m-auto" />
                            </a>
                        @else
                            <img src="{{ $img }}" class="object-cover m-auto" />
                        @endif
                    </div>
                @endif
            </div>
        @endif

        <div class="md:flex-1 p-8">
            <a href="{{ $link }}"><h2 class="font-cambria mb-4 font-bold text-4xl">{{ $name }}</h2></a>
            <p class="text-xl">
                {{ $text }}
            </p>
            @if(isset($link))
                <div class="bottom-0 my-8 w-full left-0 ">
                    @if(!str_contains($link, 'http'))
                        <a href="{{ $link }}" class="font-cambria buttonx tracking-widest uppercase block px-3 py-2 font-semibold text-sm text-center text-white transition-colors duration-200 transform md:inline">
                            {{ $linkTxt }}
                        </a>
                    @else
                        <a href="{{ $link }}" class="font-cambria buttonx tracking-widest uppercase block px-3 py-2 font-semibold text-sm text-center text-white transition-colors duration-200 transform md:inline">
                            {{ $linkTxt }}
                        </a>
                    @endif
                </div>
            @endif
        </div>

        @if(isset($imgRight))
            <div class="md:flex-none hidden md:block py-10 md:pr-4">
                @if(isset($link))
                    <a href="{{ $link }}">
                        @if(!str_contains($img, 'http'))
                            <img src="{{ asset('img/' . $img) }}" class="object-cover m-auto" />
                        @else
                            <img src="{{ $img }}" class="object-cover m-auto" />
                        @endif
                    </a>
                @else
                    <div>
                        @if(!str_contains($img, 'http'))
                            <img src="{{ asset('img/' . $img) }}" class="object-cover m-auto" />
                        @else
                            <img src="{{ $img }}" class="object-cover m-auto" />
                        @endif
                    </div>
                @endif
            </div>
        @endif
    </div>

    @if(!isset($imgRight))
        <div class="shadow-lg absolute z-0 left-0 overflow-hidden top-0 w-screen h-full bg-white"></div>
    @else
        <div v-if="imgRight" class="absolute shadow-lg z-0 right-0 overflow-hidden top-0 w-screen h-full bg-white"></div>
    @endif
</div>