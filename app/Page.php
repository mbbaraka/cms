<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['user_id', 'thumbnail', 'title', 'slug', 'image_url', 'details', 'post_type', 'is_published', 'is_root', 'root'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
