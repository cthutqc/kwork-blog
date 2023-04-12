<div class="bg-white w-full block shadow">
    <div class="bg-[#20344c] block p-4 text-white">sidebar</div>
    <ul>
        @foreach($categories as $category)
            <li>
                <a href="{{route('categories.show', $category)}}" class="block w-full p-4">{{$category->name}}</a>
            </li>
        @endforeach
    </ul>
</div>
