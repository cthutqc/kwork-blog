<button wire:click="like"
    class="rounded-sm bg-white w-max text-black hover:bg-[#4274eb] hover:text-white p-4 font-semibold flex items-center space-x-2">
    <x-icons.like class="h-5 w-5 fill-current" />
    <span>{{$likes}}</span>
</button>
