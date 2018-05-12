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
</body>
</html>
