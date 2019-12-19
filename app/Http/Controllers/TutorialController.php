<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tutorial;

class TutorialController extends Controller
{
    public function get_tutorials(Request $request)
    {
    	$tutorials  = Tutorials:all();
    	return $tutorials->toJson();
    }
}
