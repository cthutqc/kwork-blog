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

        if($arrayWords) {
            $max_count = 6;

            if(count($arrayWords) < $max_count)
                $max_count = count($arrayWords);

            if(count($arrayWords) < 5) {
                $min_count = 1;
            } else {
                $min_count = 5;
            }

            $tags = array_rand($arrayWords, rand($min_count, $max_count));

            if($tags) {
                foreach($tags as $tag) {
                    $newTag = Tag::firstOrCreate([
                        'name' => preg_replace('/[^a-z]/i','', $arrayWords[$tag])
                    ]);

                    $article->tags()->syncWithoutDetaching($newTag->id);
                }
            } else {
                $newTag = Tag::firstOrCreate([
                    'name' => preg_replace('/[^a-z]/i','', $arrayWords[$tags])
                ]);

                $article->tags()->syncWithoutDetaching($newTag->id);
            }
        }
    }
}
