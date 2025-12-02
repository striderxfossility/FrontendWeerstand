<x-app-layout>
    <style>
        .text-red-500 {
            color: #f56565;
        }
        /* HTML: <div class="loader"></div> */
.loader {
  width: 45px;
  aspect-ratio: 1;
  background: 
    linear-gradient(#0000 calc(1*100%/6),#000 0 calc(3*100%/6),#0000 0) left   bottom,
    linear-gradient(#0000 calc(2*100%/6),#000 0 calc(4*100%/6),#0000 0) center bottom,
    linear-gradient(#0000 calc(3*100%/6),#000 0 calc(5*100%/6),#0000 0) right  bottom;
  background-size: 20% 600%;
  background-repeat: no-repeat;
  animation: l3 1s infinite linear;
}
@keyframes l3 {
    100% {background-position: left top,center top,right top }
}
    </style>
    <div>
        <div id="offerActive">
            <div class="bg-white text-gray-600 w-auto p-20 px-40 m-5">
                <div class="text-4xl font-bold mb-10">Offerte aanvragen of idee bespreken</div>
                <div class="grid grid-cols-3 text-left">
                    <div class="p-2">
                        <div class="font-bold">Naam*</div>
                        <div><input id="name" class="p-2 rounded border-2 border-green-400 w-full" type="text" /></div>
                        <div id="name-error" class="text-red-500" style="display:none">Vul een naam in</div>
                    </div>

                    <div class="p-2">
                        <div class="font-bold">E-Mail*</div>
                        <div><input id="email" class="p-2 rounded border-2 border-green-400 w-full" type="text" /></div>
                        <div id="email-error" class="text-red-500" style="display:none">Vul een geldig e-mailadres in</div>
                    </div>

                    <div class="p-2">
                        <div class="font-bold">Telefoonnummer*</div>
                        <div><input id="mobile" class="p-2 rounded border-2 border-green-400 w-full" type="text" required /></div>
                        <div id="mobile-error" class="text-red-500" style="display:none">Vul een telefoonnummer in</div>
                    </div>
                </div>

                <div class="text-left mt-10">
                    <div class="p-2">
                        <div class="font-bold">Bericht</div>
                        <div><textarea id="description" class="p-2 rounded h-40 border-green-400 border-2 w-full"></textarea></div>
                    </div>
                </div>

                <div class="text-left mt-10">
                    <div class="p-2">
                        <div class="font-bold">Bijlage (n)</div>
                        <div><input id="attachments" class="p-2 rounded border-2 border-green-400 w-full" type="file" multiple /></div>
                    </div>
                </div>

                <div class="text-right mt-10">
                    <div class="p-2 text-right">
                        <div onclick="send()" class="bg-green-500 text-white p-2 w-40 text-center cursor-pointer">Verzenden</div>
                    </div>
                </div>
            </div>
        </div>
        <div id="bedankt" style="display:none" class="bg-white text-gray-600 w-auto p-20 px-40 m-5 text-2xl">
            <div class="bg-white text-gray-600 w-auto p-20 px-40 m-5">
                Bedankt voor uw aanvraag! We nemen zo spoedig mogelijk contact met je op.<br />
                Met vriendelijke groet<br />
                <br />
                Team Weerstand Natuursteen
            </div>
        </div>
        <div id="error" style="display:none" class="bg-white text-gray-600 w-auto p-20 px-40 m-5 text-2xl">
            <div class="bg-white text-gray-600 w-auto p-20 px-40 m-5">
                Er is iets misgegaan met het verzenden van uw aanvraag. Probeer het later nog eens.
            </div>
        </div>
        <div id="loader" style="display:none" class="bg-white text-gray-600 w-auto p-20 px-40 m-5 text-2xl">
            <div class="bg-white text-gray-600 w-auto p-20 px-40 m-5">
                <div class="loader mx-auto"></div>
                <div class="text-center" style="margin-top: 1rem;">Bezig met verzenden...</div>
            </div>
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
        attachments: document.getElementById('attachments').files,
        material: '{{ $name }}'
    }

    // validate
    let hasError = false;
    if(form.name === '')
    {
        document.getElementById('name-error').style.display = "block"
        hasError = true;
    }
    else
    {
        document.getElementById('name-error').style.display = "none"
    }

    if(form.email === '' || !form.email.includes('@'))
    {
        document.getElementById('email-error').style.display = "block"
        hasError = true;
    }
    else
    {
        document.getElementById('email-error').style.display = "none"
    }

    if(form.mobile === '')
    {
        document.getElementById('mobile-error').style.display = "block"
        hasError = true;
    }
    else
    {
        document.getElementById('mobile-error').style.display = "none"
    }

    // validate attachments size (max 5mb each) total max 20mb
    let totalSize = 0;
    for(let i = 0; i < form.attachments.length; i++)
    {
        totalSize += form.attachments[i].size;
        if(form.attachments[i].size > 5 * 1024 * 1024)
        {
            alert('Een van de bijlagen is groter dan 5MB. Verwijder deze en probeer het opnieuw.');
            hasError = true;
            break;
        }

        // validate file type
        let allowedTypes = ['image/jpeg', 'image/png', 'application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
        if(!allowedTypes.includes(form.attachments[i].type))
        {
            alert('Een van de bijlagen heeft een ongeldig bestandsformaat. Toegestane formaten zijn: JPG, PNG, PDF, DOC, DOCX.');
            hasError = true;
            break;
        }
    }
    if(totalSize > 20 * 1024 * 1024)
    {
        alert('De totale grootte van de bijlagen is groter dan 20MB. Verwijder enkele bijlagen en probeer het opnieuw.');
        hasError = true;
    }

    if(hasError)
    {
        return;
    }

    document.getElementById('offerActive').style.display = "none"
    document.getElementById('loader').style.display = "block"

    // scroll to top
    window.scrollTo({ top: 0, behavior: 'smooth' });

    // Create FormData object to handle file uploads
    let formData = new FormData();
    formData.append('name', form.name);
    formData.append('email', form.email);
    formData.append('mobile', form.mobile);
    formData.append('description', form.description);
    formData.append('material', form.material);
    
    // Append each file
    for(let i = 0; i < form.attachments.length; i++)
    {
        formData.append('attachments[]', form.attachments[i]);
    }

    jQuery.ajax({
        url: "{{ \App\Services\ApiService::api() }}api/offerWindowSillForm",
        method: 'post',
        data: formData,
        processData: false,  // Important: tell jQuery not to process the data
        contentType: false,  // Important: tell jQuery not to set contentType
        success: function(result) 
        {
            document.getElementById('offerActive').style.display = "none"
            document.getElementById('bedankt').style.display = "block"
            document.getElementById('loader').style.display = "none"
        },
        error: function (xhr, ajaxOptions, thrownError) {
            document.getElementById('offerActive').style.display = "none"
            document.getElementById('error').style.display = "block"
            document.getElementById('loader').style.display = "none"
            console.error(thrownError);
        }
    });
}
</script>