<x-app-layout>
    <x-container>
        <x-articles :category="$category">
            @each('articles.item', $articles, 'article')
            {{$articles->links('pagination::tailwind')}}
        </x-articles>
    </x-container>
</x-app-layout>
