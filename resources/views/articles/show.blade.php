<x-app-layout>
    <div class="relative bg-cover bg-no-repeat bg-center h-[500px]" style="background-image: url({{asset('images/home4.jpg')}})">
        <div class="absolute inset-0 bg-black bg-opacity-60"></div>
        <x-container class="absolute left-0 m-auto top-1/2 -translate-y-1/2">
            <div class="space-y-4">
                <img src="{{asset('images/placeholder.jpeg')}}" class="h-[158px] w-auto alt="{{$article->h1 ?? $article->name}}" title="{{$article->h1 ?? $article->name}}"/>
                <x-h1>
                    {{$article->h1 ?? $article->name}}
                </x-h1>
                <div
                    x-data="{}">
                    <div class="flex items-center space-x-10">
                        <livewire:rating :article="$article"/>
                        <button
                            class="block text-white"
                            @click.prevent="window.scrollTo({ top: document.getElementById('comment').offsetTop, behavior: 'smooth' })"
                            @scroll.window="currentScrollPosition = window.pageYOffset"
                        >Комментариев: {{count($article->comments)}}</button>
                        </div>
                </div>
                {{ Breadcrumbs::render('article', $article) }}
            </div>
        </x-container>
    </div>
    <x-container class="-mt-12 z-20">
        <div class="grid md:grid-cols-4 gap-4 rounded-md bg-slate-100 p-4">
            <div class="space-y-4 md:col-span-3">
                <x-article-row title="Текст">
                    {!! $article->text !!}
                </x-article-row>
                @if(count($article->tags))
                <x-article-row title="Теги">
                    <div class="flex flex-wrap items-center ">
                    @foreach($article->tags as $tag)
                        <div class="p-2 text-[#1386d1] border my-1 mr-2 block border-slate-100 bg-[#f2f8fd] rounded-md">{{$tag->name}}</div>
                    @endforeach
                    </div>
                </x-article-row>
                @endif
                <livewire:comments :article="$article"/>
            </div>
            <div class="hidden md:block">
                sidebar
            </div>
        </div>
    </x-container>
</x-app-layout>

