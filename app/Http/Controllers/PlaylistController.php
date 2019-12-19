<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Playlist;
use App\User;

class PlaylistController extends Controller
{
    public function create(Request $request)
    {
    	$playlist = new Playlist();
    	$playlist->name = $request->name;
    	$user = User::find($request->user_id);
    	$playlist->user = $user;
    	$playlist->save();

    	return $playlist->toJson();
    }

    public function get(Request $request)
    {
    	$playlist = Playlist::find($request->playlist_id);
    	
        //attach items
        $playlist->items();
        
        //true if owner, false if spectator
        $is_owner = ($playlist->user_id == $request->user_id);
        
        //create our response object with the playlist.
        $response = array(['playlist' => $playlist->toJson(), 'is_owner' => $is_owner]);

        return response()->json($response);
    }

    
}
