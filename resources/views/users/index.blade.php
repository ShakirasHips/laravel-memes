<!DOCTYPE html>
<html>
<head>
 <title>User (Index)</title>
 <link rel="stylesheet"
href="{{asset('css/app.css')}}">
</head>
<body>
<div class="container">
<nav class="navbar navbar-inverse">
 <div class="navbar-header">

 </div>
 <ul class="nav navbar-nav">
<li><a href="{{ URL::to('users/create') }}">Add a user</a></li>
 </ul>
</nav>
<h1>All the Users</h1>
<!-- will be used to show any messages -->
@if (Session::has('message'))
 <div class="alert alert-info">{{
Session::get('message') }}</div>
@endif
<table class="table table-striped table-bordered">
 <thead>
 <tr>
 <th>User ID</th>
 <th>Name</th>
 <th>Email</th>
 <th>Password</th>
 <th>Created at</th>
 <th>Updated at</th>
 <th>Country</th>
 <th>Actions</th>
 </tr>
 </thead>
 <tbody>
 @foreach($users as $key => $value)
 <tr>

 <td>{{ $value->user_id}}</td>
 <td>{{ $value->name }}</td>
  <td>{{ $value->email }}</td>
   <td>{{ $value->password }}</td>
 <td>{{ $value->created_at }}</td>
 <td>{{ $value->updated_at }}</td>
  <td>{{ $value->country->name }}</td>

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
href="{{ URL::to('users/' . $value->user_id . '/edit')}}">Edit this User</a>

{{ Form::open(array('url' => 'users/' . $value->user_id, 'class' => 'pull-right')) }}


 </td>
 </tr>
 @endforeach
 </tbody>
</table>
</div>
</body>
</html>
