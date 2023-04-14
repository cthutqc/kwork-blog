@props([
    'comment' => $comment
])
<div {{$attributes}}>
    <div class="w-full block space-y-2">
        <p class="font-bold">{{$comment->user->name}}</p>
        <p class="text-[10px]">{{$comment->formattedCreatedAt}}</p>
        <p>{{$comment->text}}</p>
    </div>
    <div x-data="{}"
         class="w-full block text-right">
        <button
            @click.prevent="window.scrollTo({ top: document.getElementById('comment').offsetTop, behavior: 'smooth' })"
            @scroll.window="currentScrollPosition = window.pageYOffset"
            wire:click.prevent="answer({{$comment->id}})"
            class="inline-block p-2 text-[#1386d1] border my-1 mr-2 block border-slate-100 bg-[#f2f8fd] rounded-md">Ответить</button>
    </div>
    @foreach($comment->children ?:[] as $child)
        <x-comment :comment="$child" class="pl-4" />
    @endforeach
</div>
