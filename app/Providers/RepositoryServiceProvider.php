<?php

namespace App\Providers;

use App\Repositories\EloquentRepositoryInterface;
use App\Repositories\LocationRepositoryInterface;
use App\Repositories\BookingRepositoryInterface;
use App\Repositories\PropertyRepositoryInterface;
use App\Repositories\Eloquent\LocationRepository;
use App\Repositories\Eloquent\BookingRepository;
use App\Repositories\Eloquent\PropertyRepository;
use App\Repositories\Eloquent\BaseRepository;
use Illuminate\Support\ServiceProvider;

/**
* Class RepositoryServiceProvider
* @package App\Providers
*/
class RepositoryServiceProvider extends ServiceProvider
{
   /**
    * Register services.
    *
    * @return void
    */
   public function register()
   {
       $this->app->bind('EloquentRepositoryInterface', 'BaseRepository');
       $this->app->bind('LocationRepositoryInterface', 'LocationRepository');
       $this->app->bind('BookingRepositoryInterface', 'BookingRepository');
       $this->app->bind('PropertyRepositoryInterface', 'PropertyRepository');
   }
}
