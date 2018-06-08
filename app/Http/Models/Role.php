<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name', 'slug', 'description',
    ];

    protected $hidden = [
        'created_at','updated_at',
    ];

    public function Users()
    {
    	return $this->belongsTo('App\Users','roles_id');
    }
}
