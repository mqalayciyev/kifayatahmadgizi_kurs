<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class MessagesController extends Controller
{
    public function index() {
        return view('admin.pages.messages.messages', ['page' => 'Mesajlar']);
    }
    public function index_data()
    {
        $rows = Message::select(['messages.*', DB::raw("CONCAT(messages.first_name,' ',messages.last_name) as name")]);
        return DataTables::eloquent($rows)
            ->filterColumn('name', function ($query, $keyword) {
                $sql = "CONCAT(messages.first_name,' ',messages.last_name)  like ?";
                $query->whereRaw($sql, ["%{$keyword}%"]);
            })

            ->addColumn('action', function ($row) {
                return '<div>
                        <a href="javascript:void(0);" class="btn btn-sm btn-danger delete"  id="' . $row->id . '"> <i class="fas fa-trash"></i> </a>
                        </div>';

            })
            ->addColumn('checkbox', function($row){
                return '<input type="checkbox" name="checkbox[]" id="checkbox" class="checkbox" value="{{$id}}" />';
            })
            ->rawColumns(['checkbox', 'action'])
            ->toJson();
    }
    public function delete_data(Request $request)
    {
        $rows = Message::find($request->input('id'));
        if ($rows->delete()) {
            echo 'Silindi';
        }
    }

    public function mass_remove(Request $request)
    {
        $id_array = $request->input('id');
        $rows = Message::whereIn('id', $id_array);
        if ($rows->delete()) {
            echo 'Silindi';
        }
    }
}
