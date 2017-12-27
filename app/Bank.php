<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $table = 'banks';

    protected $fillable = [
        'nama_bank', 'cabang', 'norek', 'pemilik', 'agent_id'
    ];
}
