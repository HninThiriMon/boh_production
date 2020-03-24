<?php

namespace Modules\Admin\Http\Controllers\Products;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Product\AvProduct;
use Modules\Admin\Entities\Product\ElvProduct;
use Modules\Admin\Entities\Solution\AvSolution;
use Modules\Admin\Entities\Brand;

class AudioAndVisualProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $avProducts = AvProduct::all();
        $avSolutionNames = AvSolution::all();
        $brands = Brand::all();
        return view("admin::products/av_products", ["avProducts" => $avProducts,"avSolutionNames" => $avSolutionNames,"brands" => $brands]);
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
    public function addAVproducts(Request $request)
    {
        // dd($request->all());
        request()->validate([
            'solution_name' => 'required',
            'product_name' => 'required|max:500',
            'brand_name' => 'required|max:500',
            'price' => 'required|max:500',
            'specification' => 'required|max:500',
            // 'product_images' => 'required|image|jpeg,png,jpg,gif,svg|max:2048',
       ]);
    //    $AvSolution = AvSolution::where('id',$request->solution_name)->first();
       if($request->file('product_images'))
       {        
        $product_images = $request->file('product_images');
        foreach($product_images as $product_image)
        {
            $name = uniqid().'_'.date('Ymd').'.'.$product_image->getClientOriginalName();
            $product_image->move(public_path().'/assets/img/AvProducts', $name);  
            $data[] = $name;
        }

        $avProduct = new AvProduct();
        $avProduct->solution_name = $request->solution_name;
        $avProduct->product_name = $request->product_name;
        $avProduct->brand_name = $request->brand_name;
        $avProduct->price = $request->price;
        $avProduct->specification = json_encode($request->specification);
        $avProduct->product_images = json_encode($data);
        $avProduct->save();
        }else{
            dd("No");
        }
        return redirect('boh/av_products');
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
    public function editAvProduct(Request $request)
    {
        $avProduct = AvProduct::where('id',$request->id)->first();
        return $avProduct;
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function updateAvProduct(Request $request)
    {
    //  dd($request->all());
        request()->validate([
            'id' => 'required',
            'product_name' => 'required',
            'brand_name' => 'required|max:500',
            'price' => 'required|max:500',
            // 'project_image' => 'required|image|jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $dir = 'assets/img/AvProducts';
        $avProduct = AvProduct::findOrFail($request->id);
        $dir_e = 'assets/img/AvProducts/';

        $avProduct->product_name = $request->product_name ;
        $avProduct->brand_name = $request->brand_name ;
        $avProduct->price = $request->price ;
        $avProduct->specification = json_encode($request->update_specification);

        if($request->deleteImage && $request->product_images){
            $deleteImage_ar = explode(',', $request->deleteImage);
            $old_image_ar = json_decode($avProduct->product_images);
            $remains = array_diff($old_image_ar,$deleteImage_ar);
            
                foreach($remains as $remain)
                {
                    if(in_array($remain, $old_image_ar))
                    {
                        $old_image_arr[] = $remain;
                      
                    }else{
    
                        foreach($old_image_ar as $old_image){
                            $img = $dir_e . $old_image ;
                            if(file_exists($img))
                            unlink($img);
                        }
                        
                    }
                }
            
            $product_images = $request->file('product_images');
            foreach($product_images as $product_image)
            {
                $name = uniqid().'_'.time().'_'.date('Ymd').'.'.$product_image->getClientOriginalName();
                $product_image->move($dir, $name);  
                $new_image_arr[] = $name;
            }
            $data = array_merge($old_image_arr, $new_image_arr);
            $avProduct->product_images = json_encode($data);
    
    
        }elseif($request->deleteImage){
            // dd();
            $deleteImage_ar = explode(',', $request->deleteImage);
            $old_image_ar = json_decode($avProduct->product_images);
            $remains = array_diff($old_image_ar,$deleteImage_ar);
            foreach($remains as $remain)
            {
                if(in_array($remain, $old_image_ar))
                {
                    $data[] = $remain;
                    $avProduct->product_images = json_encode($data);
                }else{
                        foreach($old_image_ar as $old_image){
                            $img = $dir_e . $old_image ;
                            if(file_exists($img))
                            unlink($img);
                        }
                }
            }
                              
           
        }elseif($request->product_images){
            $old_image_arr = json_decode($avProduct->product_images);
           
            $product_images = $request->file('product_images');
            foreach($product_images as $product_image)
            {
                $name = uniqid().'_'.time().'_'.date('Ymd').'.'.$product_image->getClientOriginalName();
                $product_image->move($dir, $name);  
                $new_image_arr[] = $name;
            }
            $data = array_merge($old_image_arr, $new_image_arr);
            $avProduct->product_images = json_encode($data);
        }

        $avProduct->save();
       return redirect('boh/av_products');

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
   
    public function deleteAvProduct(Request $request)
    {
        
        $id = $request->id ;
        $dir = 'assets/img/AvProducts/';
        $avProduct = AvProduct::findOrFail($id);
        $product_images = json_decode($avProduct->product_images, true);
        foreach($product_images as $product_image)
        {
            $image = $dir . $product_image;
            if(file_exists($image))
            unlink($image);
        }
        AvProduct::destroy($id);
      

    }

}
