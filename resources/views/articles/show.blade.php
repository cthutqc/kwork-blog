<x-app-layout>
    <div class="relative bg-cover bg-no-repeat bg-center h-[500px]" style="background-image: url({{asset('images/home4.jpg')}})">
        <div class="absolute inset-0 bg-black bg-opacity-60"></div>
        <x-container class="absolute left-0 m-auto top-1/2 -translate-y-1/2">
            <div class="space-y-4">
                <img src="{{asset('images/placeholder.jpeg')}}" class="h-[158px] w-auto alt="{{$article->h1 ?? $article->name}}" title="{{$article->h1 ?? $article->name}}"/>
                <x-h1>
                    {{$article->h1 ?? $article->name}}
                </x-h1>
                {{ Breadcrumbs::render('article', $article) }}
            </div>
        </x-container>
    </div>
    <x-container class="-mt-12 z-20">
        <div class="grid grid-cols-4 gap-4 rounded-md bg-slate-100 p-4">
            <div class="space-y-4 col-span-3">
                <x-article-row title="Текст">
                    {!! $article->text !!}
                </x-article-row>
                <x-article-row title="Теги">
                </x-article-row>
                <x-article-row title="Комментарии">
                </x-article-row>
            </div>
            <div>
                sidebar
            </div>
        </div>
    </x-container>
</x-app-layout>

