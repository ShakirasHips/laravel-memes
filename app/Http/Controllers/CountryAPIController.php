<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\DB\View;
use Cabon\Carbon;
use Validator;
use Input;
use Session;
use Redirect;
use App\Http\Requests\storeCountry;

class CountryAPIController extends Controller
{
    public function store(Request $request)
    {
		$validator = Validator::make($request->all(), (new storeCountry)->rules());
		if ($validator->fails())
		{
			return response()->json($validator->errors(), 400);
		} else
		{
			$country = Country::create($request->all());
			return response()->json($country, 201);
		}
    }

	public function update(Request $request)
    {
		$validator = Validator::make($request->all(), (new storeCountry)->rules());
		if ($validator->fails())
		{
			return response()->json($validator->errors(), 400);
		} else
		{
			$country = Country::find($request['country_id']);

            if (is_null($country))
            {
                return response()->json(null, 404);
            }

			$country->update($request->all());
			return response()->json($country, 200);
		}

    }

    public function destroy(Request $request)
    {
        $country = Country::find($request['country_id']);

        if (is_null($country))
        {
            return response()->json(null, 404);
        }
        
		$country->delete();
		return response()->json(null, 200);
    }
}
