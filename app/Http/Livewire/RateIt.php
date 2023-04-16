<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RateIt extends Component
{
    public $amount;
    public Article $article;

    protected $listeners = ['rate', 'refreshRating' => '$refresh'];

    public function rate($amount)
    {
        if(!Auth::check()) {
            session()->flash('error', 'Только зарегистрированные пользователи могут голосовать за рейтинг.');
            return;
        }
        if(!\App\Models\Rating::where('article_id', $this->article->id)->where('user_id', Auth::user()->id)->exists()) {
            \App\Models\Rating::create([
                'score' => $amount['amount'],
                'article_id' => $this->article->id,
                'user_id' => Auth::user()->id,
            ]);

            $this->emit('refreshRating');

        } else {
            session()->flash('error', 'Вы уже оценили эту статью.');
        }
    }

    public function render()
    {
        return view('livewire.rate-it');
    }
}
