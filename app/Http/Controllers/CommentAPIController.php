<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comments;
use App\Posts;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\DB\View;
use Cabon\Carbon;
use Validator;
use Input;
use Session;
use Redirect;
use App\Http\Requests\storeComment;

class CommentAPIController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), (new storeComment)->rules());
		if ($validator->fails())
		{
			return response()->json($validator->errors(), 400);
		} else
		{
            if (is_null(Posts::find($request['post_id'])))
            {
                return response()->json("No post exists with that id", 404);
            }

			$comment = Comments::create($request->all());
			return response()->json($comment, 201);
		}
    }

	public function update(Request $request)
    {
		$validator = Validator::make($request->all(), (new storeComment)->rules());
		if ($validator->fails())
		{
			return response()->json($validator->errors(), 400);
		} else
		{
            if (is_null(Posts::find($request['post_id'])))
            {
                return response()->json("No post exists with that id", 404);
            }


			$comment = Comments::find($request['comment_id']);
            if (is_null($comment))
            {
                return response()->json(null, 404);
            }
			$comment->update($request->all());
			return response()->json($comment, 200);
		}
    }

    public function destroy(Request $request)
    {
        if (is_null(Posts::find($request['post_id'])))
        {
            return response()->json("No post exists with that id", 404);
        }

        $comment = Comments::find($request['comment_id']);

        if (is_null($comment))
        {
            return response()->json(null, 404);
        }
        
		$comment->delete();
		return response()->json(null, 204);
    }
}
