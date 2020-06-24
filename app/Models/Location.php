<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
   protected $table = 'locations';
   /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = '__pk';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'location_name',
    ];
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    /**
     * Get the properties for the location.
     */
    public function location()
    {
        return $this->hasMany('App\Models\Property');
    }

}
