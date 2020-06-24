@extends('layout')
@section('content')
<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
  <div class="container">
    <h1>Search Cottages</h1>
    <nav>
      <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active" id="nav-location-tab" data-toggle="tab" href="#nav-location" role="tab" aria-controls="nav-location" aria-selected="true">Location</a>
        <a class="nav-item nav-link" id="nav-date-tab" data-toggle="tab" href="#nav-date" role="tab" aria-controls="nav-date" aria-selected="false">Date</a>
        <a class="nav-item nav-link" id="nav-feature-tab" data-toggle="tab" href="#nav-feature" role="tab" aria-controls="nav-feature" aria-selected="false">Feature</a>
        <a class="nav-item nav-link" id="nav-advanced-tab" data-toggle="tab" href="#nav-advanced" role="tab" aria-controls="nav-advanced" aria-selected="false">Advanced</a>
      </div>
    </nav>
    <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
      <div class="tab-pane fade show active row" id="nav-location" role="tabpanel" aria-labelledby="nav-location-tab">
        <form method="POST" action="{{ url('search/location') }}">
          @csrf
          <div class="row justify-content-center">
            <div class="input-group col-md-6 col-sm-12 ml-3" id="location">
              <label class="label first-element-label">Location: </label>
              <select class="form-control form-control-md col-sm-12 " name="location" id="location-select">
                <option value="">--Select Location--</option>
                @foreach($locations as $location)
                <option value="{{$location->__pk}}">{{$location->location_name}}</option>
                @endforeach
              </select>
            </div>
            <button type="submit" class="btn btn-primary ">Submit &raquo;</button>
          </div>
        </form>
      </div>
      <div class="tab-pane fade" id="nav-date" role="tabpanel" aria-labelledby="nav-date-tab">
        <form method="POST" action="{{ url('search/date') }}">
          @csrf
          <div class="row justify-content-center">
            <div class="input-group col-md-6 col-sm-12" id="check_in">
              <label class="label first-element-label" for="check_in">Check-in: </label>
              <input id="check_in" type="date" class="form-control" name="check_in"  autofocus>
            </div>
            <div class="input-group col-md-6 col-sm-12" id="check_out">
              <label class="label" for="check_out">Check-out: </label>
              <input id="check_out" type="date" class="form-control" name="check_out"  autofocus>
            </div>
            <button type="submit" class="btn btn-primary ml-5">Submit &raquo;</button>
          </div>
        </form>
        </div>
        <div class="tab-pane fade" id="nav-feature" role="tabpanel" aria-labelledby="nav-feature-tab">
          <form method="POST" action="{{ url('search/feature/beds') }}">
            @csrf
            <div class="row justify-content-center">
              <div class="input-group col-md-6 col-sm-12" id="beds">
                <label class="label " for="beds">Beds: </label>
                <input id="beds" type="input" class="form-control" name="beds"  autofocus>
              </div>
              <button type="submit" class="btn btn-primary">Submit &raquo;</button>
            </div>
          </form>
          <form method="POST" action="{{ url('search/feature/people') }}">
            @csrf
            <div class="row justify-content-center ">
              <div class="input-group col-md-6 col-sm-12" id="sleeps">
                <label class="label c" for="beds">Number of poeple staying: </label>
                <input id="people" type="input" class="form-control" name="people"  autofocus>
              </div>
              <button type="submit" class="btn btn-primary">Submit &raquo;</button>
            </div>
          </form>
          <form method="POST" action="{{ url('search/feature/near_beach') }}">
            @csrf
            <div class="row justify-content-center">
              <div class="input-group col-md-6 col-sm-12" id="nearbeach">
                <label class="label ">Near Beach: </label>
                <select class="form-control form-control-md " name="nearBeach" id="nearBeach">
                  <option value="1">Yes</option>
                  <option value="0">No</option>
                </select>
              </div>
              <button type="submit" class="btn btn-primary ">Submit &raquo;</button>
            </div>
          </form>
          <form method="POST" action="{{ url('search/feature/accepts_pets') }}">
            @csrf
            <div class="row justify-content-center">
              <div class="input-group col-md-6 col-sm-12" id="petFriendly">
                <label class="label">Accepts Pets: </label>
                <select class="form-control form-control-md " name="petFriendly" id="petFriendly">
                  <option value="1">Yes</option>
                  <option value="0">No</option>
                </select>
              </div>
              <button type="submit" class="btn btn-primary ">Submit &raquo;</button>
            </div>
          </form>
        </div>
        <div class="tab-pane fade" id="nav-advanced" role="tabpanel" aria-labelledby="nav-advanced-tab">
          <div class="search-group ">
            <form method="POST" action="{{ url('search/advanced') }}">
              @csrf
              <div class="row">
                <div class="input-group col-md-6 col-sm-12" id="location">
                  <label class="label first-element-label">Location: </label>
                  <select class="form-control form-control-md " name="location" id="location-select">
                    <option value="">--Select Location--</option>
                    @foreach($locations as $location)
                    <option value="{{$location->__pk}}">{{$location->location_name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="input-group location-select col-md-3 col-sm-12" id="beds" >
                  <label class="label">Beds: </label>
                  <input id="beds" type="input" class="form-control" name="beds"  autofocus>
                </div>
                <div class="input-group col-md-3 col-sm-12" id="people">
                  <label class="label">People: </label>
                  <input id="people" type="input" class="form-control" name="people"  autofocus>
                </div>
              </div>
              <div class="row">
                <div class="input-group col-md-6 col-sm-12" id="check_in">
                  <label class="label first-element-label" for="check_in">Check-in: </label>
                  <input id="check_in" type="date" class="form-control" name="check_in"  autofocus>
                </div>
                <div class="input-group col-md-6 col-sm-12" id="check_out">
                  <label class="label" for="check_out">Check-out: </label>
                  <input id="check_out" type="date" class="form-control" name="check_out"  autofocus>
                </div>
              </div>
              <div class="row justify-content-center">
                <div class="input-group col-md-4 col-sm-12">
                  <label>Near Beach:</label>
                  <label class="btn ">
            				<input type="checkbox" name="nearBeach" autocomplete="on" >
            				<span class="glyphicon glyphicon-ok"></span>
            			</label>
                </div>
                <div class="input-group col-md-4 col-sm-12">
                  <label>Pet freindly:</label>
                  <label class="btn ">
            				<input type="checkbox" name="petFreindly" autocomplete="off" >
            				<span class="glyphicon glyphicon-ok"></span>
            			</label>
                </div>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary btn-lg">Submit &raquo;</button>
              </div>
            </form>
          </div>
        </div>
      </div>

    </div>
  </div>

<div class="container">
  <!-- Example row of columns -->
  <div class="row">
    @foreach($properties as $property)
    <div class="card col-md-4">
      <h2>{{$property['property_name']}}</h2>
      <p>Location: {{$property['location_name']}} </p>
      <p>Beds: {{$property['beds']}} </p>
      <p>Room for {{$property['sleeps']}} people </p>
      <p>Near Beach: @if($property['near_beach'] === 1) Yes @else No @endif </p>
      <p>Pet Friendly: @if($property['accepts_pets'] === 1) Yes @else No @endif </p>
      <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
    </div>
    @endforeach
  </div>

@endsection
