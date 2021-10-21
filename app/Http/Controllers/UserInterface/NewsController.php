<?php

namespace App\Http\Controllers\UserInterface;

use App\Models\News;
use App\Models\NewsImages;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function index($page = 1){
        $start = ($page - 1) * 6;
        $news = News::offset($start)->limit(6)->get();
        $latest = News::limit(3)->orderByDesc('created_at')->get();
        $count = News::count();
        $output = "";
        $pages = ceil($count/6);

        $paginations = '<div class="pagination_blog"><ul>';
        for($i = 1; $i <= $pages; $i++){

            $current = ($i == $page) ? 'current' : '';
            $paginations .= '<li class="'.$current.'"><a href='.route('news', $i).'>'.$i.'</a></li>';

        }
        $paginations .= '</ul></div>';

        if($count < 7){
            $paginations = '';
        }

        return view('user.pages.news', ['page' => 'Xəbərlər'], compact('news', 'count', 'paginations', 'latest'));
    }
    public function news($slug, $id){
        $news = News::find($id);
        $image = NewsImages::find($news->image);
        $latest = News::limit(3)->orderByDesc('created_at')->get();
        return view('user.pages.news_detail', ['page' => 'Xəbərlər'], compact('news', 'latest', 'image'));
    }
}
