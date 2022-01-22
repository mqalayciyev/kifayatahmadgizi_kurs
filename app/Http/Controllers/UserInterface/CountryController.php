<?php

namespace App\Http\Controllers\UserInterface;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\University;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index(){
        $countries = Country::all();
        return view('user.pages.country', ['page' => __('content.Countries')], compact('countries'));
    }
    public function universities($slug){
        $universities = University::all();
        return view('user.pages.university', ['page' => __('content.Universities')], compact('universities'));
    }
}
