<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trip;
use App\User;
use App\Agent;
use App\Follow;
use Redirect;
use Session;
use Auth;
use Cloudder;

class tripController extends Controller
{

	public function __construct()
	{
		//$this->middleware('auth');
	}

    public function createTrip(Request $req)
    {
        $harga = str_replace('.', '', $req->prices);
    	$trip = new Trip();
    	$trip->id_operator = Auth::user()->dataAgent()->id;
    	$trip->judul_trip = $req->judul;
    	$trip->tujuan = $req->tujuan;
    	$trip->tgl_mulai = $req->datefrom;
    	$trip->tgl_selesai = $req->dateto;
    	$trip->meeting_point = $req->meetpoint;
    	$trip->kuota = $req->jlhkuota;
    	$trip->deskripsi = $req->deskripsi;
    	$trip->price = $harga;
    	$trip->include = $req->includes;
    	$trip->exclude = $req->notincludes;
    	$trip->syarat = $req->terms;
    	$trip->perlengkapan = $req->equipment;
    	$trip->info = $req->info;
    	$trip->aktif = 'Y';

    	if ($req->hasFile('photo')) {
        	Cloudder::upload($req->photo, "", [], ['trip']);
            $trip->photo = Cloudder::getPublicId();
        }

        $trip->save();
        Session::flash('success_message', 'Trip berhasil dibuat');
    	return redirect()->route('detail-trip', ['slug' => $trip->slug]);
    }

    public function pageCreate()
    {
        return view('trip.create');
    }

    public function detailTrip($slug)
    {
    	$trip = Trip::where('slug', $slug)->first();
        $agent = Agent::where('id', $trip->id_operator)->first();
        $related = Trip::inRandomOrder()->where('id', '!=', $trip->id)->where('aktif', 'Y')->take(3)->get();
        foreach ($related as $value) {
            $related_agent = Agent::where('id', $value->id_operator)->first();
            $value->relatedagent = $related_agent;
        }

        $trip->related = $related;

        if(Auth::user()){
            $follow = Follow::where('user_id', Auth::user()->id)->where('agent_id', $trip->id_operator)->count();
            $trip->follow = $follow;
        }else{
            $trip->follow = 0;
        }

        $trip->agent = $agent;
    	return view('trip.detail')->with('data', $trip);
    }

    public function buyTrip($slug)
    {
    	$trip = Trip::where('slug', $slug)->first();
    	return view('trip.beli')->with('data', $trip);
    }

    public function finishOrder($slug)
    {
    	return view('trip.selesaibeli');
    }
}
