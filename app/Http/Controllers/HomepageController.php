<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index(){
        $all_course = Course::where('publication_status', 1)->paginate(6);
        return view('homepage', compact('all_course'));
    }

    public function show_contactpage(){
        return view('contact');
    }
}
