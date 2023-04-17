<?php

namespace App\Http\Livewire;

use App\Models\Article;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LikeIt extends Component
{

    public Article $article;

    public function like()
    {
        if(!Auth::check()) {
            return;
        }
        Like::firstOrCreate([
            'article_id' => $this->article->id,
            'user_id' => Auth::user()->id,
        ]);
    }

    public function render()
    {
        return view('livewire.like-it', [
            'likes' => Article::find($this->article->id)->totalLikes()
        ]);
    }
}
