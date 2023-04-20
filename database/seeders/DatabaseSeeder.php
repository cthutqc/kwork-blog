<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Article;
use App\Models\Category;
use App\Models\Page;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         \App\Models\User::factory(10)->create();

        $this->call([
            RoleSeeder::class,
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Page::create([
            'name' => 'О сайте',
            'slug' => 'about',
            'text' => fake()->text(5000),
        ]);

        Page::create([
            'name' => 'Поддержка',
            'slug' => 'support'
        ]);

        Category::factory(5)->create()->each(function ($category){
            $category->articles()->saveMany(Article::factory(30)->create()->each(function ($article){
                $arrayWords = [];
                $words = explode(' ', strip_tags($article->text));
                foreach($words as $word)
                {
                    if(strlen($word) > 5)
                        $arrayWords[] = $word;
                }

                $tags = array_rand($arrayWords, rand(5, 10));
                foreach($tags as $tag) {
                    $newTag = Tag::firstOrCreate([
                        'name' => preg_replace('/[^a-z]/i','', $arrayWords[$tag])
                    ]);

                    $article->tags()->syncWithoutDetaching($newTag->id);
                }
            }));
        });
    }
}
