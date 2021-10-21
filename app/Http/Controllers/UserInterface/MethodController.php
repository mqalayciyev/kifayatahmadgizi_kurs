<?php

namespace App\Http\Controllers\UserInterface;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Studies;
use App\Models\Method;

class MethodController extends Controller
{
    public function index(){
        $method = Method::find(1);
        return view('user.pages.method', ['page' => __('content.Method')], compact('method'));
    }
    public function studies(){
        $studies = Studies::find(1);
        return view('user.pages.studies', ['page' => __('content.Studies')], compact('studies'));
    }

}
