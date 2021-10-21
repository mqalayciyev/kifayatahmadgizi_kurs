<?php

namespace App\Http\Controllers\UserInterface;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(){
        return view('user.pages.seacrh', ['page' => 'Axtarış']);
    }
}
