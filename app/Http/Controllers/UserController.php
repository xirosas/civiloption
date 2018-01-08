<?php

namespace CivilOption\Http\Controllers;

use Illuminate\Http\Request;
use CivilOption\Http\Requests;
use Auth;

class UserController extends Controller
{
    public function profile(){
    	return view('profile', array('user' => Auth::user()) );
    }

    public function update_avatar(Request $request){

    	// Handle the user upload of avatar
    	if($request->hasFile('avatar')){
    		$avatar = $request->file('avatar')->store('avatars');

    		$user = Auth::user();
    		$user->avatar = $avatar;
    		$user->save();
    	}

    	return view('profile', array('user' => Auth::user()) );

    }
}
