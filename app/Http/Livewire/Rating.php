<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Rating extends Component
{
    public Article $article;

    protected $listeners = ['refreshRating' => '$refresh'];

    public function render()
    {
        return view('livewire.rating');
    }
}
