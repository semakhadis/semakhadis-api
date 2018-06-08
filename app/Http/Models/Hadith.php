<?php

namespace App\Http\Models;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Hadith extends Model
{
    protected $fillable = [
        'title', 
        'slug', 
        'text_malay', 
        'text_arab', 
        'description', 
        'hadith_statuses_id', 
        'hadith_progress_statuses_id', 
        'created_by', 
    ];

        /**
     * Boot function for using with User Events
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model)
        {
            $model->setSlugAttribute();
        });

        static::updating(function ($model)
        {
            $model->setSlugAttribute();
        });
    }

    public function setSlugAttribute()
    {
      $this->attributes['slug'] = str_replace(' ','-', strtolower($this->attributes['title']));
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

    public function Narrators()
    {
        return $this->belongsToMany('App\Http\Models\Narrator','hadith_narrators', 'hadiths_id', 'narrators_id')->withTimestamps();
    }

    public function References()
    {
        return $this->belongsToMany('App\Http\Models\Reference','hadith_references', 'hadiths_id', 'references_id')->withTimestamps();
    }

    public function HadithStatus()
    {
        return $this->belongsTo('App\Http\Models\HadithStatus','hadith_statuses_id');
    }

    public function HadithProgressStatus()
    {
        return $this->belongsTo('App\Http\Models\HadithProgressStatus','hadith_progress_statuses_id');
    }

    public function CreatedBy()
    {
        return $this->belongsTo('App\User','created_by');
    }

    public function Tags()
    {
        return $this->belongsToMany('App\Http\Models\Tag','hadith_tags', 'hadiths_id', 'tags_id')->withTimestamps();
    }
}
