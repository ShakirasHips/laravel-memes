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

 <script type="text/javascript">
         var temp = true;
         var temp2 = [];
         function showPost()
         {
             if (temp) {
                 document.getElementById("PostForm").style.display = "block";
                 temp = false;
             } else {
                document.getElementById("PostForm").style.display = "none";
                temp = true;
             }

         }
         function showComment(postid)
         {
            if (temp2[postid] || temp2[postid] === void 0)
            {
                document.getElementById(postid).style.display = "block";
                temp2[postid] = false;
            } else {
                document.getElementById(postid).style.display = "none";
                temp2[postid] = true;
            }



         }
</script>

 {{ HTML::ul($errors->all()) }}
 <a href="javascript:void(0);" onclick="showPost();">Add Post</a>
    <div id="PostForm" style="display: none">
         {{ Form::open(array('url' => 'posts')) }}
         <div class="form-group">

         {{ Form::label('content', 'Content') }}
         {{ Form::text('content', Input::old('content'), array('class' => 'form-control')) }}
         </div>

         <div class="form-group">
         {{ Form::hidden('restaurant_id', $restaurants->restaurant_id, array('class' => 'form-control')) }}
         </div>

         <div class="form-group">
         {{ Form::label('user_id', 'User ID') }}
         {{ Form::text('user_id', Input::old('user_id'), array('class' => 'form-control')) }}
         </div>

        <div>
         {{ Form::submit('Create the Post!', array('class' => 'btn btn-primary')) }}
         {{ Form::close() }}
         </div>
    </div>


@foreach($restaurants->posts as $key => $post)

  <h3>User: {{$post->user->name}}    /////    Country: {{$post->user->country->name}}   /////    Created: {{ $post->created_at }}</h3>
  <p>Post: {{ $post->content }} </p>
  <h3>Comments:</h3>

  @foreach($post->comments as $key => $comment)
  <b><p>User: {{$comment->user->name}}  /////    Country: {{$comment->user->country->name}}  /////   Created: {{$comment->created_at}}</b>
      <p>Comment: {{$comment->content}}</p></p>
  @endforeach

  <a href="javascript:void(0);" onclick="showComment({{$post->post_id}});">Add Comment</a>
     <div id={{$post->post_id}} style="display: none">
         {{ Form::open(array('url' => 'comments')) }}
          <div class="form-group">
          {{ Form::label('content', 'Content') }}
          {{ Form::text('content', Input::old('content'), array('class' => 'form-control')) }}
          </div>
          <div class="form-group">
          {{ Form::hidden('post_id', $post->post_id, array('class' => 'form-control')) }}
          </div>
          <div class="form-group">
          {{ Form::label('user_id', 'User ID') }}
          {{ Form::text('user_id', Input::old('user_id'), array('class' => 'form-control')) }}
          </div>
          <div>
           {{ Form::submit('Comment', array('class' => 'btn btn-primary')) }}
           {{ Form::close() }}
          </div>
     </div>

  <p>################################################</p>
@endforeach

</div>
</body>
</html>
