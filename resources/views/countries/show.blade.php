<!DOCTYPE html>
<html>
<head>
 <title>Show Countries</title>
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
<p>Country ID: {{ $countries->country_id }}</p>
 <p>Namer: {{ $countries->name}}</p>
 <p>Created at: {{ $countries->created_at }}</p>
 <p>updated at: {{ $countries->updated_at }}</p>
 </div>
</div>

<div class="jumbotron text-center">
    <h1> Restaurants </h1>
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
 <th>Category</th>
 </tr>
 </thead>
 <tbody>
 @foreach($countries->restaurants as $key => $value)
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

 <td>{{ $value->category->name }}</td>
 @endforeach
</tbody>

<table class="table table-striped table-bordered">
    <h1>Users</h1>
 <thead>
 <tr>
 <th>User ID</th>
 <th>Name</th>
 <th>Email</th>
 <th>Password</th>
 <th>Created at</th>
 <th>Updated at</th>
 <th>Country</th>
 </tr>
 </thead>
 <tbody>
 @foreach($countries->users as $key => $value)
 <tr>

 <td>{{ $value->user_id}}</td>
 <td>{{ $value->name }}</td>
 <td>{{ $value->email }}</td>
 <td>{{ $value->password }}</td>
 <td>{{ $value->created_at }}</td>
 <td>{{ $value->updated_at }}</td>
 <td>{{ $value->country->name }}</td>
</tbody>
</tr>
@endforeach

</body>
</html>
