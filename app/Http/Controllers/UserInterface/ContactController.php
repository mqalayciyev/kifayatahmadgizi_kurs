<?php

namespace App\Http\Controllers\UserInterface;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        return view('user.pages.contact', ['page' =>  __('content.Contact')]);
    }
    public function about(){
        return view('user.pages.about', ['page' =>  __('content.About us')]);
    }

}
