<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'published_at',
        'category_id',
        'slug',
        'cover'
    ];

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function tags() {
        return $this->belongsToMany('App\Tag');
    }

    public static function getUniqueSlug($title) {

        $slug = Str::slug( $title );
        $slug_base = $slug;

        $counter = 1;

        $post_present = Post::where('slug', $slug)->first();

        while( $post_present ) {
            $slug = $slug_base . '-' . $counter;
            $counter++;
            $post_present = Post::where('slug', $slug)->first();
        }

        return $slug;

    }
}
