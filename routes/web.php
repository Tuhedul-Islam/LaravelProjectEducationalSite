<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middladmin-profileeware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;

//homepage related route
Route::get('/', 'HomepageController@index');
Route::get('/contact-us', 'HomepageController@show_contactpage')->name('contact');


//admin related route
Route::get('/dashboard', 'AdminController@index');
Route::get('/admin-login-page', 'AdminController@admin_login_page');
Route::post('/check-login', 'AdminController@check_login')->name('login');
Route::get('/logout', 'AdminController@logout')->name('logout');
//Admin Profile Related Route
Route::get('/admin-profile', 'AdminController@admin_profile')->name('admin-profile');
Route::get('/edit-admin-profile/{admin_id}', 'AdminController@edit_admin_profile')->name('edit-admin-profile');
Route::post('/update-admin-profile/{admin_id}', 'AdminController@update_admin_profile')->name('update-admin-profile');


//Course related route
Route::get('/all-course', 'CourseController@index')->name('all-course');
Route::get('/add-course-page', 'CourseController@add_course_page')->name('add-course-page');
Route::post('/add-course', 'CourseController@add_course')->name('add-course');
Route::get('/edit-course/{course_id}', 'CourseController@edit_course')->name('edit-course');
Route::post('/update-course/{course_id}', 'CourseController@update_course')->name('update-course');
Route::get('/active-inactive-course/{course_id}/{status}', 'CourseController@active_inactive_course');
Route::get('/delete-course/{course_id}', 'CourseController@delete_course');


//Icon Related Route
Route::get('/brand-icon', 'Iconcontroller@index')->name('brand-icon');
Route::get('/add-icon-page', 'Iconcontroller@add_icon_page')->name('add-icon-page');
Route::post('/add-icon', 'Iconcontroller@add_icon')->name('add-icon');
Route::get('/edit-icon/{icon_id}', 'Iconcontroller@edit_icon')->name('edit-icon');
Route::post('/update-icon/{icon_id}', 'Iconcontroller@update_icon')->name('update-icon');
Route::get('/active-inactive-icon/{icon_id}/{status}', 'Iconcontroller@active_inactive_icon');
Route::get('/delete-icon/{icon_id}', 'Iconcontroller@delete_icon');


//Cover image Related Route
Route::get('/cover-img-msg', 'CoverImgController@index')->name('cover-img-msg');
Route::get('/add-coverimg-msg-page', 'CoverImgController@add_coverimg_msg_page')->name('add-coverimg-msg-page');
Route::post('/add-coverimg-msg', 'CoverImgController@add_coverimg_msg')->name('add-coverimg-msg');
Route::get('/edit-coverimg-msg/{coverImg_id}', 'CoverImgController@edit_coverimg_msg')->name('edit-coverimg-msg');
Route::post('/update-coverimg-msg/{coverImg_id}', 'CoverImgController@update_coverimg_msg')->name('update-coverimg-msg');
Route::get('/delete-coverimg-msg/{coverImg_id}', 'CoverImgController@delete_coverimg_msg')->name('delete-coverimg-msg');


//About Content Related Route
Route::get('/about-content', 'AboutContentController@index')->name('about-content');
Route::get('/add-content-page', 'AboutContentController@add_content_page')->name('add-content-page');
Route::post('/add-content', 'AboutContentController@add_content')->name('add-content');
Route::get('/edit-content/{content_id}', 'AboutContentController@edit_content')->name('edit-content');
Route::post('/update-content/{content_id}', 'AboutContentController@update_content')->name('update-content');
Route::get('/delete-content/{content_id}', 'AboutContentController@delete_content')->name('delete-content');


//About Image Related Route
Route::get('/about-image', 'AboutImageController@index')->name('about-image');
Route::get('/add-about-image-page', 'AboutImageController@add_about_image_page')->name('add-about-image-page');
Route::post('/add-about-image', 'AboutImageController@add_about_image')->name('add-about-image');
Route::get('/edit-about-image/{img_id}', 'AboutImageController@edit_about_image')->name('edit-about-image');
Route::post('/update-about-image/{img_id}', 'AboutImageController@update_about_image')->name('update-about-image');
Route::get('/delete-about-image/{img_id}', 'AboutImageController@delete_about_image')->name('delete-about-image');


//Why Us Content Related Route
Route::get('/why-us', 'WhyUsController@index')->name('why-us');
Route::get('/add-why-us-page', 'WhyUsController@add_why_us_page')->name('add-why-us-page');
Route::post('/add-why-us', 'WhyUsController@add_why_us')->name('add-why-us');
Route::get('/edit-whyus-content/{content_id}', 'WhyUsController@edit_whyus_content')->name('edit-whyus-content');
Route::post('/update-whyus-content/{content_id}', 'WhyUsController@update_whyus_content')->name('update-whyus-content');
Route::get('/delete-whyus-content/{content_id}', 'WhyUsController@delete_whyus_content')->name('delete-whyus-content');


//Company details Related Route
Route::get('/company-detail', 'CompanyDetailController@index')->name('company-detail');
Route::get('/add-company-details-page', 'CompanyDetailController@add_company_details_page')->name('add-company-details-page');
Route::post('/add-company-details', 'CompanyDetailController@add_company_details')->name('add-company-details');
Route::get('/edit-company-details/{details_id}', 'CompanyDetailController@edit_company_details')->name('edit-company-details');
Route::post('/update-company-details/{details_id}', 'CompanyDetailController@update_company_details')->name('update-company-details');
Route::get('/delete-company-details/{details_id}', 'CompanyDetailController@delete_company_details')->name('delete-company-details');
