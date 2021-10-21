<?php

namespace App\Http\Controllers\Admin;

use App\Models\Courses;
use App\Models\Teachers;
use App\Models\CoursImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Image;

class CoursesController extends Controller
{
    public function index() {
        return view('admin.pages.courses.courses', ['page' => 'Kurslar']);
    }
    public function index_data()
    {
        $rows = Courses::select(['courses.*']);
        return DataTables::eloquent($rows)
            ->editColumn('image', function ($row) {
                return '<div class="text-center"><img style="width: 100px; height: auto;" src="'. asset('images/courses/' . $row->image) .'" /></div>';;
            })
            ->addColumn('action', function ($row) {
                return '<div>
                        <a href="' . route('admin.courses.edit', $row->id) . '" class="btn btn-sm btn-primary edit"> <i class="fas fa-pencil-alt"></i> </a>
                        <a href="javascript:void(0);" class="btn btn-sm btn-danger delete"  id="' . $row->id . '"> <i class="fas fa-trash"></i> </a>
                        </div>';

            })
            ->addColumn('checkbox', function($row){
                return '<input type="checkbox" name="checkbox[]" id="checkbox" class="checkbox" value="{{$id}}" />';
            })
            ->rawColumns(['image', 'checkbox', 'action'])
            ->toJson();
    }
    public function delete_data(Request $request)
    {
        $rows = Courses::find($request->input('id'));
        if ($rows->delete()) {
            echo 'Silindi';
        }
    }

    public function mass_remove(Request $request)
    {
        $id_array = $request->input('id');
        $rows = Courses::whereIn('id', $id_array);
        if ($rows->delete()) {
            echo 'Silindi';
        }
    }
    public function form($id = 0) {
        $entry = new Courses();
        if($id > 0){
            $entry = Courses::find($id);
        }
        return view('admin.pages.courses.form', ['page' => 'Kurslar'], compact('entry',));
    }
    public function save($id = 0){
        $data = request()->only('name', 'price', 'term', 'student_count', 'note');
        $this->validate(request(), [
            'name' => 'required',
            'note' => 'required',
        ]);
        if ($id > 0) {
            $entry = Courses::where('id', $id)->firstOrFail();
            $entry->update($data);
        }
        else{
            $entry = Courses::create($data);
        }
        return redirect()
            ->route('admin.courses.edit', $entry->id)
            ->with('message_type', 'success')
            ->with('message', $id > 0 ? 'Məlumat yeniləndi' : 'Məlumat əlavə edildi');
    }
    public function upload_image(){
        $validator = Validator::make(request()->all(), [
            'id' => 'required',
            'image' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()]);
        }
        $id = request('id');
        if(request()->hasFile('image')){
            $image = request()->file('image');
            $image = request()->image;

            $filename = time().'.webp';

            $path = public_path('images/courses/' . $filename);
            $square = Image::canvas(1000, 1000, array(255, 255, 255));

            $img = Image::make($image->getRealPath())
                    ->resize(1000, null, function ($constraint) {
                    $constraint->aspectRatio();
            });
            $square->insert($img, 'center');
            $square->save($path);

            $data['image'] = $filename;
            $path = asset('images/courses/' . $filename);



            Courses::where('id', $id)->update([
                'image' => $filename,
            ]);
        }
        return response()->json(['status' => 'success', 'url' => $path]);
    }

    public function delete_image($id){
        Courses::where('id', $id)->update([
            'image' => 'cours.jpg',
        ]);
        return redirect()->back();
    }
}
