<?php

namespace App\Http\Controllers\UserInterface;

use App\Http\Controllers\Controller;
use App\Models\Courses;
use App\Models\Teachers;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index($page = 1){

        $start = ($page - 1) * 6;
        $muellimler = Teachers::offset($start)->limit(6)->get();
        $count = Teachers::count();
        $output = "";
        $pages = ceil($count/6);



        $paginations = '<div class="pagination_blog mt-4"><ul>';
        for($i = 1; $i <= $pages; $i++){

            $current = ($i == $page) ? 'current' : '';
            $color = ($i == $page) ? '#ff5a2c' : '#6a7a83';
            $paginations .= '<a href='.route('teachers', [$i]).'><li class="'.$current.'" style="color: '.$color.'">'.$i.'</li></a>';

        }
        $paginations .= '</ul></div>';

        if($count <= 6){
            $paginations = '';
        }

        return view('user.pages.teachers', ['page' => __('content.Teachers')], compact('muellimler', 'count', 'paginations'));
    }
    public function teacher($teacher, $id){
        $teacher = Teachers::find($id);
        $teacher_cours = Courses::where('teacher', $id)->get();
        // $teacher = Teachers::find($cours->teacher);
        return view('user.pages.teacher', ['page' => $teacher->first_name . ' ' . $teacher->last_name], compact('teacher', 'teacher_cours'));
    }
}
