<form action="{{route('search.show')}}" method="GET">
    <div class="relative">
        <input type="text" @click.away="open = false" name="q" placeholder="Поиск..." class="text-black w-full block rounded-sm px-4 py-2" />
        <button type="submit" class="absolute right-2 top-1/2 -translate-y-1/2">
            <x-icons.search class="w-6 h-6 fill-black"/>
        </button>
    </div>
</form>
