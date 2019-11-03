<?php

namespace App\Http\Controllers;

use App\BrandIcon;
use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class IconController extends Controller
{
    public function index(){
        $this->AdminAuthCheck();
        $all_icon = BrandIcon::all();
        //return $icon;
        return view('admin.brand-icon', compact('all_icon'));
    }


    public function add_icon_page(){
        $this->AdminAuthCheck();
        return view('admin.add-icon-page');
    }



    public function active_inactive_icon($icon_id, $status){
        $status = $status ==1 ? 0:1;
        //echo $status;

        DB::table('brand_icons')
            ->where('id', $icon_id)
            ->update(['publication_status' => $status]);
        //can use model [findORFail($category_id)]

        Session::put('message', 'Icon Publication Status successfully updated');
        return redirect('/brand-icon');
    }


    public function add_icon(Request $request){
        $all_icon = BrandIcon::first();
        if (empty($all_icon)){
            $icon = new BrandIcon();
            $icon['publication_status'] = $request->status;
            $image = $request->file('image');
            //return $course;
            if ($icon['publication_status'] == null){
                $icon['publication_status'] = 0;
            }

            if($image){
                $image_name = str_random(20);
                $ext = strtolower($image->getClientOriginalName());
                $image_full_name = $image_name.'.'.$ext;
                $upload_path = 'brandIcon/';
                $image_url = $upload_path.$image_full_name;
                $success = $image->move($upload_path, $image_full_name);
                if ($success){
                    $icon['icon'] = $image_url;
                    $icon->save(); //DB::table('courses')->insert($data);

                    Session::put('message', 'New Icon added successfully');
                    return redirect('/add-icon-page');
                }
            }
        }
        /**/

        Session::put('message', 'Already have a Icon. Plz edit');
        return redirect('/brand-icon');
    }



    public function edit_icon($icon_id){
        $this->AdminAuthCheck();
        return view('admin.edit-icon', compact('icon_id'));
    }



    public function update_icon(Request $request, $icon_id){
        $icon = new BrandIcon();
        $update_icon = array();
        $update_icon['publication_status'] = $request->status;
        $image = $request->file('image');

        if ($update_icon['publication_status'] == null){
            $update_icon['publication_status'] = 0;
        }

        //Update to database & first remove then move Img from local folder
        if($image){
            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalName());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'brandIcon/';
            $image_url = $upload_path.$image_full_name;

            $row1 = BrandIcon::findOrFail($icon_id);
            $image_name_to_del = $row1->icon;
            if (!empty($image_name_to_del)){
                if (file_exists($image_name_to_del)){
                    File::delete($image_name_to_del);
                }
            }

            //image move to local folder and save all data in database
            $success = $image->move($upload_path, $image_full_name);
            if ($success){
                $update_icon['icon'] = $image_url;
                $icon->where('id', $icon_id)->update($update_icon);
                /*DB::table('tbl_products')
                    ->where('product_id', $product_id)
                    ->update($data);*/

                Session::put('message', 'Icon Updated successfully');
                return redirect('/brand-icon');
            }
        }

        Session::put('message', 'Icon not Updated.');
        return redirect('/brand-icon');
    }



    public function delete_icon($icon_id){
        $row = BrandIcon::findOrFail($icon_id);
        //return $row;
        $image_name = $row->icon;

        if (!empty($image_name)){
            if (file_exists($image_name)){
                File::delete($image_name);
                $row->delete();

                Session::put('message','Icon deleted Successfully');
                return Redirect::to('/brand-icon');
            }
            else
            {
                Session::put('message','Icon not deleted !! (Image not found in the Local directory)');
                return Redirect::to('/brand-icon');
            }
        }else
        {
            Session::put('message','icon not deleted !! (Image not found)');
            return Redirect::to('/brand-icon');
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
