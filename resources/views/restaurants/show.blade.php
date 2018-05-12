<!DOCTYPE html>
<html>
<head>
 <title>Showing Restaurant</title>
 <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
<div class="container">
<nav class="navbar navbar-inverse">
 <div class="navbar-header">
 </div>

 </ul>
</nav>
 <h1>Restaurant Name: {{ $restaurants->name }}</h1>
 <div class="jumbotron text-left">
 <p>Phone Number: {{ $restaurants->phone }}</p>
 <p>Address 1: {{ $restaurants->address1 }}</p>
 <p>Address 2: {{ $restaurants->address2 }}</p>
 <p>Suburb: {{ $restaurants->suburb }}</p>
 <p>State: {{ $restaurants->state }}</p>
 <p>Number Of Seats: {{ $restaurants->numberofseats }}</p>
 <p>Country ID: {{ $restaurants->country_id }}</p>
 <p>Category ID: {{ $restaurants->category_id }}</p>
 </div>

@foreach($restaurants->posts as $key => $post)
<h1>Post</h1>
  <h3>User: {{$post->user->name}}    /////    Country: {{$post->user->country->name}}   /////    Created: {{ $post->created_at }}</h3>
  <p>Post: {{ $post->content }} </p>
  <h3>Comments:</h3>

  @foreach($post->comments as $key => $comment)
  <b><p>User: {{$comment->user->name}}  /////    Country: {{$comment->user->country->name}}  /////   Created: {{$comment->created_at}}</b>
      <p>Comment: {{$comment->content}}</p></p>
  @endforeach
  <p>################################################</p>
@endforeach

</div>
</body>
</html>
