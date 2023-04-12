<div class="group w-full p-1 rounded-sm flex bg-white shadow items-center space-x-4">
    <a href="{{route('articles.show', $article)}}" class="h-[158px] w-[158px] bg-cover bg-no-repeat bg-center" style="background-image: url({{asset('images/placeholder.jpeg')}})"></a>
    <div class="space-y-4">
        <a href="{{route('articles.show', $article)}}" class="font-semibold text-lg">{{$article->name}}</a>
        <p>{{$article->shortenText}}</p>
    </div>
</div>
