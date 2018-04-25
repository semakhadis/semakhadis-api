<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class HadithNarrator extends Model
{
    protected $fillable = [
        'pages', 'chapter','hadiths_id', 'books_id',
    ];

    public function Hadiths()
    {
    	return $this->hasMany('App\Http\Models\HadithBook','hadiths_id')
    }

    public function Narrators()
    {
    	return $this->hasMany('App\Http\Models\Narrators','narrators_id')
    }
}
