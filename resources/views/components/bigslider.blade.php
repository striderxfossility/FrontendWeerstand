@php($imgArr = explode(',', $images))

<div>
    <div v-if="images.length > 0">
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

    setInterval(Right, 4000)

    Right()

    function Right()
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
</script>