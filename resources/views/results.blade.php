@extends('layout')
@section('content')
<div class="jumbotron">
  <div class="container">
    <h1>Search Results</h1>
    <a href="/" class="badge badge-primary">Back to search page</a> <!-- Link back to search-page -->
    <!-- row of columns containg the search results -->
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
  </div>
</div>


@endsection
