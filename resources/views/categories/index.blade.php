<!DOCTYPE html>
<html>
<head>
 <title>Category (Index)</title>
 <link rel="stylesheet"
href="{{asset('css/app.css')}}">
</head>
<body>
<div class="container">
<nav class="navbar navbar-inverse">
 <div class="navbar-header">

 </div>
 <ul class="nav navbar-nav">
<li><a href="{{ URL::to('categories/create') }}">Add a Category</a></li>
 </ul>
</nav>
<h1>All the Categories</h1>
<!-- will be used to show any messages -->
@if (Session::has('message'))
 <div class="alert alert-info">{{
Session::get('message') }}</div>
@endif
<table class="table table-striped table-bordered">
 <thead>
 <tr>
 <th>Category ID</th>
 <th>Name</th>
 <th>Created at</th>
 <th>Updated at</th>
 <th>Actions</th>
 </tr>
 </thead>
 <tbody>
 @foreach($categories as $key => $value)
 <tr>

 <td>{{ $value->category_id}}</td>
 <td><a href="{{ URL::to('showCategory/'. $value->category_id)}}">
 {{ $value->name }}</a></td>
 <td>{{ $value->created_at }}</td>
 <td>{{ $value->updated_at }}</td>
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
href="{{ URL::to('categories/' . $value->category_id . '/edit')}}">Edit this Category</a>

{{ Form::open(array('url' => 'categories/' . $value->category_id, 'class' => 'pull-right')) }}


 </td>
 </tr>
 @endforeach
 </tbody>
</table>
</div>
</body>
</html>
