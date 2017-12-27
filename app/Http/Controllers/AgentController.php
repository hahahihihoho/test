<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Redirect;
use Session;
use Cloudder;
use App\User;
use App\Agent;
use App\Bank;
use App\Follow;

class AgentController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function settingAgent($slug)
    {
    	if(Auth::user()->profileAgent($slug)->user_id == Auth::user()->id){
    		$data = Auth::user()->profileAgent($slug);
    		$bank = Bank::where('agent_id', Auth::user()->profileAgent($slug)->id)->first();
    		$data->bank = $bank;
    		return view('operator.setting-operator')->with('operator', $data);
    		//return $data;
    	}
    	else{
    		Session::flash('error_message', 'Anda tidak punya otoritas');
    		return redirect()->back();
    	}
    }

    public function updateAgent($slug, Request $req)
    {
    	if(Auth::user()->profileAgent($slug)->user_id == Auth::user()->id){
    		$agent = Agent::find(Auth::user()->profileAgent($slug)->id);
			$agent->name_agent = $req->username;
			$agent->alamat = $req->lokasi;
			$agent->hp = $req->phone;
			if ($req->hasFile('photo')) {
				Cloudder::upload($req->photo, "", [], ['profile']);
                $agent->photo = Cloudder::getPublicId();
                $photo = $req->photo;
			}
			$agent->save();
            Session::flash('success_message', 'Data Operator berhasi diubah');
			return redirect()->back();
			//return $req->photo;
    	}else{
            Session::flash('error_message', 'Anda tidak punya otoritas');
	    	return redirect()->back();
	    }
    }

    public function updateBank($slug, Request $req)
    {
    	if(Auth::user()->profileAgent($slug)->user_id == Auth::user()->id){
    		$bank = Bank::where('agent_id', Auth::user()->profileAgent($slug)->id)->first();
    		if($bank != null){
				$bank->nama_bank = $req->bank;
				$bank->cabang = $req->cab;
				$bank->norek = $req->rek;
				$bank->pemilik = $req->pemilik;
				$bank->save();
	            Session::flash('success_message', 'Data Payment berhasi diubah');
				return redirect()->back();
			}else{
				$newbank = new Bank();
				$newbank->nama_bank = $req->bank;
				$newbank->cabang = $req->cab;
				$newbank->norek = $req->rek;
				$newbank->pemilik = $req->pemilik;
				$newbank->agent_id = Auth::user()->profileAgent($slug)->id;
				$newbank->save();
	            Session::flash('success_message', 'Data Payment berhasi ditambahkan');
				return redirect()->back();
			}
			//return $req->photo;
    	}else{
            Session::flash('error_message', 'Anda tidak punya otoritas');
	    	return redirect()->back();
	    }
    }

    public function followAgent($slug)
    {
    	$agent = Agent::where('slug', $slug)->first();
    	$cek = Follow::where('agent_id', $agent->id)->where('user_id', Auth::user()->id)->count();
    	if($cek == 0){
    		$follow = new Follow();
    		$follow->user_id = Auth::user()->id;
    		$follow->agent_id = $agent->id;
    		$follow->save();
    		return redirect()->back();
    	}else{
    		Session::flash('error_message', 'Sudah difollow');
    		return redirect()->back();
    	}
    }

    public function unfollowAgent($slug)
    {
    	$agent = Agent::where('slug', $slug)->first();
    	$cek = Follow::where('agent_id', $agent->id)->where('user_id', Auth::user()->id)->count();
    	if($cek == 1){
    		$remove = Follow::where('agent_id', $agent->id)->where('user_id', Auth::user()->id)->first();
    		$remove->delete();
    		return redirect()->back();
    	}else{
    		Session::flash('error_message', 'Tidak ada follow agent');
    		return redirect()->back();
    	}
    }
}
