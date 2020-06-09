<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
	protected $fillable = ['user_id', 'logo', 'favicon', 'seo_title', 'seo_keywords', 'seo_desc', 'contact', 'address', 'analytics', 'twitter_url', 'facebook_url', 'youtube_url', 'copyright_text', 'footer_text'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
