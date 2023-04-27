<?php

namespace App\Http\Livewire;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use App\Notifications\NewArticleAdded;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateArticle extends Component
{
    use WithFileUploads;

    const EVENT_VALUE_UPDATED = 'trix_value_updated';

    public $name;
    public $text;
    public $h1;
    public $meta_title;
    public $meta_description;
    public $categories;
    public $category_id;
    public $trixId;
    public $image;

    public $listeners = [
        Trix::EVENT_VALUE_UPDATED // trix_value_updated()
    ];

    public function trix_value_updated($value){
        $this->text = $value;
    }

    public function updatedImage()
    {
        $this->image->store('photos');
    }

    public function mount()
    {
        $this->trixId = 'trix-' . uniqid();

        $this->categories = Category::all();
    }

    public function submit()
    {
        $this->validate([
            'name' => ['required'],
            'text' => ['required'],
            'category_id' => ['required'],
        ]);

        $article = Article::create([
            'name' => $this->name,
            'text' => $this->text,
            'category_id' => $this->category_id,
            'h1' => $this->h1 ?? null,
            'meta_title' => $this->meta_title ?? null,
            'meta_description' => $this->meta_description ?? null,
            'user_id' => Auth::user()->id
        ]);

        if($this->image) {
            $path = Storage::putFile('photos', $this->image);

            $article->addMedia(storage_path('app/' . $path))->toMediaCollection();
        }

        if(app()->isProduction()) {
            User::whereHas('roles', function ($q) use ($article){
                $q->where('name', 'admin');
            })->each(function ($user) use($article){
                $user->notify(new NewArticleAdded($article));
            });
        }

        session()->flash('success', 'Статья успешно отправлена на модерацию.');

    }

    public function render()
    {
        return view('livewire.create-article');
    }
}
