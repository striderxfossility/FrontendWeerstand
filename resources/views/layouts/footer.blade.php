<div class="mt-28">
    <div style="background-color:#525149;" class="w-full">
        <img class="bg-local m-auto h-18 p-4" style="height:115px;" id="image-logo" src="{{ asset('img/Logo-Weerstand-Natuursteen-footer.png') }}" alt="" />
    </div>

    <div class="mb-12 md:grid grid-flow-col grid-cols-4 gap-4 mt-20 lg:w-2/3 m-auto">
        <div class="p-4 py-10 text-center md:text-left">
            <b>Blijf op de hoogte</b>
            <p class="pt-4 text-gray-400">
                Ontvang het laatste nieuws, tips en acties in jouw mailbox.<br />
                Schrijf je in voor onze nieuwsbrief. </p>
            <input id="email" class="mt-8 text-sm w-full bg-gray-200 p-2" type="text" placeholder="E-Mail"/>
            <button onclick="news()" class="font-cambria buttonx py-2 shadow-md px-10 mt-8 text-white uppercase">inschrijven</button>
        </div>
        <div class="p-4 py-10 text-center md:text-left">
            <b>Instagram</b>
            <div class="h-auto">
                <a target="_blank" href="https://www.instagram.com/weerstand_natuursteen/"><img src="{{ asset('img/instagram.png') }}" class="object-cover m-auto" /></a>
            </div>
            <div class="pt-8">
                <a target="_blank" href="https://www.facebook.com/Weerstandnatuursteenurk" class="w-14 m-auto">
                    <svg fill="#525149" xmlns="http://www.w3.org/2000/svg" class="inline-block p-2 w-14" viewBox="0 0 24 24"><path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z"/></svg>
                </a>
                <a target="_blank" href="https://www.instagram.com/weerstand_natuursteen" class="w-14 m-auto">
                    <svg fill="#525149" xmlns="http://www.w3.org/2000/svg" class="inline-block p-2 w-14" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                </a>
            </div>
        </div>
        <div class="p-4 py-10 text-center md:text-left">
            <b>Links</b><br /><br />
            <div><a href="{{ route('pagina', 'over-ons') }}" class="text-gray-600 font-bold hover:text-gray-400">Over ons</a></div>
            <div class="mt-4"><a href="{{ route('diensten') }}" class="text-gray-600 font-bold hover:text-gray-400">Onze diensten</a></div>
            <div class="mt-4"><a href="{{ route('projecten') }}" class="text-gray-600 font-bold hover:text-gray-400">Onze projecten</a></div>
            <div class="mt-4"><a href="{{ route('contact') }}" class="text-gray-600 font-bold hover:text-gray-400">Contact</a></div>
            <div class="mt-4"><a href="{{ route('pagina', 'onderhoud-natuursteen') }}" class="text-gray-600 font-bold hover:text-gray-400">Onderhoud</a></div>
        </div>
        <div class="p-4 py-10 text-center md:text-left">
            <b>Contact</b>
            <p class="pt-4 text-gray-400">
                <a class="text-blue-400 hover:text-blue-300" href="tel:+31527683725">
                    0527-683725
                </a><br/>
                <a class="text-blue-400 hover:text-blue-300" href="mailto:info@weerstandnatuursteen.nl">info@weerstandnatuursteen.nl</a><br /><br />Vlieter 1 8321 WJ Urk<br /><br />
            Openingstijden showroom:<br /><br />Maandag tot vrijdag<br />09:00 - 13:00 & 14:00 - 17:30<br /><br />Zaterdag<br />09:00 - 12:00</p>
        </div>
    </div>

    <div class="text-gray-600 w-full py-6 text-center">
        @ {{ date("Y") }} Weerstand Natuursteen. Alle rechten voorbehouden
    </div>

    
    <div style="background-color:#525149; display:none;" class="shadow-lg rounded m-20 fixed top-0 text-white p-10 text-2xl" id="popupSubscriber">
        <div>Hartelijk dank voor het inschrijven op onze nieuwsbrief!</div><br />
        <div>Om de inschrijving te bevestigen klik je op de button in de bevestigingsmail die zojuist van ons hebt ontvangen.</div><br />
        <div>Wil je zeker zijn van de laatste nieuwtjes en trends? Volg ons dan ook op social media.</div><br />
        <div class="">
            <a target="_blank" href="https://www.facebook.com/Weerstandnatuursteenurk" class="w-14 m-auto">
                <svg fill="#fff" xmlns="http://www.w3.org/2000/svg" class="inline-block p-2 w-14" viewBox="0 0 24 24"><path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z"/></svg>
            </a>
            <a target="_blank" href="https://www.instagram.com/weerstand_natuursteen" class="w-14 m-auto">
                <svg fill="#fff" xmlns="http://www.w3.org/2000/svg" class="inline-block p-2 w-14" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
            </a>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
function news()
{
    let form = {
        newsletter : document.getElementById('email').value
    }

    jQuery.ajax({
        url: "{{ \App\Services\ApiService::api() }}api/subscribers",
        method: 'post',
        data: {form: form},
        success: function(result) 
        {
            console.log(result)
            document.getElementById('popupSubscriber').style.display = "block"
        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            alert(thrownError);
        }
    });
}
</script>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-149641362-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-149641362-1');
</script>
