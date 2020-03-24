<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Route::get('email', function () {
  
//     $to_name = "boh";
//     $to_email = "bohitdepartment@gmail.com";
//     $data = array("name"=>"boh name","body"=>"Test mail");
//     Mail::send('email.get_discount_mail',$data,function($message) use ($to_name,$to_email){
//         $message->to($to_email)
//             ->subject('laravel mail subject');
        
//     });

// });


Route::post('email_send', 'ContactController@store');

Route::get('master', function () {
    return view('layouts/master');
});

// Route::get('/', 'DashboardController@dashboard');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('design', 'ServiceController@design');
Route::get('supply', 'ServiceController@supply');
Route::get('install', 'ServiceController@install');
Route::get('maintain', 'ServiceController@maintain');

Route::get('brand', 'DashboardController@brand');
Route::get('/', 'DashboardController@index');
Route::get('our_company', 'DashboardController@ourCompany');
Route::get('About_us', 'DashboardController@contactUs');
Route::get('About_company', 'DashboardController@company');
Route::get('clients', 'DashboardController@clients');

Route::get('solutions', 'SolutionController@solutions');
Route::get('av', 'SolutionController@av');
Route::get('solution/{id}', 'SolutionController@digitalSignage');
Route::get('each_av_solution/{id}', 'solution\AvSolutionsController@eachAvSolution');

Route::get('projects_list', 'ProjectController@projectsList');
Route::get('each_elv_project/{id}', 'ProjectController@eachElvProject');
Route::get('each_av_project/{id}', 'ProjectController@eachAvProject');

Route::get('audio_visual_pj','ProjectController@audioAndVisual');
Route::get('elv_pj', 'ProjectController@eLV');

Route::get('av_products_list','product\AvProductController@productsList');
Route::post('av_solution_product_search','product\AvProductController@solutionProductSearch');
Route::get('av_solution_product_detail/{id}','product\AvProductController@solutionProductDetail');
Route::get('av_product_autocomplete','product\AvProductController@productAutocomplete');
Route::post('av_product_search','product\AvProductController@productSearch');
Route::post('av_brand_search','product\AvProductController@brandSearch');
Route::get('av_brand_autocomplete','product\AvProductController@brandAutocomplete');
Route::get('get_av_discount/{id}','product\AvProductController@getDiscount');
Route::post('av_solution_brand_filter','product\AvProductController@avSolutionBrandFilter');


Route::get('elv_products_list','product\ElvProductController@productsList');
Route::post('elv_solution_product_search','product\ElvProductController@solutionProductSearch');
Route::get('elv_solution_product_detail/{id}','product\ElvProductController@solutionProductDetail');
Route::get('elv_product_autocomplete','product\ElvProductController@productAutocomplete');
Route::post('elv_product_search','product\ElvProductController@productSearch');
Route::post('elv_brand_search','product\ElvProductController@brandSearch');
Route::get('elv_brand_autocomplete','product\ElvProductController@brandAutocomplete');
Route::get('get_discount/{id}','product\ElvProductController@getDiscount');
Route::post('get_discount','product\ElvProductController@sendMessage');
Route::post('elv_solution_brand_filter','product\ElvProductController@elvSolutionBrandFilter');






Route::get('test', function () {
    return view('test');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('admin/home', 'HomeController@adminHome')->name('admin.home')->middleware('is_admin');