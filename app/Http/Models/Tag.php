<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'tag', 'slug'
    ];

    protected $hidden = [
        'created_at','updated_at',
    ];

    public function Hadiths()
    {
        return $this->belongsToMany('App\Http\Models\Hadiths', 'hadith_tags');
    }

}
