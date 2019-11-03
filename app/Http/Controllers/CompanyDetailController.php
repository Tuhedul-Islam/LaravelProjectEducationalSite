<?php

namespace App\Http\Controllers;

use App\CompanyDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CompanyDetailController extends Controller
{
    public function index(){
        $this->AdminAuthCheck();
        $all_content = CompanyDetail::all();
        return view('admin.company-details', compact('all_content'));
    }

    public function add_company_details_page(){
        $this->AdminAuthCheck();
        return view('admin.add-company-details-page');
    }


    public function add_company_details(Request $request){
        $all_content = CompanyDetail::first();

        $newContent = new CompanyDetail();
        $newContent['title'] = $request->title;
        $newContent['details'] = $request->details;
        if (empty($all_content)){
            $newContent->save();

            Session::put('message', 'Company Details added Successfully.');
            return redirect('/company-detail');
        }else{
            Session::put('message', 'Already Company Details Content Added.');
            return redirect('/company-detail');
        }
    }


    public function edit_company_details($details_id){
        $this->AdminAuthCheck();
        $single_content = CompanyDetail::findOrFail($details_id);

        return view('admin.edit-company-details', compact('single_content'));
    }


    public function update_company_details(Request $request, $details_id){
        $Content = CompanyDetail::findOrFail($details_id);
        $Content['title'] = $request->title;
        $Content['details'] = $request->details;
        $Content->save();

        Session::put('message', 'Company Details updated Successfully.');
        return redirect('/company-detail');
    }


    public function delete_company_details($details_id){
        $content = CompanyDetail::findOrFail($details_id);
        $content->delete();

        Session::put('message', 'Company Details Deleted Successfully.');
        return Redirect::to('/company-detail');
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
