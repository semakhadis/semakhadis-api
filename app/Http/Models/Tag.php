<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'tag', 'slug'
    ];
}
