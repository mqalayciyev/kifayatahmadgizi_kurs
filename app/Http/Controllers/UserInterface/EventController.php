<?php

namespace App\Http\Controllers\UserInterface;

use App\Models\Events;
use App\Models\EventImages;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    public function index($page = 1){
        $start = ($page - 1) * 6;
        $events = Events::offset($start)->limit(6)->get();
        $count = Events::count();
        $output = "";
        $pages = ceil($count/6);

        $paginations = '<div class="pagination_blog"><ul>';
        for($i = 1; $i <= $pages; $i++){

            $current = ($i == $page) ? 'current' : '';
            $paginations .= '<li class="'.$current.'"><a href='.route('events', $i).'>'.$i.'</a></li>';

        }
        $paginations .= '</ul></div>';

        if($count < 7){
            $paginations = '';
        }

        return view('user.pages.events', ['page' => __('content.Events')], compact('events', 'count', 'paginations'));
    }
    public function event($slug, $id){
        $event = Events::find($id);
        $s = explode('T', $event->start);
        $start = $s[0] . ' ' . $s[1];
        $e = explode('T', $event->end);
        $end = $e[0] . ' ' . $e[1];

        $image = EventImages::find($event->image);
        $latest = Events::limit(3)->orderByDesc('created_at')->get();
        return view('user.pages.event_detail', ['page' => 'Tədbirlər'], compact('event', 'latest', 'image', 'start', 'end'));
    }
}
