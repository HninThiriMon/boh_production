<?php

namespace Modules\Admin\Http\Controllers\solutions;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Solution;

class SolutionsController extends Controller
{
    
    public function addSolution(Request $request)
    {
      
            request()->validate([
            'name' => 'required|max:500',
            'description' => 'required',
            // 'cover_image' => 'required|image|jpeg,png,jpg,gif,svg|max:2048',
            // 'main_image' => 'required|image|jpeg,png,jpg,gif,svg|max:2048',
            // 'image_1' => 'required|image|jpeg,png,jpg,gif,svg|max:2048',
            // 'image_2' => 'required|image|jpeg,png,jpg,gif,svg|max:2048',
            // 'image_3' => 'required|image|jpeg,png,jpg,gif,svg|max:2048',
            // 'image_4' => 'required|image|jpeg,png,jpg,gif,svg|max:2048',
       ]);
        if($request->hasfile('cover_image') && $request->hasfile('main_image') && $request->hasfile('image_1') && $request->hasfile('image_2') && $request->hasfile('image_3') && $request->hasfile('image_4'))
       {
        $dir = 'assets/img/solutions';
        $c_image_e = $request->file('cover_image')->getClientOriginalName();
        $cover_image = uniqid().'_'.time().'_'.date('Ymd').'.'.$c_image_e;
        $m_image_e = $request->file('main_image')->getClientOriginalName();
        $main_image = uniqid().'_'.time().'_'.date('Ymd').'.'.$m_image_e;
        $image1_e = $request->file('image_1')->getClientOriginalName();
        $image_1 = uniqid().'_'.time().'_'.date('Ymd').'.'.$image1_e;
        $image2_e = $request->file('image_2')->getClientOriginalName();
        $image_2 = uniqid().'_'.time().'_'.date('Ymd').'.'.$image2_e;
        $image3_e = $request->file('image_3')->getClientOriginalName();
        $image_3 = uniqid().'_'.time().'_'.date('Ymd').'.'.$image3_e;
        $image4_e = $request->file('image_4')->getClientOriginalName();
        $image_4 = uniqid().'_'.time().'_'.date('Ymd').'.'.$image4_e;
        $request->file('cover_image')->move($dir, $cover_image);
        $request->file('main_image')->move($dir, $main_image);
        $request->file('image_1')->move($dir, $image_1);
        $request->file('image_2')->move($dir, $image_2);
        $request->file('image_3')->move($dir, $image_3);
        $request->file('image_4')->move($dir, $image_4);
        $solution = new Solution();
        $solution->name = $request->name;
        $solution->description = $request->description;
        $solution->list = json_encode($request->list);
        $solution->cover_image = $cover_image ;
        $solution->main_image = $main_image ;
        $solution->image_1 = $image_1 ;
        $solution->image_2 = $image_2 ;
        $solution->image_3 = $image_3 ;
        $solution->image_4 = $image_4 ;
        $solution->save();
       }
       
       return redirect('boh/digital_signage');
   
    }

    public function digitalSignage()
    {
        $solutions = Solution::all();
        return view("admin::solutions/digital_signage", ["solutions" => $solutions]);
    }
   
    public function editSolution(Request $request)
    {
        $solutions = Solution::where('id',$request->id)->first();
        return $solutions;
    }

