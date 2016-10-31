<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        //
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        //
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'primary_agency_for_em' => 'boolean',
    ];

    /**
     * Get the owner of the department.
     */
    public function owner()
    {
        return $this->belongsTo(Spark::userModel(), 'owner_id');
    }

    /**
     * Get the department photo URL attribute.
     *
     * @param  string|null  $value
     * @return string|null
     */
    public function getPhotoUrlAttribute($value)
    {
        return empty($value)
                ? 'https://www.gravatar.com/avatar/'.md5($this->name.'@spark.laravel.com').'.jpg?s=200&d=mm'
                : url($value);
    }
}
