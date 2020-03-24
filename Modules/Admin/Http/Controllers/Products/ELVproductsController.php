<?php

namespace Modules\Admin\Http\Controllers\Products;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Product\ElvProduct;
use Modules\Admin\Entities\Solution;
use Modules\Admin\Entities\Brand;

class ELVproductsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $elvProducts = ElvProduct::all();
        $elvSolutionNames = Solution::all();
        $brands = Brand::all();
        return view("admin::products/elv_products", ["elvProducts" => $elvProducts,"elvSolutionNames" => $elvSolutionNames,"brands" => $brands]);
    }

    public function addELVproducts(Request $request)
    {
       
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
            $product_image->move(public_path().'/assets/img/ElvProducts', $name);  
            $data[] = $name;
        }

        $elvProduct = new ElvProduct();
        $elvProduct->solution_name = $request->solution_name;
        $elvProduct->product_name = $request->product_name;
        $elvProduct->brand_name = $request->brand_name;
        $elvProduct->price = $request->price;
        $elvProduct->specification = json_encode($request->specification);
        $elvProduct->product_images = json_encode($data);
        $elvProduct->save();
        }
        return redirect('boh/elv_products');
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
        //
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
    public function editElvProduct(Request $request)
    {
        $elvProduct = ElvProduct::where('id',$request->id)->first();
        return $elvProduct;
    }


    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function updateElvProduct(Request $request)
    {
    //  dd($request->all());
        request()->validate([
            'id' => 'required',
            'product_name' => 'required',
            'brand_name' => 'required|max:500',
            'price' => 'required|max:500',
            // 'project_image' => 'required|image|jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $dir = 'assets/img/ElvProducts';
        $elvProduct = ElvProduct::findOrFail($request->id);
        $dir_e = 'assets/img/ElvProducts/';

        $elvProduct->product_name = $request->product_name ;
        $elvProduct->brand_name = $request->brand_name ;
        $elvProduct->price = $request->price ;
        $elvProduct->specification = json_encode($request->update_specification);

        if($request->deleteImage && $request->product_images){
            $deleteImage_ar = explode(',', $request->deleteImage);
            $old_image_ar = json_decode($elvProduct->product_images);
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
            $elvProduct->product_images = json_encode($data);
    
    
        }elseif($request->deleteImage){
            // dd();
            $deleteImage_ar = explode(',', $request->deleteImage);
            $old_image_ar = json_decode($elvProduct->product_images);
            $remains = array_diff($old_image_ar,$deleteImage_ar);
            foreach($remains as $remain)
            {
                if(in_array($remain, $old_image_ar))
                {
                    $data[] = $remain;
                    $elvProduct->product_images = json_encode($data);
                }else{
                        foreach($old_image_ar as $old_image){
                            $img = $dir_e . $old_image ;
                            if(file_exists($img))
                            unlink($img);
                        }
                }
            }
                              
           
        }elseif($request->product_images){
            $old_image_arr = json_decode($elvProduct->product_images);
           
            $product_images = $request->file('product_images');
            foreach($product_images as $product_image)
            {
                $name = uniqid().'_'.time().'_'.date('Ymd').'.'.$product_image->getClientOriginalName();
                $product_image->move($dir, $name);  
                $new_image_arr[] = $name;
            }
            $data = array_merge($old_image_arr, $new_image_arr);
            $elvProduct->product_images = json_encode($data);
        }

        $elvProduct->save();
       return redirect('boh/elv_products');

    }


    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function deleteElvProduct(Request $request)
    {
        
        $id = $request->id ;
        $dir = 'assets/img/ElvProducts/';
        $elvProduct = ElvProduct::findOrFail($id);
        $product_images = json_decode($elvProduct->product_images, true);
        foreach($product_images as $product_image)
        {
            $image = $dir . $product_image;
            if(file_exists($image))
            unlink($image);
        }
        ElvProduct::destroy($id);
      

    }
}
