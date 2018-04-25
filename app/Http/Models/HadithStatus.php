<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class HadithStatus extends Model
{
    protected $fillable = [
        'status', 'slug'
    ];
}
