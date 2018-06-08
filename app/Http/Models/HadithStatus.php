<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class HadithStatus extends Model
{
    protected $fillable = [
        'status', 'slug'
    ];

    protected $hidden = [
        'created_at','updated_at',
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
      $this->attributes['slug'] = str_replace(' ','-', strtolower($this->attributes['status']));
    }
}
