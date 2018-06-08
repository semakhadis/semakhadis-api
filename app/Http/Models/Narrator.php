<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Narrator extends Model
{
    protected $fillable = [
        'name', 'full_name', 'info', 'slug'
    ];

    protected $hidden = [
        'created_at','updated_at',
    ];

    public function Hadiths()
    {
    	return $this->hasMany('App\Http\Models\HadithNarrator','narrators_id');
    }
}
