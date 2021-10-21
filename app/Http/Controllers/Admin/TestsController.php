<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Level;
use App\Models\Tests;
use App\Models\TestResults;
use App\Models\Questions;
use App\Models\TestImages;
use App\Models\TestScores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class TestsController extends Controller
{
    public function index() {
        return view('admin.pages.tests.tests', ['page' => 'Testlər']);
    }
    public function form($id = 0) {
        $entry = new Tests();
        if($id > 0){
            $entry = Tests::find($id);
        }
        $questions = Questions::where('test', request('id'))->get();
        $levels = Level::get();
        return view('admin.pages.tests.form', ['page' => 'Testlər'], compact('entry', 'levels', 'questions'));
    }
    public function index_data()
    {
        $rows = Tests::select(['tests.*']);
        return DataTables::eloquent($rows)
            ->editColumn('level', function ($row) {
                if($row->level != '0'){
                    $level = Level::find($row->level);
                    if($level){
                        $level = $level->level;
                    }
                    else{
                        $level = 'NAN';
                    }
                    
                }
                else{
                    $level = 'None';
                }
                return $level;

            })
            ->editColumn('image', function ($row) {
                return '<div class="text-center"><img style="width: 100px; height: auto;" src="'. asset('images/tests/' . $row->image) .'" /></div>';;
            })
            ->addColumn('action', function ($row) {
                return '<div class="text-center">
                        <a href="javascript:void(0);" class="btn btn-sm btn-success add_questions"  data-id="' . $row->id . '"> <i class="fas fa-plus"></i> </a>
                        <a href="' . route('admin.tests.edit', $row->id) . '" class="btn btn-sm btn-primary edit"> <i class="fas fa-pencil-alt"></i> </a>
                        <a href="javascript:void(0);" class="btn btn-sm btn-danger delete"  id="' . $row->id . '"> <i class="fas fa-trash"></i> </a>

                        </div>';

            })
            ->addColumn('checkbox', function($row){
                return '<input type="checkbox" name="checkbox[]" id="checkbox" class="checkbox" value="{{$id}}" />';
            })
            ->rawColumns(['image', 'level', 'checkbox', 'action'])
            ->toJson();
    }
    public function delete_data(Request $request)
    {
        $rows = Tests::find($request->input('id'));
        if ($rows->delete()) {
            TestScores::where('test', $request->input('id'))->delete();
            Questions::where('test', $request->input('id'))->delete();
            TestResults::where('test', $request->input('id'))->delete();
            echo 'Silindi';
        }
    }

    public function mass_remove(Request $request)
    {
        $id_array = $request->input('id');
        $rows = Tests::whereIn('id', $id_array);
        if ($rows->delete()) {
            TestScores::whereIn('test', $id_array)->delete();
            Questions::whereIn('test', $id_array)->delete();
            TestResults::whereIn('test', $id_array)->delete();
            echo 'Silindi';
        }
    }
    public function save($id = 0){

        $this->validate(request(), [
            'name' => 'required',
            'term' => 'required',
            'level' => 'required',
        ]);
        $data = request()->only('name', 'term', 'level');
        if ($id > 0) {
            $entry = Tests::where('id', $id)->firstOrFail();
            $entry->update($data);
        }
        else{
            $entry = Tests::create($data);
        }
        return redirect()
            ->route('admin.tests.edit', $entry->id)
            ->with('message_type', 'success')
            ->with('message', $id > 0 ? 'Məlumat yeniləndi' : 'Məlumat əlavə edildi');
    }
    public function score() {
        return view('admin.pages.tests.testscore', ['page' => 'Test Nəticələri']);
    }
    public function index_data_testscore()
    {
        $rows = TestScores::select(['test_scores.*', DB::raw("CONCAT(test_scores.first_name,' ',test_scores.last_name) as name")]);
        return DataTables::eloquent($rows)
            ->filterColumn('name', function ($query, $keyword) {
                $sql = "CONCAT(test_scores.first_name,' ',test_scores.last_name)  like ?";
                $query->whereRaw($sql, ["%{$keyword}%"]);
            })
            ->addColumn('image', function ($row) {
                $test = Tests::find($row->test);
                return '<div class="text-center"><img style="width: 100px; height: auto;" src="'. asset('images/tests/' . $test->image) .'" /></div>';
                return $row->test;
                
            })
            ->addColumn('action', function ($row) {
                return '<div>
                        <a href="javascript:void(0);" class="btn btn-sm btn-info view my-1" data-toggle="modal" data-target="#exampleModal" data-user="' . $row->id . '"  data-id="' . $row->test . '"> <i class="far fa-sticky-note"></i> </a>
                        <a href="javascript:void(0);" class="btn btn-sm btn-danger delete"  id="' . $row->id . '"> <i class="fas fa-trash"></i> </a>
                        </div>';

            })
            ->addColumn('checkbox', function($row){
                return '<input type="checkbox" name="checkbox[]" id="checkbox" class="checkbox" value="{{$id}}" />';
            })
            ->rawColumns(['image', 'checkbox', 'action'])
            ->toJson();
    }
    public function delete_data_testscore(Request $request)
    {
        $rows = TestScores::find($request->input('id'));
        if ($rows->delete()) {
            TestResults::where('score', $request->input('id'))->delete();
            echo 'Silindi';
        }
    }

    public function mass_remove_testscore(Request $request)
    {
        $id_array = $request->input('id');
        $rows = TestScores::whereIn('id', $id_array);
        if ($rows->delete()) {
            TestResults::whereIn('score', $id_array)->delete();
            echo 'Silindi';
        }
    }
    public function add_question(){
        $validator = Validator::make(request()->all(), [
            'id' => 'required',
            'question' => 'required',
            'answer_true' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()]);
        }
        $data = request()->only('question', 'answer_true', 'answer_2', 'answer_3', 'answer_4', 'answer_5');
        $data['test'] = request('id');
        $id = request('question_id');
        if ($id > 0) {
            $entry = Questions::where('id', $id)->firstOrFail();
            $entry->update($data);
        }
        else{
            $entry = Questions::create($data);
        }
        $count = Questions::where('test', request('id'))->count();
        Tests::where('id', request('id'))->update([
            'question_count' => $count
        ]);
        return response()->json(['status' => 'success']);
    }
    public function all_questions(){
        $questions = Questions::where('test', request('id'))->get();
        $output = "";
        $count = 1;
        foreach ($questions as $value) {
            $output .= '<div class="row mt-3 border rounded"><div class="col-10 p-2">';
            $output .= '<div><span>'. $count . '.</span> ' . $value->question .'</div>';
            $output .= '<ul>';
            $output .= '<li><span class="bg-success p-1 rounded">'. $value->answer_true .'</span></li>';
            $output .= ($value->answer_2 != '') ? '<li>'. $value->answer_2 .'</li>' : null;
            $output .= ($value->answer_3 != '') ? '<li>'. $value->answer_3 .'</li>' : null;
            $output .= ($value->answer_4 != '') ? '<li>'. $value->answer_4 .'</li>' : null;
            $output .= ($value->answer_5 != '') ? '<li>'. $value->answer_5 .'</li>' : null;
            $output .= '<ul>';
            $output .= '</ul>';
            $output .= '</div>';
            $output .= '<div class="col-2 text-right p-2">';
            $output .= '<p><button class="btn btn-danger delete_question" data-id="'. $value->id .'"><i class="fas fa-trash"></i></button></p>';
            $output .= '<p><button class="btn btn-warning edit_question" data-id="'. $value->id .'"><i class="fas fa-pencil-alt"></i></button></p>';
            $output .= '</div>';
            $output .= '</div>';

            $count++;

        }

        return response()->json(['status' => 'success', 'message' => $output]);

    }
    public function get_question(){
        $question = Questions::where('id', request('id'))->first();
        return response()->json(['status' => 'success', 'message' => ['question' => $question->question,
                                                                      'answer_true' => $question->answer_true,
                                                                      'answer_2' => $question->answer_2,
                                                                      'answer_3' => $question->answer_3,
                                                                      'answer_4' => $question->answer_4,
                                                                      'answer_5' => $question->answer_5,]]);
    }
    public function delete_question(){
        Questions::where('id', request('id'))->delete();
        TestResults::whereIn('question', request('id'))->delete();
        return response()->json(['status' => 'success']);
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
            $destinationPath = public_path('/images/tests/');
            $image->move($destinationPath, $imagename);
            $data['image'] = $imagename;
            $path = asset('images/tests/' . $imagename);

            Tests::where('id', $id)->update([
                'image' => $imagename,
            ]);
        }
        return response()->json(['status' => 'success', 'url' => $path]);
    }

    public function delete_image($id){
        Tests::where('id', $id)->update([
            'image' => 'test.jpg',
        ]);
        return redirect()->back();
    }
    public function view(){
        $tests = Tests::find(request('test'));
        $questions = Questions::where('test', request('test'));
        $score = TestScores::find(request('user'));
        $name = $score->first_name . " " . $score->last_name;
        $test_name = $tests->name;
        $result = TestResults::where('test', request('test'))->where('email', $score->email)->where('score', request('user'))->get();
        $count = TestResults::where('test', request('test'))->where('email', $score->email)->where('score', request('user'))->where('result', 1)->count();
        $output = '<div class="card"><div class="card-header">' . $name .'-'. $test_name . '</div><div class="card-body"><h5>Düzgün cavablar : ' . $count . '</h5>';
        
        foreach($result as $item){
            $question = Questions::find($item->question);
            $output .= '<div class="row"><div class="col-12 py-3">';
            $output .= '<p>' . $question->question;
            $output .= '</p><ul class="pl-2"><li>Düzgün cavab :';
            $output .= $item->true;
            $output .= '</li><li>Sizin cavabınız : <span style="display: inline-block; padding: 0px 4px" class="';
            $output .= $item->current == $item->true ? 'bg-success' : 'bg-danger';
            $output .= '">' . $item->current;
            $output .= '</span></li></ul></div></div>';
        }
        
        $output .= '</div></div>';
        
        return $output;
                        
    }
}
