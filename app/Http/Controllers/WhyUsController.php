<?php

namespace App\Http\Controllers;


use App\WhyusContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class WhyUsController extends Controller
{
    public function index(){
        $this->AdminAuthCheck();
        $all_content = WhyusContent::all();
        return view('admin.why-us', compact('all_content'));
    }


    public function add_why_us_page(){
        $this->AdminAuthCheck();
        return view('admin.add-why-us-page');
    }


    public function add_why_us(Request $request){
        $all_content = WhyusContent::all();

        $newContent = new WhyusContent();
        $newContent['title'] = $request->title;
        $newContent['message'] = $request->message;
        if (!empty($newContent) && count($all_content)<3){          //index start from zero
            $newContent->save();

            Session::put('message', 'New Why us Content added Successfully.');
            return redirect('/why-us');
        }else{
            Session::put('message', 'Already Why us Content Added. [LIMIT: 3]');
            return redirect('/why-us');
        }
    }



    public function edit_whyus_content($content_id){
        $this->AdminAuthCheck();
        $single_content = WhyusContent::findOrFail($content_id);

        return view('admin.edit-whyus-content', compact('single_content'));
    }


    public function update_whyus_content(Request $request, $content_id){
        $Content = WhyusContent::findOrFail($content_id);
        $Content['title'] = $request->title;
        $Content['message'] = $request->message;
        $Content->save();

        Session::put('message', 'Why Us Content updated Successfully.');
        return redirect('/why-us');
    }


    public function delete_whyus_content($content_id){
        $content = WhyusContent::findOrFail($content_id);
        $content->delete();

        Session::put('message', 'Content Deleted Successfully.');
        return Redirect::to('/why-us');
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
