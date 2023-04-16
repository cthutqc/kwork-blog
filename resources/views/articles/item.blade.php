<div class="group w-full p-1 rounded-sm shadow bg-white grid md:grid-cols-4">
    <a href="{{route('articles.show', $article)}}" class="h-[158px] w-full bg-cover bg-no-repeat bg-center" style="background-image: url({{asset('images/placeholder.jpeg')}})"></a>
    <div class="space-y-4 md:col-span-3 p-4 relative">
        <div class="md:absolute md:top-0 md:right-4">
            <div class="flex items-center">
                @for($i = 1; $i <= 5; $i++)
                    <span @class([
                        "text-[20px] text-slate-300",
                        "!text-[#FF9800]" => $i <= $article->avgRating()
                    ])>&#9733;</span>
                @endfor
                <p class="flex space-x-1 items-center text-[12px] pl-4"><x-icons.comment class="w-3 h-3" /><span>{{count($article->comments)}}</span></p>
            </div>
        </div>
        <a href="{{route('articles.show', $article)}}" class="font-semibold text-lg">{{$article->name}}</a>
        <p>{{$article->shortenText}}</p>
        <div class="block space-y-2 md:flex md:justify-start md:space-x-2 md:space-y-0">
            <a href="{{route('articles.show', $article)}}" class="w-full block md:w-max text-center p-2 text-sm font-semibold rounded-sm border border-slate-300 text-black">Полная новость</a>
            <button class="w-full block md:w-max text-center p-2 text-sm font-semibold bg-[#f44336] rounded-sm border border-[#f44336] text-white hover:text-black hover:bg-[#FFC107] hover:border-[#FFC107]">Написать сообщение</button>
        </div>
    </div>
</div>
