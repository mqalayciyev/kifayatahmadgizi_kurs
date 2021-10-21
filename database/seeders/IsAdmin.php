<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class IsAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $first_name = 'Education';
        $last_name = 'Center';
        $email = 'admin@educationcenter.az';
        $password = '12345678';
        $mobile = '+994514598208';
        $is_active = 1;
        $is_manage = 1;
        $add = new Admin();
        $add->first_name = $first_name;
        $add->last_name = $last_name;
        $add->email = $email;
        $add->password = Hash::make($password);
        $add->mobile = $mobile;
        $add->is_active = $is_active;
        $add->is_manage = $is_manage;
        $add->save();
    }
}
