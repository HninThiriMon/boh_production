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

    Route::get('admin_layout', function () {
        return view('admin::layouts/master');
    });
    
Route::prefix('boh')->group(function() {
    // Route::get('/', 'AdminController@index');

Route::get('digital_signage','Solutions\SolutionsController@digitalSignage');
Route::post('add_solution','Solutions\SolutionsController@addSolution');
Route::get('edit_solution','Solutions\SolutionsController@editSolution');
Route::post('update_solution','Solutions\SolutionsController@updateSolution');
Route::get('delete_solution','Solutions\SolutionsController@deleteSolution');

Route::get('av_solutions','Solutions\AudioAndVisualSolutionsController@index');
Route::post('add_av_solution','Solutions\AudioAndVisualSolutionsController@addAVSolution');
Route::get('edit_av_solution','Solutions\AudioAndVisualSolutionsController@editAVSolution');
Route::post('update_av_solution','Solutions\AudioAndVisualSolutionsController@updateAVSolution');
Route::get('delete_av_solution','Solutions\AudioAndVisualSolutionsController@deleteAVSolution');

Route::get('av_projects','Projects\AudioAndVisualProjectsController@index');
Route::post('add_av_project','Projects\AudioAndVisualProjectsController@addAvProject');
Route::get('edit_av_project','Projects\AudioAndVisualProjectsController@editAvProject');
Route::post('update_av_project','Projects\AudioAndVisualProjectsController@updateAvProject');
Route::get('delete_av_project','Projects\AudioAndVisualProjectsController@deleteAvProject');

Route::get('elv_projects','Projects\ELVprojectsController@index');
Route::get('elv_get_solutions','Projects\ELVprojectsController@elvGetSolutions');
Route::post('add_elv_project','Projects\ELVprojectsController@addElvProject');
Route::get('edit_elv_project','Projects\ELVprojectsController@editElvProject');
Route::post('update_elv_project','Projects\ELVprojectsController@updateElvProject');
Route::get('delete_elv_project','Projects\ELVprojectsController@deleteElvProject');

Route::get('av_products','Products\AudioAndVisualProductsController@index');
Route::post('add_av_product','Products\AudioAndVisualProductsController@addAVproducts');
Route::get('edit_av_product','Products\AudioAndVisualProductsController@editAvProduct');
Route::post('update_av_product','Products\AudioAndVisualProductsController@updateAvProduct');
Route::get('delete_av_product','Products\AudioAndVisualProductsController@deleteAvProduct');

Route::get('elv_products','Products\ELVproductsController@index');
Route::post('add_elv_product','Products\ELVproductsController@addELVproducts');
Route::get('edit_elv_product','Products\ELVproductsController@editElvProduct');
Route::post('update_elv_product','Products\ELVproductsController@updateElvProduct');
Route::get('delete_elv_product','Products\ELVproductsController@deleteElvProduct');

Route::get('brand','Brand\BrandController@index');
Route::post('add_brand','Brand\BrandController@store');
Route::get('edit_brand','Brand\BrandController@editBrand');
Route::post('update_brand','Brand\BrandController@updateBrand');
Route::get('delete_brand/{id}','Brand\BrandController@deleteBrand');

Route::get('home','Home\HomeController@adminHome');
Route::post('update_home_cover','Home\HomeController@updateHomeCover');
Route::post('update_design_s_p','Home\HomeController@updateDesignSP');
Route::post('update_supply_s_p','Home\HomeController@updateSupplySP');
Route::post('update_install_s_p','Home\HomeController@updateInstallSP');
Route::post('update_maintain_s_p','Home\HomeController@updateMaintainSP');



Route::get('admin_login','AdminController@adminLogin');
Route::post('admin_login','AdminController@login');




});


Route::get('/home', 'AdminController@adminHome')->name('admin.home')->middleware('is_admin');
