<?php

namespace App\Http\Controllers;

use App\AboutContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AboutContentController extends Controller
{
    public function index(){
        $this->AdminAuthCheck();
        $all_content = AboutContent::all();

        return view('admin.about-content', compact('all_content'));
    }


    public function add_content_page(){
        $this->AdminAuthCheck();
        return view('admin.add-content-page');
    }

    public function add_content(Request $request){
        $all_content = AboutContent::all();

        $newContent = new AboutContent();
        $newContent['title'] = $request->title;
        $newContent['body'] = $request->body;
        if (!empty($newContent) && count($all_content)<3){          //index start from zero
            $newContent->save();

            Session::put('message', 'New Content added Successfully.');
            return redirect('/about-content');
        }else{
            Session::put('message', 'New Content not added. [LIMIT : 3]');
            return redirect('/about-content');
        }
    }



    public function edit_content($content_id){
        $this->AdminAuthCheck();
        $single_content = AboutContent::findOrFail($content_id);
        //return $single_course;

        return view('admin.edit-content', compact('single_content'));
    }



    public function update_content(Request $request, $content_id){
        $Content = AboutContent::findOrFail($content_id);
        $Content['title'] = $request->title;
        $Content['body'] = $request->body;
        $Content->save();

        Session::put('message', 'Content updated Successfully.');
        return redirect('/about-content');
    }


    public function delete_content($content_id){
        $content = AboutContent::findOrFail($content_id);
        $content->delete();

        Session::put('message', 'Content Deleted Successfully.');
        return Redirect::to('/about-content');
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
