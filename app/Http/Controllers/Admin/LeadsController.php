<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Leads;
use App\Models\LeadsNote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class LeadsController extends Controller
{
    public function index() {
        return view('admin.pages.leads.leads', ['page' => 'Leads']);
    }
    public function index_data()
    {
        $rows = Leads::select(['leads.*', DB::raw("CONCAT(leads.first_name,' ',leads.last_name) as name")]);
        return DataTables::eloquent($rows)
            ->filterColumn('name', function ($query, $keyword) {
                $sql = "CONCAT(leads.first_name,' ',leads.last_name)  like ?";
                $query->whereRaw($sql, ["%{$keyword}%"]);
            })

            ->addColumn('action', function ($row) {
                return '<div class="text-center">
                        <a href="' . route('admin.leads.edit', $row->id) . '" class="btn btn-sm btn-primary edit"> <i class="fas fa-pencil-alt"></i> </a>
                        <a href="javascript:void(0);" class="btn btn-sm btn-danger delete"  id="' . $row->id . '"> <i class="fas fa-trash"></i> </a>
                        <a href="javascript:void(0);" class="btn btn-sm btn-warning notes" data-toggle="modal" data-target="#exampleModal"  data-id="' . $row->id . '"> <i class="fas fa-clipboard"></i> </a>
                        </div>';

            })
            ->addColumn('checkbox', function($row){
                return '<input type="checkbox" name="checkbox[]" id="checkbox" class="checkbox" value="{{$id}}" />';
            })
            ->rawColumns(['checkbox', 'action'])
            ->toJson();
    }
    public function form($id = 0) {
        $entry = new Leads();
        if($id > 0){
            $entry = Leads::find($id);
        }
        return view('admin.pages.leads.form', ['page' => 'Leads'], compact('entry'));
    }
    public function save($id = 0){
        $data = request()->only('first_name', 'last_name', 'email', 'mobile');
        $this->validate(request(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
        ]);
        if ($id > 0) {
            $entry = Leads::where('id', $id)->firstOrFail();
            $entry->update($data);
        }
        else{
            $entry = Leads::create($data);
        }
        return redirect()
            ->route('admin.leads.edit', $entry->id)
            ->with('message_type', 'success')
            ->with('message', $id > 0 ? 'Məlumat yeniləndi' : 'Məlumat əlavə edildi');
    }
    public function add(Request $request){
        $validator = Validator::make($request->all(), [
            'note' => 'required',
            'id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()]);
        }

        $add = new LeadsNote();
        $add->leads = $request->id;
        $add->note = $request->note;
        if ($request->datetime != '') {
            $add->created_at = $request->datetime;
            $add->updated_at = $request->datetime;
        }
        $add->save();

        return response()->json(['status' => 'success']);
    }
    public function delete_data(Request $request)
    {
        $rows = Leads::find($request->input('id'));
        if ($rows->delete()) {
            echo 'Silindi';
        }
    }

    public function mass_remove(Request $request)
    {
        $id_array = $request->input('id');
        $rows = Leads::whereIn('id', $id_array);
        if ($rows->delete()) {
            echo 'Silindi';
        }
    }
    public function get_notes(){
        $id = request('id');
        $notes = LeadsNote::where('leads', $id)->orderBy('updated_at', 'DESC')->get();
        $output = "";
        foreach ($notes as $value) {
           $output .= ' <div class="row form-group">
                <div class="alert alert-primary col-12">
                    <span class="close text-danger delete_note" data-id="' . $value->id .'" style="cursor: pointer"><i class="fas fa-trash"></i></span>
                    <p>' . $value->note . '</p>
                    <p><small>' . $value->updated_at . '</small></p>
                </div>
            </div>';
        }
        if($output == ''){
            $output = ' <div class="row form-group">
            <div class="alert alert-info col-12">
                Göstəriləcək qeyd yoxdur!
            </div>
        </div>';
        }
        return $output;
    }
    public function delete_note(){
        LeadsNote::where('id', request('id'))->delete();
        echo 'Silindi';
    }
}
