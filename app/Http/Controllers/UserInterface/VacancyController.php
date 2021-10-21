<?php

namespace App\Http\Controllers\UserInterface;

use App\Http\Controllers\Controller;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    public function index(){
        $vacancies = Vacancy::where('status', 1)->get();
        return view('user.pages.vacancy', ['page' => __('content.Vacancy')], compact('vacancies'));
    }
}
