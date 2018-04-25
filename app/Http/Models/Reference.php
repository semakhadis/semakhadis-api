<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    protected $fillable = [
        'title', 'description', 'author',
    ];

    public function Hadiths()
    {
    	return $this->hasMany('App\Http\Models\HadithBook','books_id');
    }
}
