<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MediaProvider extends Model
{
    public $table = "media_providers";

    public function items() {
    	return $this->hasMany('App\PlaylistItem');
    }
}
