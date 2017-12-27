<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Cloudder;
use redirect;
use Session;

class UserController extends Controller
{
    
	public function __construct()
	{
		$this->middleware('auth');
	}

    public function settingUser($slug)
    {
    	if(Auth::user()->isYou($slug))
    		return view('user.setting-user');
    	else{
    		Session::flash('error_message', 'Anda tidak punya otoritas');
    		return redirect()->back();
    	}
    }

    public function updateUser($slug, Request $req)
    {
    	if(Auth::user()){
        	if(Auth::user()->isYou($slug)){
        		$user = User::find(Auth::user()->id);
    			$user->name = $req->name;
    			$user->email = $req->email;
    			$user->hp = $req->hp;
    			if ($req->hasFile('photo')) {
    				Cloudder::upload($req->photo, "", [], ['profile']);
                    $user->photo = Cloudder::getPublicId();
                    $photo = $req->photo;
    			}
    			$user->save();
                Session::flash('success_message', 'Data user berhasi diubah');
    			return redirect()->back();
        	}else{
                Session::flash('error_message', 'Anda tidak punya otoritas');
    	    	return redirect()->back();
    	    }
        }else{
            return redirect('login');
        }
    }
}
