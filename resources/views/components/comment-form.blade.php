<form id="comment" wire:submit.prevent="addComment">
    <div class="my-4">
        <textarea wire:model="text"
                 @class([
                    'border border-slate-100 rounded-sm p-4 w-full focus:outline-none focus:ring focus:ring-[#51c0ff]',
                    'border !border-red-500' => $errors->first('text'),
                ])></textarea>
    </div>
    @if (session()->has('success'))
        <div class="text-center leading-normal text-green-500">
            {{ session('success') }}
        </div>
    @else (session()->has('error'))
        <div class="text-center leading-normal text-red-500">
            {{ session('error') }}
        </div>
    @endif
    <x-form-button>
        Отправить
    </x-form-button>
</form>
