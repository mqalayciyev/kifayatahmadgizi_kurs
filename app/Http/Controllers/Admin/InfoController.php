<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EventImages;
use App\Models\Events;
use App\Models\News;
use App\Models\NewsImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class InfoController extends Controller
{
    public function news() {
        return view('admin.pages.info.news', ['page' => 'Xəbərlər']);
    }
    public function index_data_news()
    {
        $rows = News::select(['news.*']);
        return DataTables::eloquent($rows)
            ->editColumn('image', function ($row) {
                $image = $row->image ? NewsImages::where('id', $row->image)->first() : NewsImages::where('id', 1)->first();
                return '<img style="width: 100px; height: auto;" src="'. asset('images/news/' . $image->image) .'" />';
            })
            ->addColumn('text', function ($row) {
                return $row->text;

            })
            ->addColumn('action', function ($row) {
                return '<div>
                        <a href="' . route('admin.news.edit', $row->id) . '" class="btn btn-sm btn-primary edit"> <i class="fas fa-pencil-alt"></i> </a>
                        <a href="javascript:void(0);" class="btn btn-sm btn-danger delete"  id="' . $row->id . '"> <i class="fas fa-trash"></i> </a>
                        </div>';

            })
            ->addColumn('checkbox', function($row){
                return '<input type="checkbox" name="checkbox[]" id="checkbox" class="checkbox" value="{{$id}}" />';
            })
            ->rawColumns(['image', 'text','checkbox', 'action'])
            ->toJson();
    }
    public function delete_data_news(Request $request)
    {
        $rows = News::find($request->input('id'));
        if ($rows->delete()) {
            echo 'Silindi';
        }
    }

    public function mass_remove_news(Request $request)
    {
        $id_array = $request->input('id');
        $rows = News::whereIn('id', $id_array);
        if ($rows->delete()) {
            echo 'Silindi';
        }
    }
    public function formNews($id = 0) {
        $entry = new News();
        $image = null;
        if($id > 0){
            $entry = News::find($id);
            $image = NewsImages::where('id', $entry->image)->first();
            if(!$image){
                $image = NewsImages::where('id', 1)->first();
            }
        }
        return view('admin.pages.info.formNews', ['page' => 'Xəbərlər'], compact('entry', 'image'));
    }
    public function newsSave($id = 0){
        $this->validate(request(), [
            'title' => 'required',
            'text' => 'required',
        ]);

        $data = request()->only('title', 'text');

        if (request()->filled('image')) {
            $data['image'] = request('image');
        }
        if ($id > 0) {
            $entry = News::where('id', $id)->firstOrFail();
            $entry->update($data);
        }
        else{
            $entry = News::create($data);
        }
        return redirect()
            ->route('admin.news.edit', $entry->id)
            ->with('message_type', 'success')
            ->with('message', $id > 0 ? 'Məlumat yeniləndi' : 'Məlumat əlavə edildi');
    }
    public function upload_image_news(){
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
            $destinationPath = public_path('/images/news/');
            $image->move($destinationPath, $imagename);

            $path = asset('images/news/' . $imagename);

            $data['image'] = $imagename;

            $image = NewsImages::create($data);

            News::where('id', $id)->update([
                'image' => $image->id,
            ]);
        }
        return response()->json(['status' => 'success', 'url' => $path]);
    }
    public function delete_image_news($id, $image){
        if($image != 1){
            NewsImages::where('id', $image)->delete();
        }

        News::where('id', $id)->update([
            'image' => 1,
        ]);
        return redirect()->back();
    }

    public function events() {
        return view('admin.pages.info.events', ['page' => 'Tədbirlər']);
    }
    public function index_data_events()
    {
        $rows = Events::select(['events.*']);
        return DataTables::eloquent($rows)
            ->editColumn('start_end', function ($row) {
                $start = explode("T", $row->start);
                $end = explode("T", $row->end);
                return '<div><p>'.$start[0] . '</> / ' . $end[0] . '</div>';

            })
            ->editColumn('image', function ($row) {
                 $image = $row->image ? EventImages::where('id', $row->image)->first() : EventImages::where('id', 1)->first();
                return '<img style="width: 100px; height: auto;" src="'. asset('images/events/' . $image->image) .'" />';
            })
            ->addColumn('text', function ($row) {
                return $row->text;

            })
            ->addColumn('action', function ($row) {
                return '<div>
                        <a href="' . route('admin.events.edit', $row->id) . '" class="btn btn-sm btn-primary edit"> <i class="fas fa-pencil-alt"></i> </a>
                        <a href="javascript:void(0);" class="btn btn-sm btn-danger delete"  id="' . $row->id . '"> <i class="fas fa-trash"></i> </a>
                        </div>';

            })
            ->addColumn('checkbox', function($row){
                return '<input type="checkbox" name="checkbox[]" id="checkbox" class="checkbox" value="{{$id}}" />';
            })
            ->rawColumns(['image', 'start_end', 'text', 'checkbox', 'action'])
            ->toJson();
    }
    public function delete_data_events(Request $request)
    {
        $rows = Events::find($request->input('id'));
        if ($rows->delete()) {
            echo 'Silindi';
        }
    }

    public function mass_remove_events(Request $request)
    {
        $id_array = $request->input('id');
        $rows = Events::whereIn('id', $id_array);
        if ($rows->delete()) {
            echo 'Silindi';
        }
    }
    public function formEvent($id = 0) {
        $entry = new Events();
        $image = null;
        if($id > 0){
            $entry = Events::find($id);
            $image = EventImages::where('id', $entry->image)->first();
            if(!$image){
                $image = EventImages::where('id', 1)->first();
            }
        }
        return view('admin.pages.info.formEvent', ['page' => 'Tədbirlər'], compact('entry', 'image'));
    }
    public function eventSave($id = 0){
        $this->validate(request(), [
            'title' => 'required',
            'address' => 'required',
            'start' => 'required',
            'end' => 'required',
            'text' => 'required',
        ]);

        $data = request()->only('title', 'address', 'start', 'end', 'text');
        if (request()->filled('image')) {
            $data['image'] = request('image');
        }
        if ($id > 0) {
            $entry = Events::where('id', $id)->firstOrFail();
            $entry->update($data);
        }
        else{
            $entry = Events::create($data);
        }
        return redirect()
            ->route('admin.events.edit', $entry->id)
            ->with('message_type', 'success')
            ->with('message', $id > 0 ? 'Məlumat yeniləndi' : 'Məlumat əlavə edildi');
    }
    public function upload_image_events(){
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
            $destinationPath = public_path('/images/events/');
            $image->move($destinationPath, $imagename);

            $path = asset('images/events/' . $imagename);

            $data['image'] = $imagename;

            $image = EventImages::create($data);

            Events::where('id', $id)->update([
                'image' => $image->id,
            ]);
        }
        return response()->json(['status' => 'success', 'url' => $path]);
    }
    public function delete_image_events($id, $image){
        if($image != 1){
            EventImages::where('id', $image)->delete();
        }

        Events::where('id', $id)->update([
            'image' => 1,
        ]);
        return redirect()->back();
    }
}
