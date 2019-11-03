<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function index(){
        $this->AdminAuthCheck();
        return view('admin.dashboard');
    }


    public function admin_login_page(){
        return view('admin.admin-login-page');
    }

    public function check_login(Request $request){
        //echo "work";
        //return $request->all();

        $admin_email = $request->email;
        $admin_password = md5($request->password);

        $result = DB::table('admin')
            ->where('email', $admin_email)
            ->where('password', $admin_password)
            ->first();

        /*echo '<pre>';
        print_r($result);
        echo '</pre>';
        //return count($result);
        */

       if (!empty($result)){
           Session::put('admin_name', $result->name); // or session() global message can be used.
           Session::put('admin_id', $result->id);
           return redirect("/dashboard");
           //return Redirect::to('/dashbord');//also use
       }else{
           Session::put('message', 'Email or Password Invalid');
           return redirect('/admin-login-page');
       }


    }


    public function logout(){
        Session::flush();
        return redirect('/admin-login-page');
    }


    public function admin_profile(){
        $this->AdminAuthCheck();
        $admin_info = DB::table('admin')->first();

        return view('admin.admin-profile', compact('admin_info'));
    }


    public function edit_admin_profile($admin_id){
        $this->AdminAuthCheck();
        //return $admin_id;
        $admin_info = DB::table('admin')->first();
        return view('admin.edit-admin-profile', compact('admin_info'));
    }


    public function update_admin_profile(Request $request, $admin_id){
        $this->AdminAuthCheck();
        $row = array();
        $row['name']= $request->name;
        $row['password']= md5($request->pass);

        DB::table('admin')
            ->where('id', $admin_id)
            ->update($row);

        Session::put('msg', 'Admin Info Updated Successfully');
        return redirect('/admin-profile');
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
