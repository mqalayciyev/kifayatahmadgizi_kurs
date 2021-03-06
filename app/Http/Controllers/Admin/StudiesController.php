<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Studies;
use Illuminate\Http\Request;

class StudiesController extends Controller
{
    public function index() {
        $entry = Studies::where('id', 1)->firstOrFail();
        return view('admin.pages.studies.studies', ['page' => 'Studies'], compact('entry'));
    }
    public function save($id = 0){

        $this->validate(request(), [
            'text_az' => 'required',
            'text_en' => 'required',
            'text_ru' => 'required',
        ]);
        $data = request()->only('text_en', 'text_az', 'text_ru');

        $entry = Studies::where('id', 1)->firstOrFail();
        $entry->update($data);
        return redirect()
            ->back()
            ->with('message_type', 'success')
            ->with('message', $id > 0 ? 'Məlumat yeniləndi' : 'Məlumat əlavə edildi');
    }
}
