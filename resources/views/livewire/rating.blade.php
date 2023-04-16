<div class="flex items-center">
    <p class="bg-[#FF9800] text-white py-1 px-2 font-bold rounded-md mr-2">{{$article->avgRating()}}</p>
    @for($i = 1; $i <= 5; $i++)
        <p @class([
            "text-[20px] text-slate-300",
            "!text-[#FF9800]" => $i <= $article->avgRating()
        ])>&#9733;</p>
    @endfor
</div>
