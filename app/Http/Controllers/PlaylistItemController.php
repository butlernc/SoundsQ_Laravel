<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use App\User;
use App\Playlist;
use App\PlaylistItem;
use App\MediaProvider;
use App\Service\PushService;

class PlaylistItemController extends Controller
{	
	/**
	 *
	 * @param Request $request
	 * 
	 * user_id: sender user id
	 * playlist_id: playlist to add item to
	 * link: link shared from MediaProvider app to SoundsQ
	 * 
	 */
    public function create(Request $request) {
    	
    	//user requesting to create the playlist item
    	$sending_user = User::find($request->user_id);

        //selected playlist
        $playlist = Playlist::find($request->playlist_id);

    	//playlist owner
    	$receiving_user = $playlist->user;

    	//create the song item
    	$item = new PlaylistItem(['link' => $request->link]);

        //add the song to the correct media provider
        $item->media_provider()->associate($this->media_provider($request->link));

        //add the song to the playlist
        $item->playlist()->associate($playlist);

        $item->save();

    	//update the phone if the owner isn't creating this playlist item.
    	if($sending_user->firebase_id != $receiving_user->firebase_id) {
    		$push_service = new PushService();

    		//TODO: include data from MediaProviderService
    		$push_service->send_playlist_item($receiving_user, $item);
    	}
    }

    /**
     * Takes in a link from a MediaProvider
     * and returns the type of media provider id.
     * 
     * This is used so we can associate a playlist item
     * with a MediaProvider via the link the sending user sent.
     *
     * @param 
     */
    private function media_provider($link)
    {

    	//regex the link for the provider's name
    	preg_match_all("/https:\/\/(\w+)/", $link, $matches);
    	//get the provider from the db
    	$media_provider = MediaProvider::where('lower_case_name', '=', $matches[1])->first();
    	return $media_provider;
    }
}
