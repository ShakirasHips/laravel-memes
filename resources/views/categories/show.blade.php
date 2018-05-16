<!DOCTYPE html>
<html>
<head>
 <title>Show Categories</title>
 <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
<div class="container">
<nav class="navbar navbar-inverse">
 <div class="navbar-header">
    <ul class: "nav navbar-nav">
</ul>
 </div>

</nav>
 <div class="jumbotron text-center">
<p>Category ID: {{ $categories->category_id }}</p>
 <p>Namer: {{ $categories->name}}</p>
 <p>Created at: {{ $categories->created_at }}</p>
 <p>updated at: {{ $categories->updated_at }}</p>
 </div>
</div>

 <div class="jumbotron text-center">
<table class="table table-striped table-bordered">
 <thead>
<h1> Restaurants </h1>
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
 </tr>
 </thead>
 <tbody>
 @foreach($categories->restaurants as $key => $value)
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
 @endforeach
</body>
</html>
