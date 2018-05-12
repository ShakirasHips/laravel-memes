<!DOCTYPE html>
<html>
<head>
 <title>Create Category</title>
 <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
<div class="container">
<nav class="navbar navbar-inverse">
 <div class="navbar-header">
 </div>
 <ul class="nav navbar-nav">
 </ul>
</nav>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}
{{ Form::model($categories, array('route' => array('categories.update', $categories->category_id),
'method' => 'PUT')) }}

 <div class="form-group">
 {{ Form::label('name', 'Name') }}
 {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
 </div>

<div>
 {{ Form::submit('Update the Category', array('class' => 'btn btn-primary')) }}
 {{ Form::close() }}
 </div>
 </body>
 </html>
