<?php

namespace App\Http\Controllers\UserInterface;

use App\Http\Controllers\Controller;
use App\Models\Leads;
use App\Models\Message;
use Illuminate\Http\Request;

class ApplyController extends Controller
{
    public function index(){
        return view('user.pages.apply', ['page' =>  __('content.Apply')]);
    }
    public function message(){
        $this->validate(request(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'message' => 'required',
        ]);
        $data = request()->only('first_name', 'last_name', 'email', 'mobile', 'message');
        if (request()->filled('subject')) {
            $data['subject'] = request('subject');
        }

        Message::create($data);
        $hasNumber = Leads::where('mobile', request('mobile'))->first();
        if($hasNumber){
            $data2 = request()->only('first_name', 'last_name', 'email');
            Leads::where('mobile', request('mobile'))->update($data2);
        }
        else{
            $data2 = request()->only('first_name', 'last_name', 'email', 'mobile');
            Leads::create($data2);
        }

        return redirect()
            ->back()
            ->with('message_type', 'success')
            ->with('message', 'Mesajınız göndərildi. Tezliklə sizinlə əlaqə saxlanılacaq.');
    }
    public function leads(){
        $this->validate(request(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
        ]);
        $hasNumber = Leads::where('mobile', request('mobile'))->first();
        if($hasNumber){
            $data = request()->only('first_name', 'last_name', 'email');
            Leads::where('mobile', request('mobile'))->update($data);
        }
        else{
            $data = request()->only('first_name', 'last_name', 'email', 'mobile');
            Leads::create($data);
        }
        return redirect()
            ->back()
            ->with('message_type', 'success')
            ->with('message', 'Maraciət göndərildi. Tezliklə sizinlə əlaqə saxlanılacaq.');
    }

}
