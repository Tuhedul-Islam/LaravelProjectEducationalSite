<?php

namespace App\Http\Controllers;

use App\AboutImg;
use App\BrandIcon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AboutImageController extends Controller
{
    public function index(){
        $this->AdminAuthCheck();
        $all_img = AboutImg::all();
        return view('admin.about-image', compact('all_img'));
    }


    public function add_about_image_page(){
        $this->AdminAuthCheck();
        return view('admin.add-about-image-page');
    }


    public function add_about_image(Request $request){
        $all_aboutImg = AboutImg::first();

        if (empty($all_aboutImg)){
            $aboutImg = new AboutImg();
            $image = $request->file('image');
            if($image){
                $image_name = str_random(20);
                $ext = strtolower($image->getClientOriginalName());
                $image_full_name = $image_name.'.'.$ext;
                $upload_path = 'aboutImg/';
                $image_url = $upload_path.$image_full_name;
                $success = $image->move($upload_path, $image_full_name);
                if ($success){
                    $aboutImg['image'] = $image_url;
                    $aboutImg->save(); //DB::table('courses')->insert($data);

                    Session::put('message', 'New About Image Added Successfully');
                    return redirect('/about-image');
                }
            }
        }

        Session::put('message', 'About Image Already added. Plz Edit');
        return redirect('/about-image');
    }



    public function edit_about_image($img_id){
        $this->AdminAuthCheck();
        $all_img = AboutImg::findOrFail($img_id);
        return view('admin.edit-about-img', compact('all_img'));
    }


    public function update_about_image(Request $request, $img_id){
        $img = new AboutImg();
        $data = array();
        $image = $request->file('image');
        //Update to database & first remove then move Img from local folder
        if($image){
            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalName());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'aboutImg/';
            $image_url = $upload_path.$image_full_name;

            $row1 = AboutImg::findOrFail($img_id);
            $image_name_to_del = $row1->image;
            if (!empty($image_name_to_del)){
                if (file_exists($image_name_to_del)){
                    File::delete($image_name_to_del);
                }
            }

            //image move to local folder and save all data in database
            $success = $image->move($upload_path, $image_full_name);
            if ($success){
                $data['image'] = $image_url;
                $img->where('id', $img_id)->update($data);
                /*DB::table('tbl_products')
                    ->where('product_id', $product_id)
                    ->update($data);*/

                Session::put('message', 'Image Updated successfully');
                return redirect('/about-image');
            }
        }

        Session::put('message', 'About Section Image not Updated.');
        return redirect('/about-image');
    }


    public function delete_about_image($img_id){
        $row = AboutImg::findOrFail($img_id);
        $image_name = $row->image;

        if (!empty($image_name)){
            if (file_exists($image_name)){
                File::delete($image_name);
                $row->delete();

                Session::put('message','Image deleted Successfully');
                return Redirect::to('/about-image');
            }
            else
            {
                Session::put('message','Image not deleted !! (Image not found in the Local directory)');
                return Redirect::to('/about-image');
            }
        }else
        {
            Session::put('message','Image not deleted !! (Image not found)');
            return Redirect::to('/about-image');
        }/**/
    }


    public function AdminAuthCheck(){
        $admin_id = Session::get('admin_id');
        if ($admin_id){
            return;
        }else{
            return  redirect('/admin-login-page')->send();
        }
    }
}
