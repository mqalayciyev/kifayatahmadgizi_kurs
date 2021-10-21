<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Mail\ResetPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;
use App\Models\PasswordReset;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function index(){
        if (request()->isMethod('POST')) {
            $this->validate(request(), [
                'email' => 'required|email',
                'password' => 'required'
            ]);

            $admin = Admin::where('email', request('email'))->first();
            $admin_count = Admin::where('email', request('email'))->count();
            if($admin_count === 0){
                return back()->withInput()->withErrors(['email' => 'Sehv giris']);
            }
            $credentials = [
                'email' => request()->get('email'),
                'password' => request()->get('password'),
                'is_active' => 1,
                'is_manage' => 1
            ];

            if (Auth::guard('admin')->attempt($credentials, request()->has('rememberme'))) {
                return redirect()->route('admin.homepage');
            } else {

                return back()->withInput()->withErrors(['email' => 'Sehv giris']);
            }

        }
        return view('admin.login');
    }
    public function index_data()
    {
        $rows = Admin::select(['admins.*', DB::raw("CONCAT(admins.first_name,' ',admins.last_name) as name")]);
        return DataTables::eloquent($rows)
            ->filterColumn('name', function ($query, $keyword) {
                $sql = "CONCAT(admins.first_name,' ',admins.last_name)  like ?";
                $query->whereRaw($sql, ["%{$keyword}%"]);
            })
            ->editColumn('is_active', function ($row) {
                $output = '<span class="badge badge-' . (($row->is_active == 1) ? 'success' : 'warning') . '">';
                $output .= ($row->is_active == 1) ? 'Aktiv' : 'Passiv';
                $output .= '</span>';
                return $output;
            })
            ->editColumn('is_manage', function ($row) {
                if($row->is_manage == 1){
                    $bg = "success";
                }
                else{
                    $bg = "default";
                }

                $output = '<span class="badge badge-' . $bg . '">';

                if($row->is_manage == 1){
                    $output .= "Admin";
                }
                else{
                    $output .= "Empty";
                }
                $output .= '</span>';
                return $output;
            })

            ->addColumn('action', function ($row) {
                return '<div>
                        <a href="' . route('admin.index.edit', $row->id) . '" class="btn btn-sm btn-primary edit"> <i class="fas fa-pencil-alt"></i> </a>
                        <a href="javascript:void(0);" class="btn btn-sm btn-danger delete disabled"  id="' . $row->id . '"> <i class="fas fa-trash"></i> </a>
                        </div>';

            })
            ->addColumn('checkbox', function($row){
                return '<input type="checkbox" name="checkbox[]" id="checkbox" class="checkbox" disabled value="{{$id}}" />';
            })
            ->rawColumns(['checkbox', 'is_active', 'is_manage', 'action'])
            ->toJson();
    }
    public function delete_data(Request $request)
    {
        $rows = Admin::find($request->input('id'));
        if ($rows->delete()) {
            echo 'Silindi';
        }
    }

    public function mass_remove(Request $request)
    {
        $id_array = $request->input('id');
        $rows = Admin::whereIn('id', $id_array);
        if ($rows->delete()) {
            echo 'Silindi';
        }
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        request()->session()->flush();
        request()->session()->regenerate();
        return redirect()->route('admin.login');
    }
    public function admin() {
        return view('admin.pages.admin.admin', ['page' => 'İdarə Heyəti']);
    }
    public function form($id = 0) {
        $entry = new Admin();
        if($id > 0){
            $entry = Admin::find($id);
        }
        return view('admin.pages.admin.form', ['page' => 'İdarə Heyəti'], compact('entry'));
    }
    public function save($id = 0){
        $this->validate(request(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile' => 'required',
            'email' => 'required|email',
            'email' => Rule::unique('admins')->ignore($id)
        ]);

        $data = request()->only('first_name', 'last_name', 'mobile', 'email');
        if (request()->filled('password')) {
            $data['password'] = Hash::make(request('password'));
        }
        $data['is_active'] = request()->has('is_active') ? 1 : 0;
        $data['is_manage'] = request()->has('is_manage') ? 1 : 0;
        if ($id > 0) {
            $entry = Admin::where('id', $id)->firstOrFail();
            $entry->update($data);
        }
        else{
            $entry = Admin::create($data);
        }
        return redirect()
            ->route('admin.index.edit', $entry->id)
            ->with('message_type', 'success')
            ->with('message', $id > 0 ? 'Məlumat yeniləndi' : 'Məlumat əlavə edildi');
    }
    public function forgot(){
        if (request()->isMethod('POST')) {
            $admin = Admin::where('email', '=', request('email'))->first();
            $count =Admin::where('email', '=', request('email'))->count();
            
            if ($count == 0) {
                return redirect()->back()->withErrors(['email' => trans('İstifadəçi mövcud deyil')]);
            }
            
            $token = Str::random(60);
            PasswordReset::insert([
                'email' =>request('email'),
                'token' => $token,
                'created_at' => Carbon::now()
            ]);
            $reset = ['link' => route('admin.recovery.password', [$token, request('email')])];
            Mail::to(request('email'))->send(new ResetPassword($reset));
            return redirect()
                ->route('admin.login')
                ->with('message_type', 'success')
                ->with('message', 'Məlumat emailinizə göndərildi.');
        }
        else{
            return view('admin.forgot_password');
        }
       
    }
    public function recovery($email, $token){
        
        $count = PasswordReset::where('email', $email)
            ->where('token', $token)
            ->where('deleted_at', NULL)
            ->count();
        if($count > 0){
            return view('admin.recovery_password', [
                'email' => $email,
                'token' => $token
            ]);
        }
        else{
            return redirect()
                ->route('admin.login')
                ->withErrors(['Token təsdiqlənmədi.']);
        }
        
    }
    public function change(){
    
        $this->validate(request(), [
            'password'              => 'required|min:6',
            'password_confirmation' => 'required|same:password'
        ]);
        
        Admin::where('email', request('email'))->update([
            'password' => Hash::make(request('password')),
        ]);
        
        PasswordReset::where('email', request('email'))
            ->where('token', request('token'))
            ->delete();
            
        return redirect()
                ->route('admin.login')
                ->with('message_type', 'success')
                ->with('message', 'Şifrəniz uğurla dəyişdirildi.');
    }
}
