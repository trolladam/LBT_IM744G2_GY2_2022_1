<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'topic_id', 'content'];

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->orderBy('created_at', 'desc');
    }

    public function getMinutesToReadAttribute()
    {
        $wordPerMinute = 200;
        $noOfWords = count(explode(" ", strip_tags($this->content)));

        return ceil($noOfWords / $wordPerMinute);
    }

    public function getHasCoverAttribute()
    {
        return $this->cover != null;
    }

    public function getCoverImageAttribute()
    {
        if ($this->has_cover) {
            return asset("uploads/posts/{$this->cover}");
        }
        return "https://via.placeholder.com/500";
    }
}
