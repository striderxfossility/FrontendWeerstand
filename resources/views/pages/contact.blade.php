<x-app-layout>
    <div class="p-20">
		<div id="top"></div>
		<div class="lg:w-2/3 m-auto">
            <div class="font-cambria text-2xl relative shadow-lg mt-8 text-left p-16 bg-white">
				<div v-if="loadingForm" class="w-full text-center mt-10">
					<div class="m-auto lds-dual-ring"></div>
				</div>
				<div v-else>
					<div>
						<div>
							<div class="text-xl md:text-4xl">Contact opnemen</div>

							<div class="mt-10 text-sm md:text-xl">
								<div>Vlieter 1</div>
								<div>8321WJ Urk</div>
								<br />
								<div><a class="text-blue-400 hover:text-blue-300" href="mailto:info@weerstandnatuursteen.nl">info@weerstandnatuursteen.nl</a></div>
								<div><a class="text-blue-400 hover:text-blue-300" href="tel:+31527683725">
									0527-683725
								</a></div>
							</div>

							<div class="mt-10">
								<div>NAAM</div>
								<input id="name" class="mt-4 text-md md:text-xl py-2 pl-4 w-full border-2" type="text" />
								<div class="mt-4">EMAIL</div>
								<input id="email" class="mt-4 text-md md:text-xl py-2 pl-4 w-full border-2" type="text" />
								<div class="mt-4">TELEFOONNUMMER</div>
								<input id="mobile" class="mt-4 text-md md:text-xl py-2 pl-4 w-full border-2" type="text" />
								<div class="mt-4">VRAAG</div>
								<textarea id="question" class="p-4 text-md md:text-xl w-full h-32 border-2"></textarea>
								<div class="mt-4">
									<input class="h-6 w-6" type="checkbox" id="newsletter">
									<div for="newsletter" class="inline md:text-xl pl-6 align-top">Inschijven nieuwsbrief</div>
								</div>
								<button onclick="sendForm()" class="rounded shadow buttonx px-4 py-1 md:text-xl mt-4">Indienen</button>
							</div>
						</div>
						<div class="mt-10">
							<div class="text-xl md:text-4xl">Social media</div>

							<div class="mt-10">
								<div class="mt-10 inline">
									<a target="_blank" href="https://api.whatsapp.com/send?phone=31527683725" class="cursor-pointer rounded px-4 py-1 text-x2l mt-4 hover:text-gray-500 inline"><i class="fa-brands fa-whatsapp"></i></a>
								</div>

								<div class="mt-8 inline">
									<a target="_blank" href="https://www.instagram.com/weerstand_natuursteen" class="cursor-pointer rounded px-4 py-1 text-x2l mt-4 hover:text-gray-500 inline"><i class="fa-brands fa-instagram"></i></a>
								</div>

								<div class="mt-8 inline">
									<a target="_blank" href="https://www.instagram.com/weerstand_natuursteen/" class="cursor-pointer rounded px-4 py-1 text-x2l mt-4 hover:text-gray-500 inline"><i class="fa-brands fa-pinterest"></i></a>
								</div>

								<div class="mt-8 inline">
									<a target="_blank" href="https://www.facebook.com/Weerstandnatuursteenurk" class="cursor-pointer rounded px-4 py-1 text-x2l mt-4 hover:text-gray-500 inline"><i class="fa-brands fa-facebook"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div style="background-color:#525149; display:none;" class="shadow-lg rounded m-20 fixed top-0 text-white p-10 text-2xl" v-if="popupContactForm" id="popupContactForm">
					<div>Bedankt voor je bericht. We nemen zo spoedig mogelijk contact met je op.<br />
                        Met vriendelijke groet<br />
                        <br />
                        Team Weerstand Natuursteen
                    </div><br />
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
		</div>
	</div>
</x-app-layout>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
function sendForm()
{
    let form = {
        name : document.getElementById('name').value,
        email : document.getElementById('email').value,
        mobile : document.getElementById('mobile').value,
        question : document.getElementById('question').value,
        newsletter : document.getElementById('newsletter').checked
    }

    jQuery.ajax({
        url: "{{ \App\Services\ApiService::api() }}api/contactForm",
        method: 'post',
        data: {form: form},
        success: function(result) 
        {
            document.getElementById('popupContactForm').style.display = "block"
        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            alert(thrownError);
        }
    });
}
</script>