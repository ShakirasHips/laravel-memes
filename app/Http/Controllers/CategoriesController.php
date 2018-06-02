<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Categories;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use Validator;
use Input;
use Session;
use Redirect;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cat = Categories::all();
        return View::make('categories.index')->with('categories', $cat);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array('name' => 'required');
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('shitsfucked');
        }else {
            $categories = new Categories;
            $categories->name = Input::get('name');
            $categories->created_at = Carbon::now();
            $categories->updated_at = Carbon::now();
            $categories->save();

            Session::flash('message', 'Successfully created Category!');
            return Redirect::to('categories');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cat = Categories::find($id);
        return View::make('categories.show')->with('categories', $cat);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat = Categories::find($id);
        return View::make('categories.edit')->with('categories', $cat);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = array('name' => 'required');
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('shitsfucked');
        }else {
            $categories = Categories::find($id);
            $categories->name = Input::get('name');
            $categories->updated_at = Carbon::now();
            $categories->save();

            Session::flash('message', 'Successfully created Category!');
            return Redirect::to('categories');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories = Categories::find($id);
        $categories->delete();

        Session::flash('message', 'Successfully deleted the Category!');
        return Redirect::to('categories');
    }
}
