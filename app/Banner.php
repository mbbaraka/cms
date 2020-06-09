<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected  $fillable = ['user_id', 'name', 'image_url', 'banner_desc','url','is_published'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
