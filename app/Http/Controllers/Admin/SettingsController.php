<?php

namespace App\Http\Controllers\Admin;

use App\Models\Level;
use App\Models\Teachers;
use App\Models\HomeSlider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Image;

class SettingsController extends Controller
{
    public function index(){
        $levels = Level::all();
        return view('admin.pages.setting.index', ['page' => 'Quraşdırmalar'], compact('levels'));
    }
    public function add_level(){
        $this->validate(request(), [
            'level' => 'required',
        ]);
        $id = request('id');
        $data = request()->only('level');
        if ($id > 0) {
            $entry = Level::where('id', $id)->firstOrFail();
            $entry->update($data);
        }
        else{
            $entry = Level::create($data);
        }
        return redirect()->back();
    }
    public function delete_level($id){
        Level::where('id', $id)->delete();
        return redirect()->back();
    }
    public function save_slide(){
        $id = request('id');
        if ($id === 0) {
            $validator = Validator::make(request()->all(), [
                'image' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json(['status' => 'error', 'message' => $validator->errors()]);
            }
        }




        $data = request()->only('title_1', 'title_2');
        if(request()->hasFile('image')){
            $image = request()->file('image');
            $image = request()->image;

            $filename = 'slider_' . time().'.webp';

            $path = public_path('images/sliders/' . $filename);
            $square = Image::canvas(1600, 738, array(255, 255, 255));

            $img = Image::make($image->getRealPath())
                    ->resize(1600, null, function ($constraint) {
                    $constraint->aspectRatio();
            });
            $square->insert($img, 'center');
            $square->save($path);


            $data['image'] = $filename;
        }
        if ($id > 0) {
            HomeSlider::where('id', $id)->update($data);
            $message = 'Məlumat yeniləndi';
        } else {
            HomeSlider::create($data);
            $message = 'Məlumat əlavə edildi';
        }

        return response()->json(['status' => 'success', 'message' => $message]);
    }
    public function get_slides(){
        $slides = HomeSlider::get();
        $output = "";
        foreach($slides as $item){
            $output .= "<tr>";
            $output .= '<th scope="row"><img style="width: 150px; height: auto;" src="'. asset('images/sliders/' . $item->image) .'" /></th>';
            $output .= '<td>'. $item->title_1 .'</td>';
            $output .= '<td>'. $item->title_2 .'</td>';
            $status = ($item->status) ? 'Aktiv'  : 'Passiv' ;
            $bg = ($item->status) ? 'success'  : 'warning' ;
            $output .= '<td><a href="'. route('admin.settings.status_slide', $item->id) .'"><span class="badge badge-'. $bg .'">'. $status .'</span></a></td>';
            $output .= '<td class="text-right">
                <a href="'. route('admin.settings.delete_slide', $item->id) .'" class="btn btn-danger"><i
                        class="fas fa-trash"></i></a>
                <button class="btn btn-warning slides" data-type="edit"
                    data-id="'. $item->id .'"><i class="fas fa-pencil-alt"></i></button>
            </td>';
            $output .= "</tr>";
        }
        return response()->json(['status' => 'success','output' => $output]);
    }
    public function get_slide(){
        $id = request('id');
        $slide = HomeSlider::where('id', $id)->first();
        $image = asset('images/sliders/' . $slide->image);
        return response()->json(['title_1' => $slide->title_1, 'title_2' => $slide->title_2, 'image' => $image]);
    }
    public function status_slide($id){
        $id = request('id');
        $slide = HomeSlider::where('id', $id)->first();
        HomeSlider::where('id', $id)->update([
            'status' => !$slide->status,
        ]);
        return redirect()->back();
    }
    public function delete_slide($id){
        $id = request('id');
        HomeSlider::where('id', $id)->delete();
        return redirect()->back();
    }
}
