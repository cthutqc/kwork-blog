<div class="relative">
    <label for="avatar" class="cursor-pointer">
    <input type="file" id="avatar" wire:model="image" class="hidden">
    <img  src="{{$user->getFirstMediaUrl() ? $user->getFirstMediaUrl() : asset('images/profile-placeholder.png')}}"
         class="m-auto h-[100px] w-[100px] rounded-full shadow" />
    </label>
    <div wire:loading class="absolute inset-0 bg-white bg-opacity-60">
        <x-loading />
    </div>
</div>

