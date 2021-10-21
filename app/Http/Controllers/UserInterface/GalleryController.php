<?php

namespace App\Http\Controllers\UserInterface;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(){
        return view('user.pages.gallery', ['page' => 'Gallery']);
    }
    public function items(){
        $number = request('number');
        $number = ($number - 1) * 9;
        $photo = Gallery::where('status', 1)->offset($number)->limit(9)->orderByDesc('created_at')->get();
        $total = Gallery::where('status', 1)->count();
        $gallery = [];
        $images = [];
        foreach ($photo as $item) {
            $items = '<div class="card">
                <img class="card-img-top gallery-image img-fluid" src="' . asset('images/gallery/'. $item->image) .'" alt="'. $item->image .'">
            </div>';
            array_push($gallery, $items);
            array_push($images, asset('images/gallery/'. $item->image));
        }
        return response()->json(['gallery' => $gallery, 'images' => $images, 'total' => $total]);
    }
}
