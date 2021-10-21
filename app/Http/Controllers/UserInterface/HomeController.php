<?php

namespace App\Http\Controllers\UserInterface;

use App\Models\News;
use App\Models\Courses;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $courses = Courses::limit(6)->get();
        $news = News::limit(6)->get();
        return view('user.home', compact('courses', 'news'));

    }
    public function sitemap () {
        return view('user.pages.sitemap', ['page' => 'Sitemap']);
    }
}
