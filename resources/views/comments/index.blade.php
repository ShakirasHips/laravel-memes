<!DOCTYPE html>
<html>
<head>
 <title>Comments (Index)</title>
 <link rel="stylesheet"
href="{{asset('css/app.css')}}">
</head>
<body>
<div class="container">
<nav class="navbar navbar-inverse">
 <div class="navbar-header">

 </div>
 <ul class="nav navbar-nav">
<li><a href="{{ URL::to('comments/create') }}">Add a Comment</a></li>
 </ul>
</nav>
<h1>All the Comment</h1>
<!-- will be used to show any messages -->
@if (Session::has('message'))
 <div class="alert alert-info">{{
Session::get('message') }}</div>
@endif
<table class="table table-striped table-bordered">
 <thead>
 <tr>
 <th>Comment ID</th>
 <th>Content</th>
 <th>Created at</th>
 <th>Updated at</th>
 <th>Post ID</th>
 <th>User ID</th>
 </tr>
 </thead>
 <tbody>
 @foreach($comments as $key => $value)
 <tr>

 <td>{{ $value->comment_id}}</td>
 <td>{{ $value->content }}</td>
 <td>{{ $value->created_at }}</td>
 <td>{{ $value->updated_at }}</td>
 <td>{{ $value->post_id }}</td>
 <td>{{ $value->user_id }}</td>
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
href="{{ URL::to('roles/' . $value->role_id . '/edit')}}">Edit this Role</a>

{{ Form::open(array('url' => 'roles/' . $value->role_id, 'class' => 'pull-right')) }}


 </td>
 </tr>
 @endforeach
 </tbody>
</table>
</div>
</body>
</html>
