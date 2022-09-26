<x-app-layout>
    <div>
        <div id="top"></div>
        @if(isset($product))
            <div class="lg:w-2/3 m-auto" v-if="product != null">
                <div class="font-cambria text-2xl relative shadow-lg mt-8 text-left p-16 bg-white">
                    <img style="transform:scale(1.4, 1.4)"  class="mb-40 mt-28 m-auto" src="{{ \App\Services\ApiService::api() }}img/settings/product/{{ $product->src2 }}" /><br />

                    <h1  class="font-bold mt-4 mb-4 text-4xl sm:text-2xl md:text-4xl text-left">{{ $product->product_title }}</h1>	

                    <div class="mt-10">
                        <p>{!! $product->product_text !!}</p>
                    </div>

                    <div class="mt-10 mb-10">
                        <a href="/offerte/{{ $product->slug }}" class="text-3xl buttonx tracking-widest uppercase block px-3 py-2 font-semibold text-sm text-center text-white transition-colors duration-200 transform md:inline">
                            {{ $product->product_offer_text }}
                        </a>
                    </div>
                
                </div>

                <div class="m-auto w-full">
                    <x-bigslider images="{{ implode(',', $images) }}"/>
                </div>
            </div>
        @else
            <div>
                Product niet gevonden
            </div>
        @endif
	</div>
</x-app-layout>