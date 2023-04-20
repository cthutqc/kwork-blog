<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class AvatarUpload extends Component
{
    use WithFileUploads;

    public $image;
    public $user;
    public $path;
    public $preview;

    public function mount()
    {
        $this->user = Auth::user();
    }

    public function updatedImage()
    {
        $this->path = $this->image->store('photos');

        $this->path = Storage::putFile('temp', $this->image);

        $this->user->clearMediaCollection();

        $this->user->addMedia(storage_path('app/' . $this->path))->toMediaCollection();
    }

    public function render()
    {
        return view('livewire.avatar-upload');
    }
}
