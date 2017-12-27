<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Agent;
use App\Follow;
use App\Trip;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

            // $strQuery = "SELECT  p.id, c.id, c.img, p.*
            // FROM checkin AS c INNER JOIN trip AS p
            // ON c.post_id = p.id
            // WHERE c.state = 0 AND post_id IN                                                                                                                                  
            // (

            //     SELECT p.id
            //     FROM posts AS p INNER JOIN following AS f 
            //     WHERE p.user_id = f.followingid AND f.user_id = ".$userAuth->id."
            // ) OR p.user_id = ".$userAuth->id." AND c.state = 0
            // GROUP BY p.id ORDER BY p.created_at DESC;";

            // $posts = DB::select($strQuery);
            // foreach ($posts as $p) {
            //     $userPost = User::find($p->user_id);
            //     unset($userPost->info);
            //     unset($userPost->phone);
            //     unset($userPost->coverimage);
            //     unset($userPost->email);
            //     unset($userPost->state_post);
            //     unset($userPost->created_at);
            //     unset($userPost->updated_at);
            //     $p->user = $userPost;

            //     $commentPost = DB::select("select * from comments where comments.post_id = ".$p->id);
                
            //     $metaDataComment['count'] = count($commentPost); 
            //     $p->comments = $metaDataComment;
            //     $likePost = DB::select("select * from likes where likes.post_id = ".$p->id);
            //     $metaDataLike['count'] = count($likePost);
            //     $metaDataLike['isLike'] = DB::select("select * from likes where likes.post_id = ".$p->id." and likes.user_id =".$p->user_id)?1:0;
            //     $p->likes = $metaDataLike;

                
            //     unset($p->user_id);
            // } 
            // return view('home')->with('posts',$posts);



        $trip = Trip::where('aktif', 'Y')->paginate(10);
        foreach ($trip as $val) {
            $agent = Agent::where('id', $val->id_operator)->first();
            $val->agent= $agent;
        }
        //return $trip;
        return view('home')->with('data', $trip);
    }

    public function profileUser($slug)
    {
        $data = User::where('slug', $slug)->first();
        $agent = Agent::where('user_id', $data->id)->first();
        $data->agent = $agent;
        return view('user.profile-user')->with('user',$data);
    }

    public function profileAgent($slug)
    {
        $data = Agent::where('slug', $slug)->first();
        $trip = Trip::where('id_operator', $data->id)->paginate(10);
        $data->trip = $trip;
        if(Auth::user()){
            $follow = Follow::where('user_id', Auth::user()->id)->where('agent_id', $data->id)->count();
            $data->follow = $follow;
        }else{
            $data->follow = 0;
        }
        
        return view('operator.profile')->with('operator',$data);
        //return Auth::user()->cekthisAgent($slug);
        // if(Auth::user()->cekAgent($slug) != null)
        //     return 'has agent';
        // else
        //     return 'no agent';
            // $data = User::where('slug', $slug)->first();
            // return view('user.profile-user')->with('user',$data);
    }
}
