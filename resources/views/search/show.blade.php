<x-app-layout>
    <x-container>
        <x-articles :search="request()->q">
            @each('articles.item', $articles, 'article', 'articles.no-items')
            {{$articles->links('pagination::tailwind')}}
        </x-articles>
    </x-container>
</x-app-layout>
