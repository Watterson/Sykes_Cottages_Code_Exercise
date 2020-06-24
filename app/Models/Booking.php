<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
   protected $table = 'bookings';
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
        '_fk_property', 'start_date', 'end_date',
    ];
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    /**
    * Get the property which the booking was made for.
    */
   public function property()
   {
       return $this->belongsTo('App\Models\Property');
   }
}
