<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    protected $guarded = [];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function followers()
    {
        return $this->belongsToMany('App\User', 'profile_user', 'profile_id', 'user_id');
    }

    public function getImage() {
        $imagePath = $this->image ?? 'avatars/default.jpg';
        return "/storage/".$imagePath;
    }
}
