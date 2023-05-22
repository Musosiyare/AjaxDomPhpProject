<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getAllDistricts()
    {
        $data = Country::all();
        return response()->json($data);
    }



    /**
     * Display the specified resource.
     */
    public function getSingleProvince(string $province)
    {
        $data = Country::where('province', $province)->get();
        return response()->json($data);
    }
}