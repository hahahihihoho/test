<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Agent;
use Auth;

class User extends Authenticatable
{
    use Notifiable;
    use Sluggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'hp', 'photo', 'cover', 'aktif'
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function isAdmin(){
        if($this->role == '0')
            return true;
        else
            return false;
    }

    public function isYou($slug){
        if(Auth::user()->slug == $slug)
            return true;
        else
            return false;
    }

    public function cekAgent(){
        return Agent::where('user_id', Auth::user()->id)->count();
    }

    public function dataAgent(){
        return Agent::where('user_id', Auth::user()->id)->first();
    }

    public function profileAgent($slug){
        return Agent::where('slug', $slug)->first();
    }

    public function cekthisAgent($slug){
        return Agent::where('slug', $slug)->where('user_id', Auth::user()->id)->count();
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