    public function updateSolution(Request $request)
    {
      
        request()->validate([
            'name' => 'required|max:500',
            'description' => 'required',
            // 'cover_image' => 'required|image|jpeg,png,jpg,gif,svg|max:2048',
            // 'main_image' => 'required|image|jpeg,png,jpg,gif,svg|max:2048',
            // 'image_1' => 'required|image|jpeg,png,jpg,gif,svg|max:2048',
            // 'image_2' => 'required|image|jpeg,png,jpg,gif,svg|max:2048',
            // 'image_3' => 'required|image|jpeg,png,jpg,gif,svg|max:2048',
            // 'image_4' => 'required|image|jpeg,png,jpg,gif,svg|max:2048',
       ]);
       
        $dir = 'assets/img/solutions';
        $solution = Solution::findOrFail($request->id);
        $dir_e = 'assets/img/solutions/';
        $solution->name = $request->name ;
        $solution->description = $request->description ;
        $solution->list = json_encode($request->update_list);

        if($request->hasfile('cover_image')){
            $c_image = $dir_e . $solution->cover_image ;
            if(file_exists($c_image))
            unlink($c_image);
            $c_image_e = $request->file('cover_image')->getClientOriginalName();
            $cover_image = uniqid().'_'.time().'_'.date('Ymd').'.'.$c_image_e;
            $request->file('cover_image')->move($dir, $cover_image);
            $solution->cover_image = $cover_image ;
        }

        if($request->hasfile('main_image')){
            $m_image = $dir_e . $solution->main_image ;
            if(file_exists($m_image))
            unlink($m_image);
            $m_image_e = $request->file('main_image')->getClientOriginalName();
            $main_image = uniqid().'_'.time().'_'.date('Ymd').'.'.$m_image_e;
            $request->file('main_image')->move($dir, $main_image);
            $solution->main_image = $main_image ;
        }

        if($request->hasfile('image_1')){
            $img_1 = $dir_e . $solution->image_1 ;
            if(file_exists($img_1))
            unlink($img_1);
            $image1_e = $request->file('image_1')->getClientOriginalName();
            $image_1 = uniqid().'_'.time().'_'.date('Ymd').'.'.$image1_e;
            $request->file('image_1')->move($dir, $image_1);
            $solution->image_1 = $image_1 ;
        }

        if($request->hasfile('image_2')){
            $img_2 = $dir_e . $solution->image_2 ;
            if(file_exists($img_2))
            unlink($img_2);
            $image2_e = $request->file('image_2')->getClientOriginalName();
            $image_2 = uniqid().'_'.time().'_'.date('Ymd').'.'.$image2_e;
            $request->file('image_2')->move($dir, $image_2);
            $solution->image_2 = $image_2 ;
        }

        if($request->hasfile('image_3')){
            $img_3 = $dir_e . $solution->image_3 ;
            if(file_exists($img_3))
            unlink($img_3);
            $image3_e = $request->file('image_3')->getClientOriginalName();
            $image_3 = uniqid().'_'.time().'_'.date('Ymd').'.'.$image3_e;
            $request->file('image_3')->move($dir, $image_3);
            $solution->image_3 = $image_3 ;
        }

        if($request->hasfile('image_4')){
            $img_4 = $dir_e . $solution->image_4 ;
            if(file_exists($img_4))
            unlink($img_4);
            $image4_e = $request->file('image_4')->getClientOriginalName();
            $image_4 = uniqid().'_'.time().'_'.date('Ymd').'.'.$image4_e;
            $request->file('image_4')->move($dir, $image_4);
            $solution->image_4 = $image_4 ;
        }
           $solution->save();
           return redirect('boh/digital_signage');
    }

    public function deleteSolution(Request $request)
    {
        $id = $request->id;
        $dir = 'assets/img/solutions/';
        $solution = Solution::findOrFail($id);
        $c_image = $solution->cover_image;
        $m_image = $solution->main_image;
        $img_1 = $solution->image_1;
        $img_2 = $solution->image_2;
        $img_3 = $solution->image_3;
        $img_4 = $solution->image_4;
        $cover_image = $dir . $c_image ;
        $main_image = $dir . $m_image ;
        $image_1 = $dir . $img_1 ;
        $image_2 = $dir . $img_2 ;
        $image_3 = $dir . $img_3 ;
        $image_4 = $dir . $img_4 ;
        if(file_exists($cover_image))
            unlink($cover_image);
        if(file_exists($main_image))
            unlink($main_image);
        if(file_exists($image_1))
            unlink($image_1);
        if(file_exists($image_2))
            unlink($image_2);
        if(file_exists($image_3))
            unlink($image_3);
        if(file_exists($image_4))
            unlink($image_4);
        Solution::destroy($id);
    }

}
