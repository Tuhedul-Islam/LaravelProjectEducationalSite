<?php

namespace App\Http\Controllers;

use App\Course;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CourseController extends Controller
{
    public function index(){
        $this->AdminAuthCheck();
        //echo "All Course";
        $all_course = Course::paginate(6);

        return view('admin.all-course', compact('all_course'));
    }


    public function add_course_page(){
        $this->AdminAuthCheck();
        return view('admin.add-course');
    }



    // We may use different method for active or inactive the publication status
    public function active_inactive_course($course_id, $status){
        //echo $category_id;
        $status = $status ==1 ? 0:1;
        //echo $status;

        DB::table('courses')
            ->where('id', $course_id)
            ->update(['publication_status' => $status]);
        //can use model [findORFail($category_id)]

        Session::put('message', 'Course Publication Status successfully updated');
        return redirect('/all-course');

    }



    public function add_course(Request $request){
        //return $request->all();
        $course = new Course();
        $course['course_title'] = $request->title;
        $course['course_name'] = $request->name;
        $course['course_fee'] = $request->fee;
        $course['publication_status'] = $request->status;
        $image = $request->file('image');
        //return $course;
        if ($course['publication_status'] == null){
            $course['publication_status'] = 0;
        }

        if($image){
            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalName());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'courseImg/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if ($success){
                $course['course_image'] = $image_url;
                $course->save(); //DB::table('courses')->insert($data);

                Session::put('message', 'New course added successfully');
                return redirect('/add-course-page');
            }
        }
        /**/

        Session::put('message', 'Course not added.');
        return redirect('/add-course-page');
    }



    public function edit_course($course_id){
        $this->AdminAuthCheck();
        //echo $course_id;
        $single_course = Course::findOrFail($course_id);
        //return $single_course;

        return view('admin.edit-course', compact('single_course'));
    }



    public function update_course(Request $request, $course_id){
        //echo $course_id;
        $course = new Course();
        $update_course = array();
        $update_course['course_title'] = $request->title;
        $update_course['course_name'] = $request->name;
        $update_course['course_fee'] = $request->fee;
        $update_course['publication_status'] = $request->status;
        $image = $request->file('image');

        if ($update_course['publication_status'] == null){
            $update_course['publication_status'] = 0;
        }

        //Update to database & first remove then move Img from local folder
        if($image){
            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalName());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'courseImg/';
            $image_url = $upload_path.$image_full_name;

            // img delete from local folder..........
            /*$row1 =  DB::table('courses')
                ->where('id', $course_id)
                ->first();*/
            $row1 = Course::findOrFail($course_id);
            $image_name_to_del = $row1->image;
            if (!empty($image_name_to_del)){
                if (file_exists($image_name_to_del)){
                    File::delete($image_name_to_del);
                }

            }

            //image move to local folder and save all data in database
            $success = $image->move($upload_path, $image_full_name);
            if ($success){
                $update_course['course_image'] = $image_url;
                $course->where('id', $course_id)->update($update_course);
                /*DB::table('tbl_products')
                    ->where('product_id', $product_id)
                    ->update($data);*/

                Session::put('message', 'Course Updated successfully');
                return redirect('/all-course');
            }
        }

        //update with previous image
        if (empty($image) && !empty($update_course)){
            $course->where('id', $course_id)
                          ->update(['course_name'=>$request->name, 'course_title'=>$request->title,
                          'course_fee'=>$request->fee, 'publication_status'=>$request->status == null ? 0:1]);

            Session::put('message', 'Course Updated With Previous Image');
            return redirect('/all-course');
        }

        Session::put('message', 'Course not Updated.');
        return redirect('/all-course');
    }


    public function delete_course($course_id){
        $row = Course::findOrFail($course_id);
        //return $row;

        $image_name = $row->course_image;

        if (!empty($image_name)){
            if (file_exists($image_name)){
                File::delete($image_name);
                $row->delete();

                Session::put('message','Course deleted Successfully');
                return Redirect::to('/all-course');
            }
            else
            {
                Session::put('message','Course not deleted !! (Image not found in the Local directory)');
                return Redirect::to('/all-course');
            }
        }else
        {
            Session::put('message','Course not deleted !! (Image not found)');
            return Redirect::to('/all-course');
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
