<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Church extends Model
{
    protected  $fillable = ['user_id', 'name', 'subzone', 'zone', 'overseer', 'region', 'contact', 'image_url'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
