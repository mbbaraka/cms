<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sermon extends Model
{
    protected $fillable = ['user_id', 'title', 'thumbnail', 'video_url', 'audio_url', 'date_of_sermon', 'is_published'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
