<!DOCTYPE html>
<html>
<head>
 <title>Show User</title>
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
<p>User ID: {{ $users->user_id }}</p>
 <p>Name: {{ $users->name}}</p>
  <p>Email: {{ $users->email}}</p>
   <p>Password: {{ $users->password}}</p>
 <p>Created at: {{ $users->created_at }}</p>
 <p>updated at: {{ $users->updated_at }}</p>
  <p>Country ID: {{ $users->country_id}}</p>
 </div>
</div>

 <div class="jumbotron text-center">
<table class="table table-striped table-bordered">
 <thead>
<h1> Posts </h1>
 <tr>
 <th>Post ID</th>
 <th>Content</th>
 <th>Created at</th>
 <th>Updated at</th>
 <th>Rest ID</th>
 </tr>
 </thead>
 <tbody>
 @foreach($users->posts as $key => $value)
 <tr>

 <td>{{ $value->post_id}}</td>
 <td>{{ $value->content }}</td>
 <td>{{ $value->created_at }}</td>
 <td>{{ $value->updated_at }}</td>
 <td>{{ $value->restaurant_id }}</td>
@endforeach
</table>

<table class="table table-striped table-bordered">
 <thead>
<h1> Comments </h1>
 <tr>
 <th>Comment ID</th>
 <th>Content</th>
 <th>Created at</th>
 <th>Updated at</th>
 <th>Post ID</th>
 </tr>
 </thead>
 <tbody>
 @foreach($users->comments as $key => $value)
 <tr>

 <td>{{ $value->comment_id}}</td>
 <td>{{ $value->content }}</td>
 <td>{{ $value->created_at }}</td>
 <td>{{ $value->updated_at }}</td>
 <td>{{ $value->post_id }}</td>
@endforeach
</table>

<table class="table table-striped table-bordered">
 <thead>
<h1> Roles </h1>
 <tr>
 <th>Role ID</th>
 <th>Name</th>
 <th>Created at</th>
 <th>Updated at</th>
 </tr>
 </thead>
 <tbody>
 @foreach($users->roles as $key => $value)
 <tr>

 <td>{{ $value->role_id}}</td>
 <td>{{ $value->test->name }}</td>
 <td>{{ $value->test->created_at }}</td>
 <td>{{ $value->test->updated_at }}</td>

 @endforeach

</body>
</html>
