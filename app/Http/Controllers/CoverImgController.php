<?php

namespace App\Http\Controllers;

use App\Course;
use App\CoverImg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CoverImgController extends Controller
{
    public function index(){
        $this->AdminAuthCheck();
        $all_coverImgMsg = CoverImg::all();
        return view('admin.cover-img-msg', compact('all_coverImgMsg'));
    }


    public function add_coverimg_msg_page(){
        $this->AdminAuthCheck();
        return view('admin.add-coverimg-msg-page');
    }


    public function add_coverimg_msg(Request $request){
        $all_coverImg = CoverImg::first();
        if (empty($all_coverImg)){
            $coverImgMsg = new CoverImg();
            $coverImgMsg['title'] = $request->title;
            $coverImgMsg['body'] = $request->message;
            $coverImgMsg['btnText'] = $request->btnText;
            $image = $request->file('coverImg');
            //return $data;

            if($image){
                $image_name = str_random(20);
                $ext = strtolower($image->getClientOriginalName());
                $image_full_name = $image_name.'.'.$ext;
                $upload_path = 'coverImg/';
                $image_url = $upload_path.$image_full_name;
                $success = $image->move($upload_path, $image_full_name);
                if ($success){
                    $coverImgMsg['coverImg'] = $image_url;
                    $coverImgMsg->save(); //DB::table('courses')->insert($data);

                    Session::put('message', 'New Cover Image And Message Added Successfully');
                    return redirect('/cover-img-msg');
                }
            }
        }

        Session::put('message', 'Cover Image And Message Already added. Plz Edit');
        return redirect('/cover-img-msg');

    }



    public function edit_coverimg_msg($coverImg_id){
        $this->AdminAuthCheck();
        $all_coverImg = CoverImg::findOrFail($coverImg_id);
        return view('admin.edit-cover-img-msg', compact('all_coverImg'));
    }




    public function update_coverimg_msg(Request $request, $coverImg_id){
        //echo $course_id;
        $coverImg = new CoverImg();
        $data = array();
        $data['title'] = $request->title;
        $data['body'] = $request->body;
        $data['btnText'] = $request->btnText;
        $image = $request->file('coverImg');


        //Update to database & first remove then move Img from local folder
        if($image){
            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalName());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'coverImg/';
            $image_url = $upload_path.$image_full_name;

            // img delete from local folder..........
            /*$row1 =  DB::table('courses')
                ->where('id', $course_id)
                ->first();*/
            $row1 = CoverImg::findOrFail($coverImg_id);
            $image_name_to_del = $row1->coverImg;
            if (!empty($image_name_to_del)){
                if (file_exists($image_name_to_del)){
                    File::delete($image_name_to_del);
                }
            }

            //image move to local folder and save all data in database
            $success = $image->move($upload_path, $image_full_name);
            if ($success){
                $data['coverImg'] = $image_url;
                $coverImg->where('id', $coverImg_id)->update($data);
                /*DB::table('tbl_products')
                    ->where('product_id', $product_id)
                    ->update($data);*/

                Session::put('message', 'Cover Image and Message Updated successfully');
                return redirect('/cover-img-msg');
            }
        }

        //update with previous image
        if (empty($image) && !empty($data)){
            $coverImg->where('id', $coverImg_id)
                     ->update(['title'=>$request->title, 'body'=>$request->body,
                               'btnText'=>$request->btnText]);

            Session::put('message', 'Cover Message Updated With Previous Image');
            return redirect('/cover-img-msg');
        }

        Session::put('message', 'Cover image & Message not Updated.');
        return redirect('/cover-img-msg');
    }



    public function delete_coverimg_msg($coverImg_id){
        $row = CoverImg::findOrFail($coverImg_id);
        //return $row;
        $image_name = $row->coverImg;

        if (!empty($image_name)){
            if (file_exists($image_name)){
                File::delete($image_name);
                $row->delete();

                Session::put('message','Cover Image & Message deleted Successfully');
                return Redirect::to('/cover-img-msg');
            }
            else
            {
                Session::put('message','Cover Image & Message not deleted !! (Image not found in the Local directory)');
                return Redirect::to('/cover-img-msg');
            }
        }else
        {
            Session::put('message','Cover Image & Message not deleted !! (Image not found)');
            return Redirect::to('/cover-img-msg');
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
