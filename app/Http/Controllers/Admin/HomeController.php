<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Courses;
use App\Models\Leads;
use App\Models\Admin;
use App\Models\TestScores;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $leads = Leads::count();
        $courses = Courses::count();
        $testscore = TestScores::count();
        $admin = Admin::count();
        return view('admin.pages.home', ['page' => 'İdarə paneli'], compact('leads', 'courses', 'testscore', 'admin'));
    }
}
