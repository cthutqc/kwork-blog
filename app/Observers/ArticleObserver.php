<?php

namespace App\Observers;

use App\Models\Article;
use App\Models\Tag;

class ArticleObserver
{
    public function created(Article $article)
    {
        $arrayWords = [];
        $words = explode(' ', strip_tags($article->text));
        foreach($words as $word)
        {
            if(strlen($word) > 5)
                $arrayWords[] = $word;
        }

        $max_count = 6;

        if(count($arrayWords) < $max_count)
            $max_count = count($arrayWords);

        $tags = array_rand($arrayWords, rand(5, $max_count));
        foreach($tags as $tag) {
            $newTag = Tag::firstOrCreate([
                'name' => preg_replace('/[^a-z]/i','', $arrayWords[$tag])
            ]);

            $article->tags()->syncWithoutDetaching($newTag->id);
        }
    }
}
