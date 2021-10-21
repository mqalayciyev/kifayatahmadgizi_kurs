<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Method;
use Illuminate\Http\Request;
use Image;

class MethodController extends Controller
{
    public function index() {
        $entry = Method::where('id', 1)->firstOrFail();
        return view('admin.pages.method.method', ['page' => 'Method'], compact('entry'));
    }
    public function save($id = 0){

        $this->validate(request(), [
            'text' => 'required',
        ]);
        $data = request()->only('text');

        $entry = Method::where('id', 1)->firstOrFail();
        $entry->update($data);
        return redirect()
            ->back()
            ->with('message_type', 'success')
            ->with('message', $id > 0 ? 'Məlumat yeniləndi' : 'Məlumat əlavə edildi');
    }
}
