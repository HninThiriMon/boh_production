<?php

namespace Modules\Admin\Http\Controllers\Projects;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Project\ElvProject;
use Modules\Admin\Entities\Solution;

class ELVprojectsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $elvProjects = ElvProject::all();
        $elvSolutionNames = Solution::all();
        return view("admin::projects/elv_projects", ["elvProjects" => $elvProjects,"elvSolutionNames" => $elvSolutionNames ]);
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
    public function editElvProject(Request $request)
    {
        $elvProject = ElvProject::where('id',$request->id)->first();
        return $elvProject;

        // return view('admin::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function updateElvProject(Request $request)
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

        $dir = 'assets/img/ElvProjects';
        $elvProject = ElvProject::findOrFail($request->id);
        $dir_e = 'assets/img/ElvProjects/';

        $elvProject->project_name = $request->project_name ;
        $elvProject->description = $request->description ;
        $elvProject->company_name = $request->company_name ;
        $elvProject->city = $request->city ;
        $elvProject->awarded_month = $request->awarded_month ;
        $elvProject->awarded_year = $request->awarded_year ;
      
        if($request->deleteImage && $request->project_image){
            $deleteImage_ar = explode(',', $request->deleteImage);
            $old_image_ar = json_decode($elvProject->project_images);
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
                            $old_image_arr = [];
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
            $elvProject->project_images = json_encode($data);
    
    
        }elseif($request->project_image){
            $old_image_arr = json_decode($elvProject->project_images);
           
            $project_images = $request->file('project_image');
            foreach($project_images as $project_image)
            {
                $name = uniqid().'_'.time().'_'.date('Ymd').'.'.$project_image->getClientOriginalName();
                $project_image->move($dir, $name);  
                $new_image_arr[] = $name;
            }
            $data = array_merge($old_image_arr, $new_image_arr);
            $elvProject->project_images = json_encode($data);

        }elseif($request->deleteImage){
            $deleteImage_ar = explode(',', $request->deleteImage);
            $old_image_ar = json_decode($elvProject->project_images);
            $remains = array_diff($old_image_ar,$deleteImage_ar);
            foreach($remains as $remain)
            {
                if(in_array($remain, $old_image_ar))
                {
                    $data[] = $remain;
                    $elvProject->project_images = json_encode($data);
                }else{
                        foreach($old_image_ar as $old_image){
                            $img = $dir_e . $old_image ;
                            if(file_exists($img))
                            unlink($img);
                        }
                }
            }             
           
        }

        $elvProject->save();        
        return redirect('boh/elv_projects');

        
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function deleteElvProject(Request $request)
    {
        $id = $request->id ;
        $dir = 'assets/img/ElvProjects/';
        $elvProject = ElvProject::findOrFail($id);
        $project_images = json_decode($elvProject->project_images, true);;
        foreach($project_images as $project_image)
        {
            $project_image = $dir . $project_image;
            if(file_exists($project_image))
            unlink($project_image);
        }

        ElvProject::destroy($id);
        return redirect('boh/elv_projects');

    }

    public function addElvProject(Request $request)
    {
        request()->validate([
            'project_name' => 'required|max:500',
            'description' => 'required',
            'company_name' => 'required|max:500',
            'solution_name' => 'required|max:500',
            'awarded_month' => 'required|max:500',
            'awarded_year' => 'required|max:500',
            'city' => 'required|max:500',
            // 'project_image' => 'required|image|jpeg,png,jpg,gif,svg|max:2048',
       ]);
       $ElvSolution = Solution::where('id',$request->solution_name)->first();
       $elvProject = new ElvProject();
       $elvProject->project_name = $request->project_name;
       $elvProject->description = $request->description;
       $elvProject->company_name = $request->company_name;
       $elvProject->solution_name = $ElvSolution->name;
       $elvProject->awarded_month = $request->awarded_month;
       $elvProject->awarded_year = $request->awarded_year;
       $elvProject->city = $request->city;
       $elvProject->cover_image = $ElvSolution->cover_image;

       if($request->file('project_image'))
       {        
            $project_images = $request->file('project_image');
            foreach($project_images as $project_image)
            {
                $name = time().'.'.$project_image->getClientOriginalName();
                $project_image->move(public_path().'/assets/img/ElvProjects', $name);
                $data[] = $name;
            }
            $elvProject->project_images = json_encode($data);
       }
        $elvProject->save();
        return redirect('boh/elv_projects');
    }


}
