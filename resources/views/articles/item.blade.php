<div class="group w-full p-1 rounded-sm shadow bg-white overflow-hidden grid md:grid-cols-4">
    <div class="overflow-hidden h-[158px] w-full relative">
        <a href="{{route('articles.show', $article)}}"
           class="absolute inset-0 bg-cover bg-no-repeat bg-center transition-all duration-500 ease-in-out transform group-hover:scale-110"
           style="background-image: url({{$article->getFirstMediaUrl() ? $article->getFirstMediaUrl() : asset('images/placeholder.jpeg')}})"></a>
    </div>
    <div class="space-y-2 lg:space-y-4 md:col-span-3 p-4 relative">
        <div class="md:absolute md:top-0 md:right-4">
            <div class="flex items-center">
                @for($i = 1; $i <= 5; $i++)
                    <span @class([
                        "text-[20px] text-slate-300",
                        "!text-[#FF9800]" => $i <= $article->avgRating()
                    ])>&#9733;</span>
                @endfor
                <p class="flex space-x-1 items-center text-[12px] pl-4"><x-icons.comment class="w-3 h-3" /><span>{{$article->totalComments()}}</span></p>
                <p class="flex space-x-1 items-center text-[12px] pl-4"><x-icons.hearth /><span>{{$article->totalLikes()}}</span></p>
            </div>
        </div>
        <a href="{{route('articles.show', $article)}}" class="font-semibold text-lg">{{$article->name}}</a>
        <p>{{$article->shortenText}}</p>
        <div class="block space-y-2 md:flex md:justify-start md:space-x-2 md:space-y-0">
            <a href="{{route('articles.show', $article)}}" class="w-full block md:w-max text-center p-1 lg:p-2 text-sm font-semibold rounded-sm border border-slate-300 text-black">Полная новость</a>
            @if(!auth()->user() || auth()->user()->id !== $article->user->id)
            <a href="{{auth()->user() ? route('users.chat', $article->user) : route('pages.login')}}" class="w-full block md:w-max text-center p-1 lg:p-2 text-sm font-semibold bg-[#f44336] rounded-sm border border-[#f44336] text-white group-hover:text-black group-hover:bg-[#FFC107] group-hover:border-[#FFC107]">Написать сообщение</a>
            @endif
        </div>
    </div>
</div>
