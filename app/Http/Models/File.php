<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [
	    'name', 
	    'mime', 
	    'path',
	    'thumbnail_path', 
	    'description',
	    'created_by', 
    ];

    public function setCreatedByAtAttribute($user_id)
    {
    	if(isset($user_id))
        	$this->attributes['created_by'] = Auth::user()->id;;
    }

    public function setMimeAttribute($user_id)
    {
    	if(isset($user_id))
        	$this->attributes['created_by'] = Auth::user()->id;;
    }
    
    public function Referenceable()
    {
        return $this->morphTo();
    }

}
