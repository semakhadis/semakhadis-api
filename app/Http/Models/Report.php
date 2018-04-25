<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
    'title', 'description'
    ];

    public function setCreatedByAtAttribute($user_id)
    {
    	if(isset($user_id))
        	$this->attributes['created_by'] = Auth::user()->id;;
    }

    public function setStatusAtAttribute($status)
    {
     	$this->attributes['status'] = $status;
    	switch ($status) {
    		case 'approved':
     			$attr_status_user = 'approved_by';
    			break;
    		case 'rejected':
     			$attr_status_user = 'rejected_by';
    			break;
    		
    		default:
     			$attr_status_user = null;
    			break;
    	}

    	if(!is_null($attr_status_user))
        	$this->attributes[$attr_status_user] = Auth::user()->id;
    }

    public function CreatedBy()
    {
        return $this->hasOne('App\User','created_by');
    }

    public function ApprovedBy()
    {
        return $this->hasOne('App\User','approved_by');
    }

    public function RejectedBy()
    {
        return $this->hasOne('App\User','rejected_by');
    }

    public function Reference()
    {
        return $this->morphTo();
    }
}
