<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name', 'slug', 'description',
    ];

    public function Users()
    {
    	return $this->belongsTo('App\Users','roles_id')
    }
}
