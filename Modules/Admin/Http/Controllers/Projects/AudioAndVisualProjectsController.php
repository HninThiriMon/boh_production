<?php

namespace Modules\Admin\Http\Controllers\Projects;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Project\AvProject;
use Modules\Admin\Entities\Solution\AvSolution;

class AudioAndVisualProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $avProjects = AvProject::all();
        $avSolutionNames = AvSolution::all();
        return view("admin::projects/av_projects", ["avProjects" => $avProjects,"avSolutionNames" => $avSolutionNames]);
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
    public function editAvProject(Request $request)
    {
        $avProject = AvProject::where('id',$request->id)->first();
        return $avProject;

        // return view('admin::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function updateAvProject(Request $request)
    {
            request()->validate([
            'project_name' => 'required',
            'description' => 'required',
            'company_name' => 'required|max:500',
            // 'solution_name' => 'required|max:500',
            'awarded_month' => 'required|max:500',
            'awarded_year' => 'required|max:500',
            'city' => 'required|max:500',
            // 'project_image' => 'required|image|jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
    $dir = 'assets/img/AvProjects';
    $avProject = AvProject::findOrFail($request->id);
    $dir_e = 'assets/img/AvProjects/';
   
    $avProject->project_name = $request->project_name ;
    $avProject->company_name = $request->company_name ;
    $avProject->description = $request->description ;
    $avProject->city = $request->city ;
    $avProject->awarded_month = $request->awarded_month ;
    $avProject->awarded_year = $request->awarded_year ;
    
    if($request->deleteImage && $request->project_image){
        $deleteImage_ar = explode(',', $request->deleteImage);
        $old_image_ar = json_decode($avProject->project_images);
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
        
        $project_images = $request->file('project_image');
        foreach($project_images as $project_image)
        {
            $name = uniqid().'_'.time().'_'.date('Ymd').'.'.$project_image->getClientOriginalName();
            $project_image->move($dir, $name);  
            $new_image_arr[] = $name;
        }
        $data = array_merge($old_image_arr, $new_image_arr);
        $avProject->project_images = json_encode($data);


    }elseif($request->deleteImage){
        $deleteImage_ar = explode(',', $request->deleteImage);
        $old_image_ar = json_decode($avProject->project_images);
        $remains = array_diff($old_image_ar,$deleteImage_ar);
        foreach($remains as $remain)
        {
            if(in_array($remain, $old_image_ar))
            {
                $data[] = $remain;
                $avProject->project_images = json_encode($data);
            }else{
                    foreach($old_image_ar as $old_image){
                        $img = $dir_e . $old_image ;
                        if(file_exists($img))
                        unlink($img);
                    }
            }
        }
                          
       
    }elseif($request->project_image){
        $old_image_arr = json_decode($avProject->project_images);
       
        $project_images = $request->file('project_image');
        foreach($project_images as $project_image)
        {
            $name = uniqid().'_'.time().'_'.date('Ymd').'.'.$project_image->getClientOriginalName();
            $project_image->move($dir, $name);  
            $new_image_arr[] = $name;
        }
        $data = array_merge($old_image_arr, $new_image_arr);
        $avProject->project_images = json_encode($data);
    }
        $avProject->save();
        return redirect('boh/av_projects');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function deleteAvProject(Request $request)
    {
        $id = $request->id ;
        $dir = 'assets/img/AvProjects/';
        $avProject = AvProject::findOrFail($id);
        $project_images = json_decode($avProject->project_images, true);
        foreach($project_images as $project_image)
        {
            $project_image = $dir . $project_image;
            if(file_exists($project_image))
            unlink($project_image);
        }
        AvProject::destroy($id);
        return redirect('boh/av_projects');

    }

    public function addAvProject(Request $request)
    {
        // dd($request->all());
        request()->validate([
            'project_name' => 'required',
            'description' => 'required',
            'company_name' => 'required|max:500',
            'solution_name' => 'required|max:500',
            'awarded_month' => 'required|max:500',
            'awarded_year' => 'required|max:500',
            'city' => 'required|max:500',
            // 'cover_image' => 'required|image|jpeg,png,jpg,gif,svg|max:2048',
       ]);
       $AvSolution = AvSolution::where('id',$request->solution_name)->first();

       $avProject = new AvProject();
       $avProject->project_name= $request->project_name;
       $avProject->description = $request->description;
       $avProject->company_name = $request->company_name;
       $avProject->solution_name = $AvSolution->name;
       $avProject->awarded_month = $request->awarded_month;
       $avProject->awarded_year = $request->awarded_year;
       $avProject->city = $request->city;
       $avProject->cover_image = $AvSolution->cover_image;

       if($request->file('project_image'))
       {        
        $project_images = $request->file('project_image');
        foreach($project_images as $project_image)
        {
            $name = time().'.'.$project_image->getClientOriginalName();
            $project_image->move(public_path().'/assets/img/AvProjects', $name);  
            $data[] = $name;
        }
        $avProject->project_images = json_encode($data);
       }
      $avProject->save();
      return redirect('boh/av_projects');

    }


}
