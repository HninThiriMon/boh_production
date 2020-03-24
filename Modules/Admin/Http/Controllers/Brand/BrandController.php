<?php

namespace Modules\Admin\Http\Controllers\Brand;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Brand;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $brands = Brand::all();
        return view('admin::brand/index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('admin::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required|max:500',
            'description' => 'required',
             // 'brand_logo' => 'required|image|jpeg,png,jpg,gif,svg|max:2048',
            
       ]);
       if($request->hasfile('brand_logo'))
       {
      
        $dir = 'assets/img/brands';
        $brand_e = $request->file('brand_logo')->getClientOriginalName();
        $brand_logo = uniqid().'_'.time().'_'.date('Ymd').'.'.$brand_e;
        $request->file('brand_logo')->move($dir, $brand_logo);
        $Brand = new Brand();
        $Brand->name = $request->name;
        $Brand->description = $request->description;
        $Brand->brand_logo = $brand_logo;
        $Brand->save();
       }
       return redirect('boh/brand');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function editBrand(Request $request)
    {
       
        $brand = Brand::where('id',$request->id)->first();
        return $brand;
        // return view('admin::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function updateBrand(Request $request)
    {
      
        request()->validate([
            'name' => 'required|max:500',
            'description' => 'required',
             // 'brand_logo' => 'required|image|jpeg,png,jpg,gif,svg|max:2048',
       ]);
      
       if($request->hasfile('brand_logo'))
       { 
        $brand = Brand::findOrFail($request->edit_b_id);
        $dir_e = 'assets/img/brands/';
        $b_image = $dir_e . $brand->brand_logo;
        if(file_exists($b_image))
        unlink($b_image);
        $dir = 'assets/img/brands';
        $brand_e = $request->file('brand_logo')->getClientOriginalName();
        $brand_logo = uniqid().'_'.time().'_'.date('Ymd').'.'.$brand_e;
        $request->file('brand_logo')->move($dir, $brand_logo);
       
        $brand->name = $request->name;
        $brand->description = $request->description;
        $brand->brand_logo = $brand_logo;
        $brand->save();
       }

       return redirect('boh/brand');

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function deleteBrand($id)
    {
        $dir = 'assets/img/brands/';
        $brand = Brand::findOrFail($id);
        $b_image = $brand->brand_logo;
        $brand_logo = $dir . $b_image;
        if(file_exists($brand_logo))
        unlink($brand_logo);
        Brand::destroy($id);
        return redirect('boh/brand');
    }
}
