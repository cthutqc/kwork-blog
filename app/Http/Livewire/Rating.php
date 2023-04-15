<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Rating extends Component
{
    public $amount;
    public Article $article;

    protected $listeners = ['rate'];

    public function rate($amount)
    {
        if(!\App\Models\Rating::where('article_id', $this->article->id)->where('user_id', Auth::user()->id)->exists()) {
            \App\Models\Rating::create([
                'score' => $amount['amount'],
                'article_id' => $this->article->id,
                'user_id' => Auth::user()->id,
            ]);
        }
    }

    public function render()
    {
        return view('livewire.rating');
    }
}
