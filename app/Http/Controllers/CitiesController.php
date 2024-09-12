<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cities;

class CitiesController extends Controller
{
    public function showCities(){
    $cities = Cities::all();

    return response()->json([
        'message' => 'Cities retrieved successfuly',
        'cities' => $cities
    ]);
    }

    public function createCity(Request $request){
        $validated = $request->validate([
            'name' => 'required|string', 
            // 'material_type' => 'string',
         ]);
    $create_city = Cities::create($validated);

    return response()->json([
        'message' => 'City added successfully',
        'city' => $create_city
    ]);
    }
}
