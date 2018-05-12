<!DOCTYPE html>
<html>
<head>
 <title>Update User</title>
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
{{ Form::model($users, array('users' => array('users.update', $users->user_id),
'method' => 'PUT')) }}

 <div class="form-group">
 {{ Form::label('name', 'Name') }}
 {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
 </div>

 <div class="form-group">
 {{ Form::label('email', 'Email') }}
 {{ Form::text('email', Input::old('email'), array('class' => 'form-control')) }}
 </div>
 <div class="form-group">
 {{ Form::label('password', 'Password') }}
 {{ Form::password('password', Input::old('password'), array('class' => 'form-control')) }}
 </div>
 <div class="form-group">
 {{ Form::label('country_id', 'Country') }}
 {{ Form::number('country_id', Input::old('country_id'), array('class' => 'form-control')) }}
 </div>


<div>
 {{ Form::submit('Update the Category', array('class' => 'btn btn-primary')) }}
 {{ Form::close() }}
 </div>
 </body>
 </html>
