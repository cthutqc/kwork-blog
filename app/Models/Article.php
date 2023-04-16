<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Article extends Model
{
    use HasFactory, SoftDeletes, HasSlug;

    protected $guarded = ['id'];

    protected $dates = ['deleted_at'];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tags():BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function comments():HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function ratings():HasMany
    {
        return $this->hasMany(Rating::class);
    }

    public function avgRating()
    {
        return round($this->ratings->avg('score'));
    }

    public function likes():HasMany
    {
        return $this->hasMany(Like::class);
    }

    public function totalLikes()
    {
        return $this->likes->count();
    }

    public function getShortenTextAttribute():string
    {
        return \Str::limit($this->attributes['text'], 100, '...');
    }
}
