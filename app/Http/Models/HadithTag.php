<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class HadithTag extends Model
{
    public $timestamps = ['created_at', 'updated_at'];

    protected $hidden = [
        'created_at','updated_at',
    ];
}
