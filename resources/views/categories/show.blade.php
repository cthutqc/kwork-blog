<x-app-layout>
    <x-container>
        <x-articles :category="$category">
            @each('articles.item', $category->articles, 'article')
        </x-articles>
    </x-container>
</x-app-layout>
