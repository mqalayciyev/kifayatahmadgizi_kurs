<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Image;

class AboutController extends Controller
{
    public function index() {
        $entry = About::where('id', 1)->firstOrFail();
        return view('admin.pages.about.about', ['page' => __('content.About us')], compact('entry'));
    }
    public function save($id = 0){

        $this->validate(request(), [
            'address' => 'required',
            'mobile' => 'required',
            'text' => 'required',
        ]);
        $data = request()->only('address', 'start_day', 'start_time', 'end_day', 'end_time', 'mobile', 'phone', 'map', 'text', 'books', 'courses', 'experience', 'instagram', 'facebook', 'twitter', 'youtube', 'email');
        if (request()->hasFile('logo')) {
            // $image = request()->file('logo');
            // $imagename = 'logo.'.$image->getClientOriginalExtension();
            // $destinationPath = public_path('/images/');
            // $data['logo'] = $imagename;
            // $image->move($destinationPath, $imagename);

            $logo = request()->file('logo');
            $filename = 'logo.'.$logo->getClientOriginalExtension();
            $path = public_path('images/' . $filename);
            $rectangle = Image::canvas(230, 173, array(255, 255, 255, 0));
            $img_rec = Image::make($logo->getRealPath())
                ->resize(230, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            $rectangle->insert($img_rec, 'center');
            $rectangle->save($path);
            $data['logo'] = $filename;
        }
        $entry = About::where('id', 1)->firstOrFail();
        $entry->update($data);
        return redirect()
            ->back()
            ->with('message_type', 'success')
            ->with('message', $id > 0 ? 'Məlumat yeniləndi' : 'Məlumat əlavə edildi');
    }
}
