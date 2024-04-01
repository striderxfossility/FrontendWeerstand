<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>
            @if(isset($meta_title))
                {{ $meta_title }}
            @else
                {{ config('app.name', 'Weerstand Natuursteen') }}
            @endif
        </title>

        @if(isset($meta_description))
            <meta name="description" content="{{ $meta_description }}">
        @endif

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="font-calibri h-screen overflow-y-hidden">
            <div id="topScroll"></div>
            <div class="bg-fixed z-50 w-full bg-gray-50">
                <div class="relative">
                    <div class="pt-5 pb-5">
                        <a href="{{ route('home') }}"><img class="cursor-pointer bg-local m-auto" style="height:160px;" id="image-logo" src="{{ asset('img/logo.png') }}" alt="" /></a>
                    </div>
        
                    <div class="mr-0 absolute right-5 lg:right-20 top-12" id="menu">
                        <div class="m-auto cursor-pointer">
                            <div id="show_m" onClick="showMenu()">
                                <svg xmlns="http://www.w3.org/2000/svg" style="color:#525149;" class="h-16 w-16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                </svg>
                                <div class="text-center font-black tracking-widest">MENU</div>
                            </div>
                            <div id="close_m" onClick="hideMenu()" style="display:none">
                                <svg xmlns="http://www.w3.org/2000/svg" style="color:#525149;" class="h-16 w-16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                <div class="text-center font-black tracking-widest">CLOSE</div>
                            </div>
                        </div>
                    </div>
                </div>
        
                <div id="menu_m" style="display:none;" class="z-40 bg-gray-50 w-full">
                    <div class="text-center p-2 text-lg hover:bg-gray-100 tracking-widest">
                        <a href="{{ route('home') }}" class="w-full inline-block" >
                            Home
                        </a>
                    </div>
                    <div class="text-center p-2 text-lg hover:bg-gray-100 tracking-widest">
                        <a href="{{ route('collectie') }}" class="w-full inline-block" >
                            Collectie
                        </a>
                    </div>
                    <div class="text-center p-2 text-lg hover:bg-gray-100 tracking-widest">
                        <a href="{{ route('tegels') }}" class="w-full inline-block" >
                            Vloeren
                        </a>
                    </div>
                    {{-- <div class="text-center p-2 text-lg hover:bg-gray-100 tracking-widest">
                        <a href="{{ route('diensten') }}" class="w-full inline-block" >
                            Diensten
                        </a>
                    </div> --}}
                    <div class="text-center p-2 text-lg hover:bg-gray-100 tracking-widest">
                        <a href="{{ route('pagina', 'showroom') }}" class="w-full inline-block" >
                            Showroom
                        </a>
                    </div>
                    <div class="text-center p-2 text-lg hover:bg-gray-100 tracking-widest">
                        <a href="{{ route('projecten') }}" class="w-full inline-block" >
                            Projecten
                        </a>
                    </div>
                    <div class="text-center p-2 text-lg hover:bg-gray-100 tracking-widest">
                        <a href="https://weerstandgrafmonumenten.nl/" target="_blank" class="w-full inline-block" >
                            Grafmonumenten
                        </a>
                    </div>
                    <!--<div class="text-center p-2 text-lg hover:bg-gray-100 tracking-widest">
                        <a href="{{ route('blog') }}" class="w-full inline-block" >
                            Blog
                        </a>
                    </div>-->
                    <div class="text-center p-2 text-lg hover:bg-gray-100 tracking-widest">
                        <a href="{{ route('contact') }}" class="w-full inline-block" >
                            Contact
                        </a>
                    </div>
                    <div class="text-center p-2 text-lg hover:bg-gray-100 tracking-widest">
                        <a href="{{ route('pagina', 'over-ons') }}" class="w-full inline-block" >
                            Over ons
                        </a>
                    </div>
                    <div class="grid grid-cols-2 m-auto pb-8 pt-4">
                        <a target="_blank" href="https://www.facebook.com/Weerstandnatuursteenurk" class="w-10 m-auto mr-2">
                            <svg fill="#525149" xmlns="http://www.w3.org/2000/svg" class="inline-block p-2 w-10" viewBox="0 0 24 24"><path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z"/></svg>
                        </a>
                        <a target="_blank" href="https://www.instagram.com/weerstand_natuursteen" class="w-10 m-auto ml-2">
                            <svg fill="#525149" xmlns="http://www.w3.org/2000/svg" class="inline-block p-2 w-10" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        </a>
                    </div>
                </div>
        
                
                <a href="{{ route('contact') }}" style="background-color:#f4eacf; color:#525149; padding-top:6px" class="hidden cursor-pointer text-white h-10 lg:tracking-widest font-bold text-sm lg:text-lg text-center w-full">
                    Onze showroom is vandaag geopend tot 17:30
                </a>

                <?php
                    $opening_true = \App\Services\ApiService::get('opening_true');
                    $opening_rule = \App\Services\ApiService::get('opening_rule');
                ?>
        
                <div href="{{ route('contact') }}" style="color:#525149; padding-top:6px" class="{{ $opening_true == '1' ? '' : 'hidden' }} p-2 bg-yellow-300 cursor-pointer text-white  lg:tracking-widest font-bold text-sm lg:text-lg text-center w-full">
                    {{ $opening_rule }}
                </div>
            
            </div>

            <div id="mainframe" onscroll="handleScroll()" style="height:calc(100% - 200px)" class="overflow-hidden bg-gray-50 w-full overflow-y-scroll">
                {{ $slot }}
                @include('layouts.footer')
            </div>
        </div>
    </body>
</html>

<script>
    function showMenu()
    {
        document.getElementById('show_m').style.display = 'none'
        document.getElementById('close_m').style.display = 'block'
        document.getElementById('menu_m').style.display = 'block'
    }

    function hideMenu()
    {
        document.getElementById('close_m').style.display = 'none'
        document.getElementById('show_m').style.display = 'block'
        document.getElementById('menu_m').style.display = 'none'
    }

    function handleScroll () 
    {
        let mainframe = document.getElementById('mainframe')
        let imageLogo = document.getElementById('image-logo')
        let menu = document.getElementById('menu')
        if(mainframe.scrollTop == 0) {
            if(screen.width > 400) {
                imageLogo.style.height = "10rem"
                menu.style.top = "3rem"
                mainframe.style.height = "calc(100% - 200px)"
            }
        } else {
            imageLogo.style.height = "5rem"
            menu.style.top = "1rem"
            mainframe.style.height = "calc(100% - 120px)"
        }
    }
</script>