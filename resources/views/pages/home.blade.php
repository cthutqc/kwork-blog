<x-app-layout>
    <x-container>
        <x-articles>
            @each('articles.item', $articles, 'article')
        </x-articles>
    </x-container>
</x-app-layout>
