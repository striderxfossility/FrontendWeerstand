<x-app-layout>
    <div>
        <div id="top">&nbsp;</div>
        <div class="lg:w-2/3 m-auto">
            <div class="lg:grid 3xl:grid-cols-4 xl:grid-cols-3 grid-cols-2 gap-20">
                @foreach ($blogs as $blog)

                    @php
                        if($blog->page != null)
                            $link = '/pagina/' . $blog->page->slug;
                        else
                            $link = '/blog/' . $blog->slug;
                    @endphp

                    <x-moduleBlockGrid
                        name="{{ $blog->title }}"
                        img="{{ \App\Services\ApiService::api() }}img/settings/blog/{{ $blog->src }}"
                        link="{{ $link }}"
                        text="{{ $blog->resume}}"
                        linkTxt="{{ $blog->link_text }}"
                    />
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
