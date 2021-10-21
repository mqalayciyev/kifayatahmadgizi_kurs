<?php

namespace App\Http\Controllers\Admin;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Image;

class GalleryController extends Controller
{
    public function index()
    {
        return view('admin.pages.gallery.index', ['page' =>  __('content.Gallery')]);
    }
    public function save_slide()
    {
        $validator = Validator::make(request()->all(), [
            'image' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()]);
        }

        $id = request('id');
        $image = request()->file('image');
        $image = request()->image;

        $filename = 'gallery_' . time() . '.webp';

        $path = public_path('images/gallery/' . $filename);
        $square = Image::canvas(1000, 575, array(255, 255, 255, 0));

        $img = Image::make($image->getRealPath())
            ->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
        $square->insert($img, 'center');
        $square->save($path);

        $data['image'] = $filename;
        if ($id > 0) {
            Gallery::where('id', $id)->update($data);
            $message = 'Məlumat yeniləndi';
        } else {
            Gallery::create($data);
            $message = 'Məlumat əlavə edildi';
        }

        return response()->json(['status' => 'success', 'message' => $message]);
    }
    public function get_slides()
    {
        $slides = Gallery::get();
        $output = "";
        foreach ($slides as $item) {
            $output .= "<tr>";
            $output .= '<th scope="row"><img style="width: 150px; height: auto;" src="' . asset('images/gallery/' . $item->image) . '" /></th>';
            $status = ($item->status) ? 'Aktiv'  : 'Passiv';
            $bg = ($item->status) ? 'success'  : 'warning';
            $output .= '<td><a href="' . route('admin.gallery.status_slide', $item->id) . '"><span class="badge badge-' . $bg . '">' . $status . '</span></a></td>';
            $output .= '<td class="text-right">
                <a href="' . route('admin.gallery.delete_slide', $item->id) . '" class="btn btn-danger"><i
                        class="fas fa-trash"></i></a>
                <button class="btn btn-warning slides" data-type="edit"
                    data-id="' . $item->id . '"><i class="fas fa-pencil-alt"></i></button>
            </td>';
            $output .= "</tr>";
        }
        return response()->json(['status' => 'success', 'output' => $output]);
    }
    public function get_slide()
    {
        $id = request('id');
        $gallery = Gallery::where('id', $id)->first();
        $image = asset('images/gallery/' . $gallery->image);
        return response()->json(['image' => $image]);
    }
    public function status_slide($id)
    {
        $gallery = Gallery::where('id', $id)->first();
        Gallery::where('id', $id)->update([
            'status' => !$gallery->status,
        ]);
        return redirect()->back();
    }
    public function delete_slide($id)
    {
        Gallery::where('id', $id)->delete();
        return redirect()->back();
    }
}
