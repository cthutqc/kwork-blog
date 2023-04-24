@props([
    'category' => $category
])
<a href="{{route('categories.show', $category)}}" @class([
                    "flex space-x-2 items-center w-full py-4 transition-all duration-500 uppercase hover:translate-x-4 relative",
                    "font-bold" => request()->segment(2) == $category->slug,
                ])>
    <img src="{{$category->getFirstMediaUrl() ? $category->getFirstMediaUrl() : asset('images/blog1.png')}}" class="h-8"/>
    <span>{{$category->name}}</span>
    <span class="bg-green-500 rounded-md text-sm text-white p-1 absolute right-0">{{$category->articles->count()}}</span>
</a>
