<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'user_id'
    ];

    public $table = "playlists";

    public function user() {
    	return $this->belongsTo('App\User');
    }

    public function items() {
    	return $this->hasMany('App\PlaylistItem');
    }
}
