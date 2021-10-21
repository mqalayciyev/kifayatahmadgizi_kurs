<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class VacancyController extends Controller
{
    public function index() {
        return view('admin.pages.vacancy.vacancy', ['page' => 'Vakansiyalar']);
    }
    public function form($id = 0) {
        $entry = new Vacancy();
        if($id > 0){
            $entry = Vacancy::find($id);
        }
        return view('admin.pages.vacancy.form', ['page' => 'Vakansiyalar'], compact('entry'));
    }
    public function index_data()
    {
        $rows = Vacancy::select(['vacancies.*']);
        return DataTables::eloquent($rows)
            ->addColumn('requirements', function ($row) {
                return $row->requirements;

            })
            ->addColumn('information', function ($row) {
                return $row->information;

            })
            ->addColumn('active', function ($row) {
                if($row->status){
                    $bg = "success";
                    $text = "Aktiv";
                }
                else{
                    $bg = "warning";
                    $text = "Passiv";
                }
                return '<label style="cursor: pointer;" class="badge badge-'.$bg.' status"> ' .$text . '</label>';

            })
            ->addColumn('action', function ($row) {
                return '<div>
                        <a href="' . route('admin.vacancy.edit', $row->id) . '" class="btn btn-sm btn-primary edit"> <i class="fas fa-pencil-alt"></i> </a>
                        <a href="javascript:void(0);" class="btn btn-sm btn-danger delete"  id="' . $row->id . '"> <i class="fas fa-trash"></i> </a>
                        </div>';

            })
            ->addColumn('checkbox', function($row){
                return '<input type="checkbox" name="checkbox[]" id="checkbox" class="checkbox" value="{{$id}}" />';
            })
            ->rawColumns(['requirements', 'information', 'active', 'checkbox', 'action'])
            ->toJson();
    }
    public function delete_data(Request $request)
    {
        $rows = Vacancy::find($request->input('id'));
        if ($rows->delete()) {
            echo 'Silindi';
        }
    }

    public function mass_remove(Request $request)
    {
        $id_array = $request->input('id');
        $rows = Vacancy::whereIn('id', $id_array);
        if ($rows->delete()) {
            echo 'Silindi';
        }
    }
    public function save($id = 0){
        $data = request()->only('name', 'job_address', 'requirements', 'information');
        $this->validate(request(), [
            'name' => 'required',
            'job_address' => 'required',
            'requirements' => 'required',
            'information' => 'required',
        ]);
        if ($id > 0) {
            $entry = Vacancy::where('id', $id)->firstOrFail();
            $entry->update($data);
        }
        else{
            $entry = Vacancy::create($data);
        }
        return redirect()
            ->route('admin.vacancy.edit', $entry->id)
            ->with('message_type', 'success')
            ->with('message', $id > 0 ? 'Məlumat yeniləndi' : 'Məlumat əlavə edildi');
    }
}
