<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'SearchController@getIndex');
Route::post('/search/advanced', 'SearchController@postSearch');
Route::post('/search/location', 'SearchController@postSearchLocation');
Route::post('/search/date', 'SearchController@postSearchDate');
Route::post('/search/feature/beds', 'SearchController@postSearchBeds');
Route::post('/search/feature/people', 'SearchController@postSearchPeople');
Route::post('/search/feature/near_beach', 'SearchController@postSearchBeach');
Route::post('/search/feature/accepts_pets', 'SearchController@postSearchPets');
