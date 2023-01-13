<x-app-layout>
    <x-slot name="meta_title">{{ $collection->meta_title }}</x-slot>
    <x-slot name="meta_description">{{ $collection->meta_description }}</x-slot>
    <div>
        <div id="top"></div>

        @if($collection != null)
            <div class="xl:w-3/4 m-auto">

                <div class="mt-40 hidden lg:block">
                    <x-moduleTitle
                        name="{{ $collection->full_title }}"
                        bold="{{ $collection->bold_full }}"
                        textA="{{ $collection->text_a_full }}"
                        textB="{{ $collection->text_b_full }}"
                        button="Neem contact met ons op"
                        buttonL="contact"
                    />
                </div>

                <div class="lg:grid 3xl:grid-cols-4 xl:grid-cols-3 grid-cols-2 gap-20">
                    
                    @foreach ($collection->product as $product)
                        <div>
                            @if($product->product_title != '' && $collection->slug != 'standaard')
                                <x-moduleBlockGrid
                                    img="{{ \App\Services\ApiService::api() }}img/settings/product/{{ $product->src }}"
                                    text="{{ $product->resume }}"
                                    name="{{ $product->title }}"
                                    link="/collectie-product/{{ $collection->slug }}/{{ $product->slug }}"
                                    linkTxt="{{ $product->title }}"
                                    offer="{{ $collection->slug == 'standaard' }}"
                                />
                            @else
                                <x-moduleBlockGrid
                                    img="{{ \App\Services\ApiService::api() }}img/settings/product/{{ $product->src }}"
                                    text="{{ $product->resume }}"
                                    name="{{ $product->title }}"
                                    offer="{{ $collection->slug == 'standaard' }}"
                                />
                            @endif
                        </div>
                    @endforeach
                </div>

                <div class="mt-40 block lg:hidden">
                    <x-moduleTitle
                        name="{{ $collection->full_title }}"
                        bold="{{ $collection->bold_full }}"
                        textA="{{ $collection->text_a_full }}"
                        textB="{{ $collection->text_b_full }}"
                        button="Neem contact met ons op"
                        buttonL="contact"
                    />
                </div>
            </div>
        @endif
    </div>
</x-app-layout>