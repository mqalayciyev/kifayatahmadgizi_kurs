<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teachers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class TeachersController extends Controller
{
    public function index() {
        return view('admin.pages.teachers.teachers', ['page' => 'Müəllimlər']);
    }
    public function form($id = 0) {
        $entry = new Teachers();
        $name = "Müəllimlər";
        if($id > 0){
            $entry = Teachers::find($id);
            $name = $entry->first_name . " " . $entry->last_name;
        }
        return view('admin.pages.teachers.form', ['page' => $name], compact('entry'));
    }
    public function index_data()
    {
        $rows = Teachers::select(['teachers.*', DB::raw("CONCAT(teachers.first_name,' ',teachers.last_name) as name")]);
        return DataTables::eloquent($rows)
            ->filterColumn('name', function ($query, $keyword) {
                $sql = "CONCAT(teachers.first_name,' ',teachers.last_name)  like ?";
                $query->whereRaw($sql, ["%{$keyword}%"]);
            })
            ->editColumn('image', function ($row) {
                return '<div class="text-center"><img style="width: 100px; height: 100px; border-radius: 50%" src="'. asset('images/team/' . $row->image) .'" /></div>';;
            })
            ->addColumn('skills', function ($row) {
                return $row->skills;

            })
            ->addColumn('action', function ($row) {
                return '<div>
                        <a href="' . route('admin.teachers.edit', $row->id) . '" class="btn btn-sm btn-primary edit"> <i class="fas fa-pencil-alt"></i> </a>
                        <a href="javascript:void(0);" class="btn btn-sm btn-danger delete"  id="' . $row->id . '"> <i class="fas fa-trash"></i> </a>
                        </div>';

            })
            ->addColumn('checkbox', function($row){
                return '<input type="checkbox" name="checkbox[]" id="checkbox" class="checkbox" value="{{$id}}" />';
            })
            ->rawColumns(['image', 'skills', 'checkbox', 'action'])
            ->toJson();
    }
    public function delete_data(Request $request)
    {
        $rows = Teachers::find($request->input('id'));
        if ($rows->delete()) {
            echo 'Silindi';
        }
    }

    public function mass_remove(Request $request)
    {
        $id_array = $request->input('id');
        $rows = Teachers::whereIn('id', $id_array);
        if ($rows->delete()) {
            echo 'Silindi';
        }
    }

    public function save($id = 0){
        $data = request()->only('first_name', 'last_name', 'department', 'language', 'skills');
        $this->validate(request(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'department' => 'required',
            'language' => 'required',
            'skills' => 'required',
        ]);
        if ($id > 0) {
            $entry = Teachers::where('id', $id)->firstOrFail();
            $entry->update($data);
        }
        else{
            $entry = Teachers::create($data);
        }
        return redirect()
            ->route('admin.teachers.edit', $entry->id)
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
            $imagename = time().'.webp';
            $destinationPath = public_path('/images/team/');
            $image->move($destinationPath, $imagename);
            $data['image'] = $imagename;
            $path = asset('images/team/' . $imagename);

            Teachers::where('id', $id)->update([
                'image' => $imagename,
            ]);
        }
        return response()->json(['status' => 'success', 'url' => $path]);
    }

    public function delete_image($id){
        Teachers::where('id', $id)->update([
            'image' => 'teacher.jpg',
        ]);
        return redirect()->back();
    }
}
