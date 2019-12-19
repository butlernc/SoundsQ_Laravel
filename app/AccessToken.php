<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccessToken extends Model
{
    public $table = "access_tokens";

    public function user() {
    	return $this->belongsTo('App\User');
    }

    public function media_provider() {
    	return $this->hasOne('App\MediaPlayer');
    }
}
