<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comments;
use App\Http\Requests\CommentRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use Validator;
use Input;
use Session;
use Redirect;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comments::all();
        return View::make('comments.index')->with('comments', $comments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('comments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request)
    {
        $validated = $request->validated();
        $comment = new Comments;
        $comment->content = Input::get('content');
        $comment->created_at = Carbon::now();
        $comment->updated_at = Carbon::now();
        $comment->post_id = Input::get('post_id');
        $comment->user_id = Input::get('user_id');
        $comment->save();

        Session::flash('message', 'Successfully created Comment');
        return redirect()->action('RestaurantController@show', ['id' => $comment->getPost->restaurant_id]);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CommentRequest $request, $id)
    {
        $validated = $request->validated();
        $comment = Comments::find($id);
        $comment->content = Input::get('content');
        $comment->updated_at = Carbon::now();
        $comment->post_id = Input::get('post_id');
        $comment->user_id = Input::get('user_id');
        $comment->save();

        Session::flash('message', 'Successfully created Comment');
        return Redirect::to('comments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
