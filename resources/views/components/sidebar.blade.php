<div class="bg-white w-full hidden md:block shadow">
    <div class="bg-[#20344c] block py-4 px-6 text-white">Все категории</div>
    <ul class="py-4 px-6 m-0">
        @foreach($categories as $category)
            <li>
                <x-category-link :category="$category" />
            </li>
        @endforeach
    </ul>
</div>
