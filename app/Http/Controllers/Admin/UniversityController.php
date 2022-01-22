<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\University;
use App\Models\UniversityImage;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Image;
use Yajra\DataTables\Facades\DataTables;


class UniversityController extends Controller
{
    public function index()
    {
        $page = 'University';
        return view('admin.pages.university.index', compact('page'));
    }

    public function index_data()
    {
        //leftJoin('university_image', 'university_image.university_id', '=', 'product.id')-> SILINDI.
        $rows = University::select([ 'university.*']);
        return DataTables::eloquent($rows)
            ->editColumn('image_name', function ($row) {
                $image = '<img src="';
                $image .= $row->image->image_name != null ? asset("images/university/" . $row->image->image_name) : asset('images/woocommerce-placeholder-300x300.png');
                $image .= '" class="img-responsive" style="width: 50px; height:50px;">';
                return $image;
            })
            ->editColumn('country', function ($row) {
                return $row->countries[0]->country_name;
            })
            ->addColumn('action', function ($row) {
                return '<div>
                <a href="' . route('admin.university.edit', $row->id) . '" class="btn btn-sm btn-primary edit"> <i class="fa fa-edit"></i> Edit</a>
                <a href="javascript:void(0);" class="btn btn-sm btn-danger delete" id="' . $row->id . '"> <i class="fa fa-remove"></i> Delete</a>
                </div>';
            })
            ->addColumn('checkbox', '<input type="checkbox" name="checkbox[]" id="checkbox" class="checkbox" value="{{$id}}" />')
            ->rawColumns(['checkbox', 'image_name', 'country', 'manage', 'action'])
            ->toJson();
    }



    public function form($id = 0)
    {
        $entry = new University;
        $university_countries = [];
        if ($id > 0) {
            $entry = University::find($id);
            $university_countries = $entry->countries()->pluck('country_id')->all();
        }

        $entry_country = new Country();

        $countries = Country::all();
        $images = UniversityImage::all();
        $page = 'University';
        return view('admin.pages.university.form', compact('entry', 'countries', 'university_countries', 'images', 'page',  'entry_country'));
    }
    public function countries(){
        $countries = Country::all();
        $output = '';
        foreach($countries as $country){

            if($country->top_id==null){
                $output .= '<option style="color:#000;" value="' . $country->id .'">' . $country->country_name . '</option>';
                foreach($countries as $alt_country){
                    if($alt_country->top_id==$country->id){
                        $output .= '<option value="' . $alt_country->id .'"> -- ' . $alt_country->country_name . '</option>';

                    }
                }
            }

        }
        echo $output;
    }
    public function save($id = 0)
    {
        $data = request()->only('university_name', 'meta_title', 'meta_discription', 'slug');

        $data['slug'] = str_slug(request('university_name'));
        request()->merge(['slug' => $data['slug']]);

        $this->validate(request(), [
            'university_name' => 'required',
            'countries' => 'required',
            'slug' => Rule::unique('university', 'slug')->ignore($id)
        ]);





        $countries = request('countries');
        $exits_country = Country::where('country_name', $countries)->first();
        if ($exits_country) {
            $countries = array(
                $exits_country->id
            );
        }

        if ($id > 0) {
            $entry = University::where('id', $id)->firstOrFail();
            $entry->update($data);
            $entry->countries()->sync($countries);
        } else {
            $entry = University::create($data);
            $entry->countries()->attach($countries);
        }


        if (request()->hasFile('university_images')) {
            $university_images = request()->file('university_images');
            $university_images = request()->university_images;
            // $cover = request()->cover;
            // $count = 0;

            foreach ($university_images as $array => $university_image) {
                $filename = 'university-' . $array . '_' . $entry->id . '_' . time() . '.webp';
                if ($university_image->isValid()) {
                    $path = public_path('images/university/' . $filename);

                    $square = Image::canvas(500, 500, array(255, 255, 255));

                    $img = Image::make($university_image->getRealPath())
                        ->resize(500, null, function ($constraint) {
                            $constraint->aspectRatio();
                        });
                    $square->insert($img, 'center');
                    $square->save($path);

                    $university_image_model = new UniversityImage;
                    $university_image_model->university_id = $entry->id;
                    $university_image_model->image_name = $filename;

                    $university_image_model->save();

                }

            }
        }

        return redirect()
            ->route('admin.university.edit', $entry->id)
            ->with('message_type', 'success')
            ->with('message', $id > 0 ? 'Yeniləndi' : 'Əlavə edildi');
    }

    public function delete_data(Request $request)
    {
        $rows = University::find($request->input('id'));
        if ($rows->delete()) {
            echo __('admin.Data Deleted');
        }
    }

    public function mass_remove(Request $request)
    {
        $id_array = $request->input('id');
        $rows = University::whereIn('id', $id_array);
        if ($rows->delete()) {
            echo __('admin.Data Deleted');
        }
    }

    public function load_images(Request $request)
    {
        $id = $request->get('id');
        $images = UniversityImage::where('university_id', $id)->get();
        if (count($images) > 0) {
            foreach ($images as $array => $image) {
                $output = '<div class="img_border" style="position: relative; display: inline-block;">
                            <div class="preview_img" style="display: inline-block;">
                                <img src="';
                $output .= $image->image_name != null ? asset("images/university/" . $image->image_name) : asset('images/woocommerce-placeholder-300x300.png');

                $output .= '" class="thumbnail pull-left img-responsive" style="height:100px; margin-right:20px;">';
                $output .= '</div>
                            <div class="btn_close text-white" id="' . $image->id . '"
                                 style="display: inline-block; position: absolute; left: 5px; z-index: 1;">
                                <i class="fa fa-times"></i>
                            </div>
                        </div>';
                echo $output;
            }

        } else {
            echo 'Şəkil yoxdur';
        }
    }

    public function remove_image(Request $request)
    {
        $image_id = $request->get('id');
        $image_rows = UniversityImage::find($image_id);
        $image_rows->delete();
    }

}
