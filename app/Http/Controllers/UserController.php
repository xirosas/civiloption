<?php

namespace CivilOption\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use CivilOption\Http\Requests;
use Illuminate\Support\Facades\Storage;
use Auth;

class UserController extends Controller
{
    public function profile(){
    	return view('profile', array('user' => Auth::user()) );
    }

    public function update_avatar(Request $request){

    	// Handle the user upload of avatar
    	if($request->hasFile('avatar')){
    		$avatar = Storage::putFile('public',new File($request->file('avatar')));

    		$user = Auth::user();
    		$user->avatar = $avatar;
    		$user->save();
    	}

    	return view('profile', array('user' => Auth::user()) );

    }
}
