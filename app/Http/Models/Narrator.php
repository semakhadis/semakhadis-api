<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Narrator extends Model
{
    protected $fillable = [
        'name', 'full_name', 'info', 'slug'
    ];

    public function Hadiths()
    {
    	return $this->hasMany('App\Http\Models\HadithNarrator','narrators_id');
    }
}
