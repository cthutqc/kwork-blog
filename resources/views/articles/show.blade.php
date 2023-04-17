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
                        <livewire:rating :article="$article" />
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
                    <livewire:rate-it :article="$article"/>
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
            <div class="sticky top-[52px] h-max">
                <div class="block rounded-t-md overflow-hidden bg-cover bg-center bg-no-repeat relative" style="background-image: url({{asset('images/all-list-bg.jpg')}})">
                    <span class="absolute inset-0 bg-blue-600 bg-opacity-40"></span>
                    <p class="bg-green-600 absolute top-0 inset-x-0 w-max text-[12px] py-1 px-4 rounded-b-md m-auto text-white">Автор</p>
                    <div class="p-10 text-center text-white relative space-y-2">
                        <img src="{{asset('images/profile-placeholder.png')}}"
                             class="m-auto h-[100px] w-[100px] rounded-full" />
                        <p class="text-lg">{{$article->user->name}}</p>
                    </div>
                </div>
                <div class="border-x border-b border-slate-200 bg-white p-10 rounded-b-md relative">
                    <a href="" class="rounded-3xl text-white bg-[#56caff] font-semibold py-2 px-4 absolute inset-x-0 m-auto w-max bottom-[86%]">Посмотреть профайл</a>
                    <button class="text-center m-auto block">Написать автору</button>
                </div>
            </div>
        </div>
    </x-container>
</x-app-layout>

