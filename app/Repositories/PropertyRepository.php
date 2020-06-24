<?php namespace App\Repositories;

use App\Models\Property;

class PropertyRepository
{
    public function all()
    {
        return Property::join('locations', 'properties._fk_location', '=', 'locations.__pk')
                        ->select('properties.__pk', 'properties.property_name', 'locations.location_name', 'properties.near_beach', 'properties.accepts_pets', 'properties.sleeps', 'properties.beds')
                        ->get();
    }

    public function checkMainFeatures($search)
    {
        return Property::join('locations', 'properties._fk_location', '=', 'locations.__pk')
                        ->where('_fk_location', $search['location'])
                        ->where('beds', '>=', $search['beds'])
                        ->where('sleeps', '>=', $search['people'])
                        ->select('properties.__pk', 'properties.property_name', 'locations.location_name', 'properties.near_beach', 'properties.accepts_pets', 'properties.sleeps', 'properties.beds')
                        ->get();
    }

    public function checkWithPets($search)
    {
        return Property::join('locations', 'properties._fk_location', '=', 'locations.__pk')
                        ->where('_fk_location', $search['location'])
                        ->where('beds', '>=', $search['beds'])
                        ->where('sleeps', '>=', $search['people'])
                        ->where('accepts_pets', TRUE)
                        ->select('properties.__pk', 'properties.property_name', 'locations.location_name', 'properties.near_beach', 'properties.accepts_pets', 'properties.sleeps', 'properties.beds')
                        ->get();
    }

    public function checkNearBeach($search)
    {
        return Property::join('locations', 'properties._fk_location', '=', 'locations.__pk')
                        ->where('_fk_location', $search['location'])
                        ->where('beds', '>=', $search['beds'])
                        ->where('sleeps', '>=', $search['people'])
                        ->where('near_beach', TRUE)
                        ->select('properties.__pk', 'properties.property_name', 'locations.location_name', 'properties.near_beach', 'properties.accepts_pets', 'properties.sleeps', 'properties.beds')
                        ->get();
    }

    public function checkAll($search)
    {
        return Property::join('locations', 'properties._fk_location', '=', 'locations.__pk')
                        ->where('_fk_location', $search['location'])
                        ->where('beds', '>=', $search['beds'])
                        ->where('sleeps', '>=', $search['people'])
                        ->where('accepts_pets', TRUE)
                        ->where('near_beach', TRUE)
                        ->select('properties.__pk', 'properties.property_name', 'locations.location_name', 'properties.near_beach', 'properties.accepts_pets', 'properties.sleeps', 'properties.beds')
                        ->get();
    }

    public function searchByLocation($location)
    {
        return Property::join('locations', 'properties._fk_location', '=', 'locations.__pk')
                        ->where('properties._fk_location', $location)
                        ->select('properties.__pk', 'properties.property_name', 'locations.location_name', 'properties.near_beach', 'properties.accepts_pets', 'properties.sleeps', 'properties.beds')
                        ->get();
    }

    public function searchByBeds($beds)
    {
        return Property::join('locations', 'properties._fk_location', '=', 'locations.__pk')
                        ->where('properties.beds', '>=', $beds)
                        ->select('properties.__pk', 'properties.property_name', 'locations.location_name', 'properties.near_beach', 'properties.accepts_pets', 'properties.sleeps', 'properties.beds')
                        ->get();
    }

    public function searchByPeople($people)
    {
        return Property::join('locations', 'properties._fk_location', '=', 'locations.__pk')
                        ->where('properties.sleeps', '>=', $people)
                        ->select('properties.__pk', 'properties.property_name', 'locations.location_name', 'properties.near_beach', 'properties.accepts_pets', 'properties.sleeps', 'properties.beds')
                        ->get();
    }

    public function searchByBeach($beach)
    {
        return Property::join('locations', 'properties._fk_location', '=', 'locations.__pk')
                        ->where('properties.near_beach', $beach)
                        ->select('properties.__pk', 'properties.property_name', 'locations.location_name', 'properties.near_beach', 'properties.accepts_pets', 'properties.sleeps', 'properties.beds')
                        ->get();
    }

    public function searchByPets($pets)
    {
        return Property::join('locations', 'properties._fk_location', '=', 'locations.__pk')
                        ->where('properties.accepts_pets', $pets)
                        ->select('properties.__pk', 'properties.property_name', 'locations.location_name', 'properties.near_beach', 'properties.accepts_pets', 'properties.sleeps', 'properties.beds')
                        ->get();
    }

    public function searchByDate($dates)
    {
      return Property::join('bookings', 'properties.__pk', '=', 'bookings._fk_property' )
                    ->join('locations', 'properties._fk_location', '=', 'locations.__pk')
                    ->whereNotBetween('bookings.start_date', array($dates['check_in'], $dates['check_out']))
                    ->groupby('properties.__pk')
                    ->whereNotBetween('bookings.end_date', array($dates['check_in'], $dates['check_out']))
                    ->select('properties.__pk', 'properties.property_name', 'locations.location_name', 'properties.near_beach', 'properties.accepts_pets', 'properties.sleeps', 'properties.beds')
                    ->get();
    }

}
