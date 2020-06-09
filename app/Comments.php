<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $fillable = [
    	'name',
    	'email',
    	'message',
    	'post_id',
    	'is_published',
        'type'
    ];
    public function post()
	  {
	    return $this->belongsTo(Post::class);
	  }
}
