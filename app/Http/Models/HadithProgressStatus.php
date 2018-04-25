<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class HadithProgressStatus extends Model
{
    protected $fillable = [
        'status', 'slug'
    ];
}
