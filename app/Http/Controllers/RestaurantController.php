<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use Validator;
use Input;
use Session;
use Redirect;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::all();
        //return View::make('restaurants.index')->with('restaurants', $restaurants);
        return View::make('restaurants.index')->with('restaurants', $restaurants);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('restaurants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array('name' => 'required',
                       'phone' => 'required|numeric',
                       'address1' => 'required',
                       'suburb' => 'required',
                       'state' => 'required',
                       'numberofseats' => 'required|numeric',
                       'country_id' => 'required|numeric',
                       'category_id' => 'required|numeric',
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails())
        {
            // TODO: change this
            return Redirect::to('shitsfucked');
        } else {
            $restaurants = new Restaurant;
            $restaurants->name = Input::get('name');
            $restaurants->phone = Input::get('phone');
            $restaurants->address1 = Input::get('address1');
            $restaurants->address2 = Input::get('address2');
            $restaurants->suburb = Input::get('suburb');
            $restaurants->state = Input::get('state');
            $restaurants->numberofseats = Input::get('numberofseats');
            $restaurants->country_id = Input::get('country_id');
            $restaurants->category_id = Input::get('category_id');
            $restaurants->save();

            Session::flash('message', 'Successfully created Restaurant!');
            return Redirect::to('restaurants');
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
        $restaurants = Restaurant::find($id);
        return View::make('restaurants.show')->with('restaurants', $restaurants);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $restaurants = Restaurant::find($id);

        return View::make('restaurant.edit')->with('restaurants', $restaurants);
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
        $rules = array('name' => 'required',
                       'phone' => 'required|numeric',
                       'address1' => 'required',
                       'suburb' => 'required',
                       'state' => 'required',
                       'numberofseats' => 'required|numeric',
                       'country_id' => 'required|numeric',
                       'category_id' => 'required|numeric',
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails())
        {
            // TODO: change this
            return Redirect::to('shitsfucked');
        } else {
            $restaurants = Restaurant::find($id);
            $restaurants->name = Input::get('name');
            $restaurants->phone = Input::get('phone');
            $restaurants->address1 = Input::get('address1');
            $restaurants->address2 = Input::get('address2');
            $restaurants->suburb = Input::get('suburb');
            $restaurants->state = Input::get('state');
            $restaurants->numberofseats = Input::get('numberofseats');
            $restaurants->country_id = Input::get('country_id');
            $restaurants->category_id = Input::get('category_id');
            $restaurants->save();

            Session::flash('message', 'Successfully update Restaurant!');
            return Redirect::to('restaurants');
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
        $restaurants = Restaurant::find($id);
        $restaurants->delete();

        Session::flash('message', 'Successfully deleted the restaurant!');
        return Redirect::to('restaurants');
    }
}
