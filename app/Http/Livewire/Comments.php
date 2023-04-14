<?php

namespace App\Http\Livewire;

use App\Models\Article;
use App\Models\Comment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Comments extends Component
{
    public $text;
    public $parentId = null;
    public Article $article;

    protected $listeners = ['refresh' => '$refresh'];

    public function addComment()
    {
        if(!Auth::check())
        {
            session()->flash('error', 'Зарегистрируйтесь на сайта для оставления комментариев.');
            return;
        }

        $lastUserComment = Comment::query()
            ->where('user_id', Auth::user()->id)
            ->orderByDesc('created_at')
            ->select('created_at')
            ->first();

        if(Carbon::parse($lastUserComment->created_at)->diffInMinutes() < 1) {
            session()->flash('error', 'Вы оставляли комментарий менее минуты назад, пожалуйста подождите.');
            return;
        }

        $this->validate([
            'text' => 'required',
        ]);

        Comment::create([
            'text' => $this->text,
            'user_id' => Auth::user()->id,
            'article_id' => $this->article->id,
            'parent_id' => $this->parentId,
        ]);

        $this->text = '';

        //$this->emit('refresh');

        session()->flash('success', 'Ваш комментарий успешно отправлен.');

    }

    public function answer($commentId)
    {
        $this->parentId = $commentId;
    }

    public function render()
    {
        return view('livewire.comments');
    }
}
