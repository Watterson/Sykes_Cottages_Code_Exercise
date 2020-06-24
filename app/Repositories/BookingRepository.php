<?php namespace App\Repositories;

use App\Models\Booking;

class BookingRepository
{
  public function checkDates($propertyID, $search)
  {
    return Booking::join('properties', 'bookings._fk_property', '=', 'properties.__pk' )
                  ->where('_fk_property', $propertyID)
                  ->whereNotBetween('bookings.start_date', array($search['check_in'], $search['check_out']))
                  ->whereNotBetween('bookings.end_date', array($search['check_in'], $search['check_out']))
                  ->get();
  }


}
