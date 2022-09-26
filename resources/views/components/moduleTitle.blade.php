<div class="relative shadow-lg pb-20 mt-12 text-left p-16 bg-white">
    <h1 class="font-bold font-cambria mt-4 text-4xl sm:text-2xl md:text-4xl text-left">
        {{ $name }}
    </h1>
    
    @if(isset($bold))
        <p class="font-cambria pt-4 font-bold text-2xl">{{ $bold }}</p>
    @endif

    @if($textA != '' && $textB != '')
        <div class="lg:grid grid-cols-2 pt-4">
            <p class="pt-8 text-xl lg:pr-12">{!! $textA !!}</p>
            <p class="pt-8 text-xl lg:pl-12">{!! $textB !!}</p>
        </div>
    @endif

    @if($textA != '' && $textB == '')
        <div class="grid grid-cols-1 pt-4">
            <p class="pt-8 text-xl">{!! $textA !!}}</p>
        </div>
    @endif

    @if(isset($button))
        <div class="lg:absolute pt-10" style="left:4rem; bottom:2rem">
            <a href="{{ route($buttonL) }}" class="text-sm font-cambria buttonx tracking-widest uppercase block px-3 py-2 font-semibold text-sm text-center text-white transition-colors duration-200 transform md:inline">
                {{ $button }}
            </a>
        </div>
    @endif
</div>