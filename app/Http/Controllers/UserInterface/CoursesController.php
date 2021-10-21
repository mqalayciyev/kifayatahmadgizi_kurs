<?php

namespace App\Http\Controllers\UserInterface;

use App\Http\Controllers\Controller;
use App\Models\Courses;
use App\Models\Teachers;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function index($page = 1) {
        $start = ($page - 1) * 6;
        $courses = Courses::offset($start)->limit(6)->get();
        $count = Courses::count();
        $output = "";
        $pages = ceil($count/6);

        $paginations = '<div class="pagination_blog"><ul>';
        for($i = 1; $i <= $pages; $i++){

            $current = ($i == $page) ? 'current' : '';
            $paginations .= '<li class="'.$current.'"><a href='.route('courses', $i).'>'.$i.'</a></li>';

        }
        $paginations .= '</ul></div>';

        if($count < 7){
            $paginations = '';
        }

        return view('user.pages.courses', ['page' => 'Kurslar'], compact('courses', 'count', 'paginations'));
    }
    public function cours($cours, $id){
        $cours = Courses::find($id);
        $courses_other = Courses::where('id', '!=', $id)->get();
        $teacher = Teachers::find($cours->teacher);
        return view('user.pages.course_details', ['page' => $cours->name], compact('cours', 'teacher', 'courses_other'));
    }
}
