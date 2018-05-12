<!DOCTYPE html>
<html>
<head>
 <title>Restaurants (Index)</title>
 <link rel="stylesheet"
href="{{asset('css/app.css')}}">
</head>
<body>
<div class="container">
<nav class="navbar navbar-inverse">
 <div class="navbar-header">

 </div>
 <ul class="nav navbar-nav">
<li><a href="{{ URL::to('restaurants/create') }}">Add a Restaurant</a></li>
 </ul>
</nav>
<h1>All the Restaurants</h1>
<!-- will be used to show any messages -->
@if (Session::has('message'))
 <div class="alert alert-info">{{
Session::get('message') }}</div>
@endif
<table class="table table-striped table-bordered">
 <thead>
 <tr>
 <th>Restaurant ID</th>
 <th>Name</th>
 <th>Phone</th>
 <th>Address 1</th>
 <th>Address 2</th>
 <th>Suburb</th>
 <th>State</th>
 <th>#OfSeats</th>
 <th>Country</th>
 <th>Category</th>
 <th>Edit</th>
 </tr>
 </thead>
 <tbody>
 @foreach($restaurants as $key => $value)
 <tr>

 <td>{{ $value->restaurant_id}}</td>
 <td><a href="{{ URL::to('showRestaurant/'. $value->restaurant_id)}}">
     {{ $value->name }}</a></td>
 <td>{{ $value->phone }}</td>
 <td>{{ $value->address1 }}</td>
 <td>{{ $value->address2 }}</td>
 <td>{{ $value->suburb }}</td>
 <td>{{ $value->state }}</td>
 <td>{{ $value->numberofseats }}</td>
 <td>{{ $value->country->name}}</td>
 <td>{{ $value->category->name }}</td>

 <!-- we will also add show, edit, and delete
buttons -->
 <td>
<!-- delete the order (uses the destroy
method DESTROY /orders/{id} -->
 <!-- we will add this later since its a
little more complicated than the other two buttons -->
 <!-- Show the order (uses the show method
found at GET /orders/{id} -->


 <!-- Edit this order (uses the edit
method found at GET /orders/{id}/edit -->


 <a class="btn btn-small btn-info"
href="{{ URL::to('restaurants/' . $value->restaurant_id . '/edit')}}">Edit this Restaurant</a>

{{ Form::open(array('url' => 'restaurants/' . $value->restaurant_id, 'class' => 'pull-right')) }}


 </td>
 </tr>
 @endforeach
 </tbody>
</table>
</div>
</body>
</html>
