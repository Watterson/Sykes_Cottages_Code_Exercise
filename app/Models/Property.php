<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
   protected $table = 'properties';
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
        '_fk_location', 'property_name', 'near_beach', 'accepts_pets', 'sleeps', 'beds',
    ];
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    /**
    * Get the location where the property is from.
    */
   public function property()
   {
       return $this->belongsTo('App\Models\Location');
   }
   /**
    * Get the Bookings for the Property.
    */
   public function booking()
   {
       return $this->hasMany('App\Models\Booking');
   }
}
