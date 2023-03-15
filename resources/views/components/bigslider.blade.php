@php($imgArr = explode(',', $images))

<div>
    <div class="relative">
        <div onclick="Left()" style="top: 200px; background: #54534a; left:-100px; z-index:3;" class="cursor-pointer absolute h-20 w-20 bg-slate-500 hover:bg-slate-400 text-white text-center">
            <i style="font-size:40px; margin-top: 18px;" class="fa-solid fa-chevron-left"></i>
        </div>
        <div onclick="Right()" style="top: 200px; background: #54534a; z-index:3; right: -105px;" class="cursor-pointer absolute h-20 w-20 bg-slate-500 hover:bg-slate-400 text-white text-center">
            <i style="font-size:40px;margin-top: 18px; " class="fa-solid fa-chevron-right"></i>
        </div>
        @if(isset($router))
            @foreach ($imgArr as $key => $image)
                <div class="mt-32" id="image-{{ $key }}" style="display:none; transform:scale(1.2, 1.2)">
                    <a class="cursor-pointer relative col-span-2" href="{{ route('projecten') }}">

                        @if(!str_contains($image, 'http'))
                            <img class="m-auto" src="{{ asset('img/' . $image) }}" />
                        @else
                            <img class="m-auto" src="{{ $image }}" />
                        @endif
                    </a>
                </div>
            @endforeach
        @else
            @foreach ($imgArr as $key => $image)
                <div class="mt-32" id="image-{{ $key }}" style="display:none; transform:scale(1.2, 1.2)">
                    <div class="relative col-span-2">
                        @if(!str_contains($image, 'http'))
                            <img class="m-auto mb-16" src="{{ asset('img/' . $image) }}" />
                        @else
                            <img class="m-auto mb-16" src="{{ $image }}" />
                        @endif
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>

<script>
    let image = 0

    let intervalF = setInterval(Right, 4000)

    Right_Auto()

    function Right_Auto()
    {
        if(image + 1 >= {{ count($imgArr) }}) {
            image = 0
        } else {
            image = image + 1
        }

        for (let index = 0; index < {{ count($imgArr) }}; index++) {
            document.getElementById('image-' + index).style.display = 'none';
        }

        document.getElementById('image-' + image).style.display = 'block';
    }

    function Right()
    {
        clearInterval( intervalF );

        if(image + 1 >= {{ count($imgArr) }}) {
            image = 0
        } else {
            image = image + 1
        }

        for (let index = 0; index < {{ count($imgArr) }}; index++) {
            document.getElementById('image-' + index).style.display = 'none';
        }

        document.getElementById('image-' + image).style.display = 'block';
    }

    function Left()
    {
        clearInterval( intervalF );

        if(image - 1 <= 0) {
            image = {{ count($imgArr) }} - 1
        } else {
            image = image - 1
        }

        for (let index = 0; index < {{ count($imgArr) }}; index++) {
            document.getElementById('image-' + index).style.display = 'none';
        }

        document.getElementById('image-' + image).style.display = 'block';
    }
</script>