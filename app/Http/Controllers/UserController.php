<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;

use App\User;

class UserController extends Controller
{
    public function create(Request $request)
    {	
    	//if the app sends a request to create_user with email
    	//we will create a user registered user (can save playlists)
    	if($request->has('email')) {
            $user;
            try {
                $user = User::where('firebase_id', '=', $request->firebase_id)->firstOrFail();

            }catch(ModelNotFoundException $e) {
                
                $user = new User();    
            }

            $user->name = $request->name;
            $user->email = $request->email;
            $user->firebase_id = $request->firebase_id;
            $user->password = Hash::make($request->password);
            $user->registered = true;

            $user->save();
    		

    	}else {
    		//only grab the firebase_id and save it 
    		//to be used as a owner of a playlist
    		$user = new User();
    		//TODO: make sure the check that this is actually a firebase_id
    		$user->firebase_id = $request->firebase_id;
            $user->registered = false;


    		$user->save();
    	}

    }

    public function get(Request $request) 
    {
    	$user = User::find($request->only('user_id'));
    	return response()->json($user->toJson());
    }
}
