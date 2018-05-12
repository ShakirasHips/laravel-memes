<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Country;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use Validator;
use Input;
use Session;
use Redirect;

class CountriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::all();
        return View::make('countries.index')->with('countries', $countries);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('countries.create');
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
            $countries = new Country;
            $countries->name = Input::get('name');
            $countries->created_at = Carbon::now();
            $countries->updated_at = Carbon::now();
            $countries->save();

            Session::flash('message', 'Successfully created country!');
            return Redirect::to('countries');

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
        $countries = Country::find($id);
        return view::make('countries.show')->with('countries', $countries);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $countries = Country::find($id);
        return View::make('countries.edit')->with('countries', $countries);
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
        } else {
            $countries = Country::find($id);
            $countries->name = Input::get('name');
            $countries->updated_at = Carbon::now();
            $countries->save();

            Session::flash('message', 'Successfully updated country!');
            return Redirect::to('countries');

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
        //
    }
}
