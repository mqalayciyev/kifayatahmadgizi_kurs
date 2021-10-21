<?php

namespace App\Http\Controllers\UserInterface;

use App\Models\Leads;
use App\Models\Tests;
use App\Models\Questions;
use App\Models\TestScores;
use App\Models\TestResults;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TestController extends Controller
{
    public function index($page = 1){
        $start = ($page - 1) * 6;
        $tests = Tests::offset($start)->limit(6)->get();
        $count = Tests::count();
        $output = "";
        $pages = ceil($count/6);

        $paginations = '<div class="pagination_blog"><ul>';
        for($i = 1; $i <= $pages; $i++){

            $current = ($i == $page) ? 'current' : '';
            $paginations .= '<li class="'.$current.'"><a href='.route('tests', $i).'>'.$i.'</a></li>';

        }
        $paginations .= '</ul></div>';
        if($count < 7){
            $paginations = '';
        }

        return view('user.pages.tests', ['page' => __('content.Tests')], compact('tests', 'count', 'paginations'));
    }
    public function test(){


        $id = request('id');
        $test = Tests::find($id);


        if(session('test')){
            $session = 'true';
            $score = TestScores::find(session('test'));
            $time = $test->term;
            $email = $score->email;
            $user_id = session('test');
            // echo 'seesia aktivdir -> ' . session('test');
            return view('user.pages.test_start', ['page' => $test->name], compact('id', 'session', 'time', 'email', 'user_id'));
        }
        else{
            $session = "";
            return view('user.pages.test_start', ['page' => $test->name], compact('id', 'session'));
        }


    }
    public function login(){
        $validator = Validator::make(request()->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()]);
        }
        $id = request('id');
        $email = request('email');

        $hasNumber = Leads::where('mobile', request('mobile'))->first();
        if($hasNumber){
            $data = request()->only('first_name', 'last_name', 'email');
            Leads::where('mobile', request('mobile'))->update($data);
        }
        else{
            $data = request()->only('first_name', 'last_name', 'email', 'mobile');
            Leads::create($data);
        }
        $user = new TestScores();
        $user->first_name = request('first_name');
        $user->last_name = request('last_name');
        $user->email = request('email');
        $user->mobile = request('mobile');
        $user->test = request('id');
        $user->save();
        $user_id = $user->id;
        $test = Tests::find($id);
        session(['test' => $user_id]);
        return response()->json(['status' => 'session', 'time' => $test->term, 'email' => $email, 'user_id' => $user_id]);
    }
    public function all_questions(){
        $id = request('id');
        $questions = Questions::where('test', $id)->get();
        $output = "";
        foreach ($questions as $key => $value) {
            $answers = [$value->answer_true];
            ($value->answer_2 != "" ) ? array_push($answers, $value->answer_2) : null;
            ($value->answer_3 != "" ) ?  array_push($answers, $value->answer_3) : null;
            ($value->answer_4 != "" ) ?  array_push($answers, $value->answer_4) : null;
            ($value->answer_5 != "" ) ?  array_push($answers, $value->answer_5) : null;
            shuffle($answers);
            $output .= "<div id='question-".$value->id."' class='key text-left question col-12' data-id='".$value->id."'>";
            $output .= "<div class='col-12'><b>". ($key + 1) . '.</b> ' .$value->question."</div>";
            $output .= "<div class='col-12 px-4'><ul>";
            for($i = 0; $i<count($answers); $i++){
                $output .= "<li><label><input  class='ans.wer' type='radio' name='answer-". $value->id."' value='".$answers[$i]."'/> ".$answers[$i]."</label></li>";
            }
            $output .= "</ul></div>";
            $output .= "</div>";
        }
        return response(['question' => $output]);

    }
    public function end(){
        $id = request('id');
        $email = request('email');
        $user_id = request('user_id');
        $test = Tests::find($id);
        $data = request()->except(['_token', 'id', 'email', 'user_id']);
        function result($data, $email, $id, $user_id){
            foreach ($data as $key => $value) {
                $question = explode("-", $key)[1];
                $res = Questions::find($question);
                $add = new TestResults();
                $add->email = $email;
                $add->score = $user_id;
                $add->test = $id;
                $add->question = $question;
                $add->true = $res->answer_true;
                $add->current = $value;
                $add->result = ($value == $res->answer_true) ? 1 : 0;
                $add->save();
            }
        }

        result($data, $email, $id, $user_id);
        $count = TestResults::where('email', $email)->where('result', 1)->count();
        TestScores::where('id', $user_id)->update([
            'result' => $count,
        ]);
        session()->forget('test');
        return response()->json(['status' => 'success', 'url' => route('test.result', [$user_id, $id])]);
    }
    public function exit(){
        $id = request('id');
        $user_id = session('test');
        $test = Tests::find($id);
        session()->forget('test');
        return response()->json(['status' => 'success', 'url' => route('tets.result', [$user_id, $id])]);
    }
    public function result($user, $test){
        $tests = Tests::find($test);
        $questions = Questions::where('test', $test);
        $score = TestScores::find($user);
        $name = $score->first_name . " " . $score->last_name;
        $test_name = $tests->name;
        $result = TestResults::where('test', $test)->where('email', $score->email)->where('score', $user)->get();
        $count = TestResults::where('test', $test)->where('email', $score->email)->where('score', $user)->where('result', 1)->count();
        return view('user.pages.result',  ['page' =>  __('content.Test result')], compact('name', 'test_name', 'result', 'questions', 'count'));
    }
}
