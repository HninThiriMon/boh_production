<?php

namespace App\Http\Controllers\product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Admin\Entities\Product\ElvProduct;
use Modules\Admin\Entities\Solution;
use Modules\Admin\Entities\Brand;
use Mail;

class ElvProductController extends Controller
{
    public function productsList(Request $request)
    {
        $elvProducts = ElvProduct::all();
        $elvSolutions = Solution::all();
        $brands = Brand::all();
        return view('elvProduct.product_list',compact('elvProducts','elvSolutions','brands'));
   }


   public function solutionProductSearch(Request $request)
   {
       $elvProduct = ElvProduct::where('solution_name',$request->name)->get();
       $brands = Brand::orderBy('name')->get();
       $response = [
           'elvProduct' => $elvProduct,
           'brands' => $brands,
           'solution_name' => $request->name,
       ];
       return response()->json($response);

   }

   public function solutionProductDetail(Request $request, $id)
   {
       $elvProduct = ElvProduct::where('id',$request->id)->first();
       return view('elvProduct.product_detail',compact('elvProduct'));
   }

   public function productAutocomplete(Request $request)
   {
       $elvProducts = ElvProduct::all();
       return $elvProducts;
   }

   public function productSearch(Request $request)
   {
       $ElvProducts = ElvProduct::Where('product_name', 'like',"%{$request->name}%")->take(10)->get();
       return $ElvProducts;
   }

   public function getDiscount(Request $request, $id)
   {
       $elvProduct = ElvProduct::where('id',$id)->first();
       return view('elvProduct.get_discount',compact('elvProduct'));
   }

   public function sendMessage(Request $request)
   {
   
       $this->validate($request, [
        'product' => 'required|max:500',
        'name' => 'required|max:500',
        'email' => 'required|email|max:500',
        'ph_no' => 'required|max:500',
        'city' => 'required|max:500',
        'company_name' => 'required|max:500',
        'brand' => 'required|max:500',
        'quantity' => 'required|max:500',
        'message' => 'required',
    ]);
    
    $body = array(
        "product" => $request->product,
        "name" => $request->name,
        "email" => $request->email,
        "ph_no"=> $request->ph_no,
        "city"=> $request->city,
        "company_name"=> $request->company_name,
        "brand"=> $request->brand,
        "quantity"=> $request->quantity,
        "message"=> $request->message
    );

    $full_name = $request->name;
    $to_name = "BOH Team";
    $to_email = "bohitdepartment@gmail.com";
    $data = array("name"=>$full_name,"body"=>$body);
    Mail::send('email.get_discount_mail',$data,function($message) use ($to_name,$to_email){
        $message->to($to_email)
        ->subject('Contact Letter to Team BOH');
        });
        return redirect('elv_products_list');


   }

   public function brandSearch(Request $request)
   {
       $ElvProducts = ElvProduct::Where('brand_name', 'like',"%{$request->name}%")->take(10)->get();
       return $ElvProducts;
   }

   public function brandAutocomplete(Request $request)
   {
       $brands = Brand::all();
       return $brands;
   }

   public function elvSolutionBrandFilter(Request $request)
   {

        $ElvProducts = ElvProduct::Where('solution_name', 'like',"%{$request->solutionName}%")
        ->Where('brand_name', 'like',"%{$request->brand}%")
        ->take(50)->get();

        return $ElvProducts;
   }



}
