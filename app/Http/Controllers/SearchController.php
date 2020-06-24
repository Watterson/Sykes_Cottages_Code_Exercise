<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\LocationRepository;
use App\Repositories\PropertyRepository;
use App\Repositories\BookingRepository;



class SearchController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */

     /**
     * @var LocationRepository
     */
     private $locationRepository;
     /**
     * @var PropertyRepository
     */
     private $propertyRepository;
     /**
     * @var BookingRepository
     */
     private $bookingRepository;



   public function __construct(PropertyRepository $propertyRepository,
                               LocationRepository $locationRepository,
                               BookingRepository $bookingRepository)
   {
       $this->propertyRepository = $propertyRepository;
       $this->locationRepository = $locationRepository;
       $this->bookingRepository = $bookingRepository;

   }

    public function getIndex()
    {
        $locations = $this->locationRepository->all();
        $properties = $this->propertyRepository->all();
      //  dd($properties);
        return view('main', ['locations' => $locations,
                             'properties' => $properties]);
    }

    public function postSearch(Request $request)
    {
        $validatedData = $request->validate([
           'location' => 'required',
           'check_in' => 'required',
           'check_out' => 'required',
           'beds' => 'required',
           'people' => 'required',
        ]);

        $search['location'] = Request()->input('location');
        $search['beds'] = Request()->input('beds');
        $search['people'] = Request()->input('people');
        $search['check_in'] = Request()->input('check_in');
        $search['check_out'] = Request()->input('check_out');
        $search['petFreindly'] = Request()->input('petFreindly');
        $search['nearBeach'] = Request()->input('nearBeach');

        if ($search['petFreindly'] == FALSE && $search['petFreindly'] == FALSE) {
          $validProperties = $this->propertyRepository->checkMainFeatures($search); // Searchs properties for any that match the users search criteria assuming user doesnt care if property is pet friendly or near beach
        }elseif ($search['petFreindly'] == TRUE && $search['petFreindly'] == FALSE) {
          $validProperties = $this->propertyRepository->checkWithPets($search); // Searchs properties for any that match the users search criteria assuming user only cares if property is pet friendly
        }elseif ($search['petFreindly'] == FALSE && $search['petFreindly'] == TRUE) {
          $validProperties = $this->propertyRepository->checkNearBeach($search); // Searchs properties for any that match the users search criteria assuming user only cares if property is near a beach
        }else {
          $validProperties = $this->propertyRepository->checkAll($search); // Searchs properties for any that match the users search criteria, checking if propertyis both pet friendly and near a beach
        }
        //dd($validProperties);
        $availableProperties = array(); // Array to append all available projects to
        // Searchs bookings to see if properties with valid features are available on the users desired dates
        foreach ($validProperties as $property ) {
          $available = $this->bookingRepository->checkDates($property['__pk'], $search);
          if($available){
            $availableProperties[] = $property;
          }else{
            continue;
          }
        }
        //return page with the results of the search
        return view('results', ['properties' => $availableProperties]);
    }

    public function postSearchLocation(Request $request)
    {
      //request value of location Id passed through from the form
      $location = Request()->input('location');
      //using function in property repository to retrieve properties matching location Id
      $properties = $this->propertyRepository->searchByLocation($location);
      //return page with the results of the search
      return view('results', ['properties' => $properties]);
    }

    public function postSearchDate(Request $request)
    {
      //request the date range passed through from the form
      $date['check_in'] = Request()->input('check_in');
      $date['check_out'] = Request()->input('check_out');
      //using function in booking repository to retrieve properties not booked within desired date range
      $properties = $this->propertyRepository->searchByDate($date);
      //return page with the results of the search
      return view('results', ['properties' => $properties]);
    }

    public function postSearchBeds(Request $request)
    {
      //request amount of beds passed through from the form
      $beds = Request()->input('beds');
      //using function in property repository to retrieve properties with >= the numer of desired beds
      $properties = $this->propertyRepository->searchByBeds($beds);
      //return page with the results of the search
      return view('results', ['properties' => $properties]);
    }

    public function postSearchPeople(Request $request)
    {
      //request number of people passed through from the form
      $people = Request()->input('people');
      //using function in property repository to retrieve properties matching location Id
      $properties = $this->propertyRepository->searchByPeople($people);
      //return page with the results of the search
      return view('results', ['properties' => $properties]);
    }

    public function postSearchBeach(Request $request)
    {
      //request boolean value passed through from the form
      $nearBeach = Request()->input('nearBeach');
      //using function in property repository to retrieve properties either near or no where near a beach
      $properties = $this->propertyRepository->searchByBeach($nearBeach);
      //return page with the results of the search
      return view('results', ['properties' => $properties]);
    }

    public function postSearchPets(Request $request)
    {
      //request boolean value passed through from the form
      $acceptsPets = Request()->input('petFriendly');
      //using function in property repository to retrieve properties either do or dont accept pets
      $properties = $this->propertyRepository->searchByPets($acceptsPets);
      //return page with the results of the search
      return view('results', ['properties' => $properties]);
    }
}
