<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class HadithReference extends Model
{
    protected $fillable = [
        'pages', 'chapter','hadiths_id', 'books_id',
    ];

    public function Hadiths()
    {
      return $this->hasMany('App\Http\Models\HadithBook','hadiths_id')
    }

    public function Books()
    {
      return $this->hasMany('App\Http\Models\Books','books_id')
    }
}
