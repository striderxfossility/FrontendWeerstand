<x-app-layout>
    <div>
        <div id="offerActive">
            <div class="bg-white text-gray-600 w-auto p-20 px-40 m-5">
                <div class="text-4xl font-bold mb-10">Offerte aanvragen of idee bespreken</div>
                <div class="grid grid-cols-3 text-left">
                    <div class="p-2">
                        <div class="font-bold">Naam</div>
                        <div><input id="name" class="p-2 rounded border-2 border-green-400 w-full" type="text" /></div>
                    </div>

                    <div class="p-2">
                        <div class="font-bold">E-Mail</div>
                        <div><input id="email" class="p-2 rounded border-2 border-green-400 w-full" type="text" /></div>
                    </div>

                    <div class="p-2">
                        <div class="font-bold">Telefoonnummer</div>
                        <div><input id="mobile" class="p-2 rounded border-2 border-green-400 w-full" type="text" /></div>
                    </div>
                </div>

                <div class="text-left mt-10">
                    <div class="p-2">
                        <div class="font-bold">Bericht</div>
                        <div><textarea id="description" class="p-2 rounded h-40 border-green-400 border-2 w-full"></textarea></div>
                    </div>
                </div>

                <div class="text-right mt-10">
                    <div class="p-2 text-right">
                        <div onclick="send()" class="bg-green-500 text-white p-2 w-40 text-center">Verzenden</div>
                    </div>
                </div>
            </div>
        </div>
        <div id="bedankt" style="display:none" class="bg-white text-gray-600 w-auto p-20 px-40 m-5 text-2xl">
            Bedankt voor uw aanvraag! We nemen zo spoedig mogelijk contact met je op.<br />
            Met vriendelijke groet<br />
            <br />
            Team Weerstand Natuursteen
        </div>
    </div>
</x-app-layout>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
function send()
{
    let form = {
        name : document.getElementById('name').value,
        email : document.getElementById('email').value,
        mobile : document.getElementById('mobile').value,
        description : document.getElementById('description').value,
        material: '{{ $name }}'
    }

    jQuery.ajax({
        url: "{{ \App\Services\ApiService::api() }}api/offerWindowSillForm",
        method: 'post',
        data: {form: form},
        success: function(result) 
        {
            document.getElementById('bedankt').style.display = "block"
        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            alert(thrownError);
        }
    });
}
</script>