<!DOCTYPE html>
<html>
<head>
 <title>Show Role</title>
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
<p>Category ID: {{ $roles->category_id }}</p>
 <p>Namer: {{ $roles->name}}</p>
 <p>Created at: {{ $roles->created_at }}</p>
 <p>updated at: {{ $roles->updated_at }}</p>
 </div>
</div>
</body>
</html>
