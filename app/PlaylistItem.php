<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlaylistItem extends Model
{
    //
	public $table = "playlist_items";

	protected $fillable = array('link', 'playlist_id', 'media_provider_id');

	public function playlist()
	{
		return $this->belongsTo('App\Playlist');
	}

	public function media_provider() {
		return $this->belongsTo('App\MediaProvider');
	}
}
