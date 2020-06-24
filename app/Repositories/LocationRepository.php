<?php namespace App\Repositories;

use App\Models\Location;

class LocationRepository
{
    public function all()
    {
        return Location::all();
    }
}
