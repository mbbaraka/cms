<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected  $fillable = ['user_id', 'thumbnail', 'title', 'start_date', 'end_date', 'venue', 'slug', 'details','is_published'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
