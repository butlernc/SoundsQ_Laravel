<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use App\PlaylistItem;
use App\Services\SoundCloudService;

/**
 * This controller handles taking in a item id
 * and returning a stream link for that item.
 */
class StreamLinkController extends Controller
{	
	/**
	 * @param Request $request
	 * item id
	 */
    public function request_stream_link(Request $request)
    {
    	try {
            Log::debug($request->item_id);
    		$item = PlaylistItem::find($request->item_id);
    		
    		//get class name string from item's media provider str
    		// $class = '\Foo\Bar\MyClass';
    		$class_str = "App\\Services\\" . $item->media_provider->service_class_name;

    		//create new instance of the needed media provider service
    		$media_service = new $class_str();

    		$stream_link = $media_service->item_play_request($item);
    		$r = array('item_id' => $item->id, 'stream_link' => $stream_link);

    		return response()->json($r);
    		
    	}catch(ModelNotFoundException $e) {
    		return response()->json(['success' => false]);
    	}
    }
}
