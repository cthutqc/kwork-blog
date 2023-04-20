<?php

namespace App\Http\Livewire;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateArticle extends Component
{
    public $name;
    public $text;
    public $h1;
    public $meta_title;
    public $meta_description;
    public $categories;
    public $category_id;

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function submit()
    {
        $this->validate([
            'name' => ['required'],
            'text' => ['required'],
            'category_id' => ['required'],
        ]);

        Article::create([
            'name' => $this->name,
            'text' => $this->text,
            'category_id' => $this->category_id,
            'h1' => $this->h1 ?? null,
            'meta_title' => $this->meta_title ?? null,
            'meta_description' => $this->meta_description ?? null,
            'user_id' => Auth::user()->id
        ]);

        session()->flash('success', 'Статья успешно отправлена на модерацию.');

        $this->reset('name', 'text', 'category_id', 'h1', 'meta_title', 'meta_description');
    }

    public function render()
    {
        return view('livewire.create-article');
    }
}
