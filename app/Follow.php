<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $table = 'follow_agent';

    protected $fillable = [
        'user_id', 'agent_id'
    ];
}
