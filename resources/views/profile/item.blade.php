<a href="{{route('articles.show', $article)}}"
   class="shadow-lg hover:shadow-2xl rounded-md transition-all duration-500 ease-in-out transform hover:scale-105">
    <div class="relative bg-cover bg-no-repeat bg-center w-full block h-[200px]" style="background-image: url({{$article->getFirstMediaUrl() ? $article->getFirstMediaUrl() : asset('images/placeholder.jpeg')}})">
        <p class="absolute top-2 right-2 bg-[#cad721] text-[12px] font-semibold py-1 px-4 rounded-lg">{{$article->formatted_created_at}}</p>
        @if(!$article->active)
            <p class="absolute top-8 text-white right-2 bg-red-600 text-[12px] font-semibold py-1 px-4 rounded-lg">На модерации</p>
        @endif
    </div>
    <p class="bg-white block p-4 text-black font-semibold">{{$article->name}}</p>
</a>
