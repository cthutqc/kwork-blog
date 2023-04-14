<div class="group w-full p-1 rounded-sm shadow bg-white grid grid-cols-4">
    <a href="{{route('articles.show', $article)}}" class="h-[158px] w-full bg-cover bg-no-repeat bg-center" style="background-image: url({{asset('images/placeholder.jpeg')}})"></a>
    <div class="space-y-4 col-span-3 p-4 relative">
        <a href="{{route('articles.show', $article)}}" class="font-semibold text-lg">{{$article->name}}</a>
        <p>{{$article->shortenText}}</p>
        <div class="absolute top-0 right-4">
            <p class="flex space-x-1 items-center text-[12px]"><x-icons.comment class="w-3 h-3" /><span>{{count($article->comments)}}</span></p>
        </div>
    </div>
</div>
