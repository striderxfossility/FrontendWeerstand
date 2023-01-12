<x-app-layout>
    <div>
        <div id="top"></div>
        @if($project != null)
            <div class="lg:w-2/3 m-auto">
                <div class="font-cambria text-2xl relative shadow-lg mt-8 text-left p-16 bg-white">
                    @foreach ($project->components as $component)
                        <div>
                            
                            <!--bigslider-->
                            @if($component->name == "bigslider")
                                <ModuleTitleSlider class="mt-4 mb-12"
                                    :images="imgarr('bigslider', component)"
                                    :mat="component.material"
                                    :matlink="component.material_link"
                                    :matpic="this.api + 'img/settings/bigslider/' + component.src"
                                    :matbpic="this.api + 'img/settings/bigslider/' + component.src1"
                                />
                            @endif

                            <!--title-->
                            @if($component->name == "title")
                                <h1 class="font-bold mt-4 mb-4 text-4xl sm:text-2xl md:text-4xl text-left">
                                    {{ $component->title }}
                                </h1>
                            @endif

                            <!--h2-->
                            @if($component->name == "h2")
                                <h2 class="font-bold mt-4 mb-4 text-4xl sm:text-2xl md:text-4xl text-left">
                                    {{ $component->title }}
                                </h2>
                            @endif

                            <!--h3-->
                            @if($component->name == "h3")
                                <h3 class="font-bold mt-4 mb-4 text-4xl sm:text-2xl md:text-4xl text-left">
                                    {{ $component->title }}
                                </h3>
                            @endif

                            <!--h4-->
                            @if($component->name == "h4")
                                <h4 class="font-bold mt-4 mb-4 text-4xl sm:text-2xl md:text-4xl text-left">
                                    {{ $component->title }}
                                </h4>
                            @endif

                            <!--text-->
                            @if($component->name == "text")
                                <div class="mt-4">
                                    @if(!$component->bold)
                                        <p>
                                            {!! $component->text !!}
                                        </p>
                                    @else
                                        <p class="font-bold">
                                            {!! $component->text !!}
                                        </p>
                                    @endif
                                </div>
                            @endif

                            <!--button-->
                            @if($component->name == "button")
                                <div class="mt-4">
                                    <a href="{{ $component->link }}" class="text-3xl buttonx tracking-widest uppercase block px-3 py-2 font-semibold text-sm text-center text-white transition-colors duration-200 transform md:inline">
                                        {{ $component->link_text }}
                                    </a>
                                </div>
                            @endif
                            
                            <!--slider-->
                            @if($component->name == "slider")

                                @php
                                    $images = [];

                                    if($component->src != '' && !str_contains($component->src, '/tmp/')) 
                                        array_push($images, \App\Services\ApiService::api() . 'img/settings/slider/' . $component->src);

                                    if($component->src1 != '' && !str_contains($component->src1, '/tmp/')) 
                                        array_push($images, \App\Services\ApiService::api() . 'img/settings/slider/' . $component->src1);

                                    if($component->src2 != '' && !str_contains($component->src2, '/tmp/')) 
                                        array_push($images, \App\Services\ApiService::api() . 'img/settings/slider/' . $component->src2);

                                    if($component->src3 != '' && !str_contains($component->src3, '/tmp/')) 
                                        array_push($images, \App\Services\ApiService::api() . 'img/settings/slider/' . $component->src3);

                                    if($component->src4 != '' && !str_contains($component->src4, '/tmp/')) 
                                        array_push($images, \App\Services\ApiService::api() . 'img/settings/slider/' . $component->src4);

                                    if($component->src5 != '' && !str_contains($component->src5, '/tmp/')) 
                                        array_push($images, \App\Services\ApiService::api() . 'img/settings/slider/' . $component->src5);

                                    if($component->src6 != '' && !str_contains($component->src6, '/tmp/')) 
                                        array_push($images, \App\Services\ApiService::api() . 'img/settings/slider/' . $component->src6);

                                    if($component->src7 != '' && !str_contains($component->src7, '/tmp/')) 
                                        array_push($images, \App\Services\ApiService::api() . 'img/settings/slider/' . $component->src7);

                                    if($component->src8 != '' && !str_contains($component->src8, '/tmp/')) 
                                        array_push($images, \App\Services\ApiService::api() . 'img/settings/slider/' . $component->src8);

                                    if($component->src9 != '' && !str_contains($component->src9, '/tmp/')) 
                                        array_push($images, \App\Services\ApiService::api() . 'img/settings/slider/' . $component->src9);

                                @endphp

                                <div class="mb-52 mt-24" style="transform:scale(1.2, 1.2)">
                                    <x-bigslider
                                        images="{{ implode(',', $images) }}"
                                    />
                                </div>
                            @endif

                            <!--image-->
                            @if($component->name == "image")
                                <img style="transform:scale(1.4, 1.4)" class="mb-40 mt-28 m-auto" src="{{ \App\Services\ApiService::api() }}img/settings/image/{{ $component->src }}" /><br />
                            @endif

                            <!--icontext-->
                            @if($component->name == "icontext")
                                <div class="mt-4 flex justify-start">
                                    <div class="pr-16">
                                        @if($component->icon == 1)
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-28 w-28" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                            </svg>
                                        @endif
                                        @if($component->icon == 2)
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-28 w-28" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                        </svg>
                                        @endif
                                        @if($component->icon == 3)
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-28 w-28" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                                        </svg>
                                        @endif
                                        @if($component->icon == 4)
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-28 w-28" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                        @endif
                                    </div>
                                    <div>
                                        <b>{{ $component->title }}</b><br />
                                        {{ $component->text }}
                                    </div>
                                </div>
                            @endif

                            <!--twotext-->
                            @if($component->name == "twotext")
                                <div class="lg:grid grid-cols-2 mt-4">
                                    <p class="text-xl lg:pr-12">{!! $component->text_left !!}</p>
                                    <p class="text-xl lg:pl-12">{!! $component->text_right !!}</p>
                                </div>
                            @endif
                            
                            <!--review-->
                            @if($component->name == "review")
                                <div class="mt-4 mb-12">
                                    @if($component->left)
                                        <div class="lg:inline-block lg:align-middle py-16 lg:py-0" style="width:49%;">
                                            @if($component->src != '')
                                                <img src="{{ \App\Services\ApiService::api() }}img/settings/review/{{ $component->src }}" />
                                            @endif
                                        </div>
                                    @endif

                                    <div class="lg:inline-block lg:w-6/12 text-center align-middle px-16">
                                        @if($component->quote)
                                            <div>
                                                "<span class="font-bold italic"> {!! $component->text !!}
                                                </span>" 
                                                @if ($component->person != null)
                                                    <span>-</span>
                                                @endif 
                                                {{ $component->person }}
                                            </div>
                                        @else
                                            <div>
                                                <span> {!! $component->text !!}
                                                </span> 
                                                @if ($component->person != null)
                                                    <span>-</span>
                                                @endif {{ $component->person }}
                                            </div>
                                        @endif
                                    </div>

                                    @if(!$component->left)
                                        <div class="lg:inline-block lg:align-middle py-16 lg:py-0" style="width:49%;">
                                            @if($component->src != '')
                                                <img src="{{ \App\Services\ApiService::api() }}img/settings/review/{{ $component->src }}" />
                                            @endif
                                        </div>
                                    @endif
                                </div>
                            @endif
                    
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</x-app-layout>