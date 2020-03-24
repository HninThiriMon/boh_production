<?php

namespace App\Http\Controllers\product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Admin\Entities\Product\AvProduct;
use Modules\Admin\Entities\Product\ElvProduct;
use Modules\Admin\Entities\Solution\AvSolution;
use Modules\Admin\Entities\Brand;

class AvProductController extends Controller
{
    public function productsList(Request $request)
    {
        $avProducts = AvProduct::all();
        $avSolutions = AvSolution::all();
        $brands = Brand::all();
        return view('avProduct.product-list',compact('avProducts','avSolutions','brands'));
    }

    public function solutionProductSearch(Request $request)
    {
        $avProduct = AvProduct::where('solution_name',$request->name)->get();
        $brands = Brand::orderBy('name')->get(); 
        $response = [
            'avProduct' => $avProduct,
            'brands' => $brands,
            'solution_name' => $request->name,
        ];
        return response()->json($response);
    }

    public function solutionProductDetail(Request $request, $id)
    {
        $avProduct = AvProduct::where('id',$request->id)->first();
        return view('avProduct.product_detail',compact('avProduct'));
    }

    public function productAutocomplete(Request $request)
    {
        $avProducts = AvProduct::all();
        return $avProducts;
    }

    public function productSearch(Request $request)
    {
        $AvProducts = AvProduct::Where('product_name', 'like',"%{$request->name}%")->take(10)->get();
        return $AvProducts;
    }

    public function getDiscount(Request $request, $id)
    {
        $avProduct = AvProduct::where('id',$id)->first();
        return view('avProduct.get_discount',compact('avProduct'));
    }

    public function brandSearch(Request $request)
    {
        $AvProducts = AvProduct::Where('brand_name', 'like',"%{$request->name}%")->take(50)->get();
        return $AvProducts;
    }

    public function brandAutocomplete(Request $request)
    {
        $brands = Brand::all();
        return $brands;
    }

    public function avSolutionBrandFilter(Request $request)
    {
        $AvProducts = AvProduct::Where('solution_name', 'like',"%{$request->solutionName}%")
                                ->Where('brand_name', 'like',"%{$request->brand}%")
                                ->take(50)->get();
        
        return $AvProducts;
    }

}
