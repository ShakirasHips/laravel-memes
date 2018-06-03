<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RestaurantRequest;
use App\Restaurant;
use App\Posts;
use App\Comments;
use App\Categories;
use App\Country;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\DB\View;
use Cabon\Carbon;
use Validator;
use Input;
use Session;
use Redirect;
use App\Http\Requests\storeRestaurant;
use App\Http\Requests\deleteRestaurant;
use App\Http\Requests\showRestaurant;


class RestaurantAPIController extends Controller
{
    public function store(Request $request)
    {
		$validator = Validator::make($request->all(), (new RestaurantRequest)->rules());
		if ($validator->fails())
		{
			return response()->json($validator->errors(), 400);
		} else
		{
			$restaurant = Restaurant::create($request->all());
			return response()->json($restaurant, 201);
		}
    }

	public function update(Request $request)
    {
		$validator = Validator::make($request->all(), (new RestaurantRequest)->rules());
		if ($validator->fails())
		{
			return response()->json($validator->errors(), 400);
		} else
		{
			$restaurant = Restaurant::find($request['restaurant_id']);
            if (is_null($restaurant))
            {
                return response()->json(null, 404);
            }
			$restaurant->update($request->all());
			return response()->json($restaurant, 200);
		}
    }

    public function destroy(Request $request)
    {
		$validator = Validator::make($request->all(), (new deleteRestaurant)->rules());
		if ($validator->fails())
		{
			return response()->json($validator->errors(), 400);
		} else
		{
			$restaurant = Restaurant::find($request['restaurant_id']);
            if (is_null($restaurant))
            {
                return response()->json(null, 404);
            }
			$restaurant->delete();
			return response()->json(null, 204);
		}
    }

    public function showposts($id)
    {
        $restaurants = Restaurant::find($id);

        if (is_null($restaurants))
        {
            return response()->json(null, 404);
        }

        $restaurants->posts = $restaurants->posts->all();

        foreach($restaurants->posts as $post)
        {
            $post->comments = $post->comments->all();
        }

        return response()->json($restaurants, 200);

    }

    public function showcategory($id)
    {
        $restaurants = Categories::find($id)->restaurants;
	if (is_null($restaurants))
        {
            return response()->json(null, 404);
        }
	return response()->json($restaurants, 200);
    }

    public function showCountry($id)
    {
        $restaurants = Country::find($id)->restaurants;
	if (is_null($restaurants))
        {
            return response()->json(null, 404);
        }
	return response()->json($restaurants, 200);
    }
}
