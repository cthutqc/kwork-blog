<x-article-row title="Комментарии">
    <x-comment-form />
    <div class="my-10" wire:poll.3s>
        @forelse($article->comments->whereNull('parent_id') as $comment)
            <div class="w-full block py-4 border-b border-b-slate-100 space-y-4 relative">
                <x-comment :comment="$comment" />
            </div>
        @empty
            <div class="w-full block py-4 text-center">
                <p>Оставьте первый комментарий</p>
            </div>
        @endforelse
    </div>
</x-article-row>
