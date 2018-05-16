<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Posts;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use Validator;
use Input;
use Session;
use Redirect;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Posts::all();
        return View::make('posts.index')->with('posts', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $validated = $request->validated();
        $post = new Posts;
        $post->content = Input::get('content');
        $post->created_at = Carbon::now();
        $post->updated_at = Carbon::now();
        $post->restaurant_id = Input::get('restaurant_id');
        $post->user_id = Input::get('user_id');
        $post->save();

        Session::flash('message', 'Successfully created Post!');
        return redirect()->action('RestaurantController@show', ['id' => $post->restaurant_id]);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$post = Posts::find($id);
        //return View::make('posts.show')->with('posts', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$post = Posts::find($id);
        //return View::('posts.edit')->with('posts', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
            $validated = $request->validated();
            $post = Posts::find($id);
            $post->content = Input::get('content`');
            $post->updated_at = Carbon::now();
            $post->restaurant_id = Input::get('restaurant_id');
            $post->user_id = Input::get('user_id');
            $post->save();

            Session::flash('message', 'Successfully created Post!');
            return Redirect::to('posts');

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


    public function addFromRestaurant(PostRequest $request)
    {
        $validated = $request->validated();
        $post = new Posts;
        $post->content = Input::get('content');
        $post->created_at = Carbon::now();
        $post->updated_at = Carbon::now();
        $post->restaurant_id = Input::get('restaurant_id');
        $post->user_id = Input::get('user_id');
        $post->save();

        Session::flash('message', 'Successfully created Post!');
        return Redirect::to('restaurants\index');



    }

}
