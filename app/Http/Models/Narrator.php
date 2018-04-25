<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Narrator extends Model
{
    protected $fillable = [
        'name', 'fullname', 'info',
    ];

    public function Hadiths()
    {
    	return $this->hasMany('App\Http\Models\HadithNarrator','narrators_id')
    }
}
