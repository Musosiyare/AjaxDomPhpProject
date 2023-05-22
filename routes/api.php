<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController;

Route::get('/region', [CountryController::class, 'getAllDistricts']);
Route::get('/region/{p}',[CountryController::class, 'getSingleProvince']);