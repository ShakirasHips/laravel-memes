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
<li><a href="{{ URL::to('countries/create') }}">Add a Country</a></li>
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
</body>
</html>
