<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\CountryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Image;
use Yajra\DataTables\Facades\DataTables;

class CountryController extends Controller
{
    public function index()
    {
        $entry = new Country;
        $categories = Country::all();
        $page = 'Country';
        return view('admin.pages.country.index', compact('categories', 'entry', 'page'));
    }

    public function index_data()
    {
        $rows = Country::select(['id', 'country_name', 'slug',]);
        return DataTables::eloquent($rows)
            ->addColumn('image', function ($row) {
                $img  = $row->image->image_name ? asset('images/country/' . $row->image->image_name) : asset('images/woocommerce-placeholder-300x300.png');
                return '<div class="text-center"><img style="width: 100px; height: auto;" src="'. $img  .'" /></div>';;
            })
            ->addColumn('action', function ($row) {
                return '<div>
                <a href="javascript:void(0);" class="btn btn-xs btn-primary edit" id="' . $row->id . '"> <i class="fa fa-edit"></i> Edit</a>
                <a href="javascript:void(0);" class="btn btn-xs btn-danger delete" id="' . $row->id . '"> <i class="fa fa-remove"></i> Delete</a>
                </div>';
            })
            ->addColumn('checkbox', function($row){
                return '<input type="checkbox" name="checkbox[]" id="checkbox" class="checkbox" value="{{$id}}" />';
            })
            ->rawColumns(['image', 'checkbox', 'action'])
            ->toJson();
    }

    public function post_data(Request $request)
    {

        $validation = Validator::make($request->all(), [
            'country_name' => 'required'
        ]);


        $error_array = array();
        $success_output = '';

        $data = request()->only('country_name', 'country_view', 'slug', 'top_id');
        $data['slug'] = str_slug(request('country_name'));

        request()->merge(['slug' => $data['slug']]);

        if ($validation->fails()) {
            foreach ($validation->messages()->getMessages() as $messages) {
                $error_array[] = $messages;
            }
        } else {
            if ($request->get('button_action') == "insert") {
                $entry = Country::create($data);
                $success_output = '<div class="alert alert-success">' . __('admin.Data Inserted') . '</div>';
            }

            if ($request->get('button_action') == "update") {

                $entry = Country::where('id', $request->get('id'))->firstOrFail();
                $entry->update($data);
                $success_output = '<div class="alert alert-success">' . __('admin.Data Updated') . '</div>';
            }

        }
        if(request()->has('country_image_delete')){
            $image = CountryImage::where('country_id', $entry->id)->first();
            $image_path = 'images/country/' . $image->image_name;
            unlink($image_path);
            CountryImage::where('country_id', $entry->id)->delete();
        }
        if(request()->hasFile('country_image')){
            $product_image = request()->file('country_image');

            $filename = $data['slug'] . '_' . time().'.webp';
            $path = public_path('images/country/' . $filename);
            $square = Image::canvas(300, 300, array(255, 255, 255));

            $img = Image::make($product_image->getRealPath())
                    ->resize(300, null, function ($constraint) {
                            $constraint->aspectRatio();
            });
            $square->insert($img, 'center');
            $square->save($path);

            $image = CountryImage::where('country_id', $entry->id)->first();

            if($image){
                CountryImage::where('country_id', $entry->id)->update([
                    'image_name' => $filename
                ]);
            }
            else{
                CountryImage::create([
                    'country_id' => $entry->id,
                    'image_name' => $filename
                ]);
            }
        }
        $output = array(
            'error' => $error_array,
            'success' => $success_output
        );

        echo json_encode($output);
    }

    public function fetch_data(Request $request)
    {
        $id = $request->input('id');
        $rows = Country::find($id);
        $image = CountryImage::where('country_id', $id)->first();
        if($image){
            $img = asset('images/country/' . $image->image_name);
        }
        else{
            $img = asset('images/woocommerce-placeholder-300x300.png');
        }
        $output = array(
            'country_name' => $rows->country_name,
            'country_view' => $rows->country_view,
            'country_image_view' => $img,
            'slug' => $rows->slug,
            'top_id' => $rows->top_id,
        );
        echo json_encode($output);
    }

    public function delete_data(Request $request)
    {
        $rows = Country::find($request->input('id'));
        if ($rows->delete()) {
            echo __('admin.Data Deleted');
        }
    }

    public function mass_remove(Request $request)
    {
        $id_array = $request->input('id');
        $rows = Country::whereIn('id', $id_array);
        if ($rows->delete()) {
            echo __('admin.Data Deleted');
        }
    }
}
