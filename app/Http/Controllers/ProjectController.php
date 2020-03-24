<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Exception\NotReadableException;
use Modules\Admin\Entities\Project\AvProject;
use Modules\Admin\Entities\Project\ElvProject;


class ProjectController extends Controller
{

    public function audioAndVisual()
    {
        $avProjects = AvProject::all();
        return view('project/audio_visual',compact("avProjects"));
    }

    public function eLV()
    {
        $elvProjects = ElvProject::all();
        return view('project/elv',compact("elvProjects"));
    }

    public function projectsList()
    {
        $AvProjects = AvProject::all();
        $ElvProjects = ElvProject::all();
        return view("project/projects_list",compact("AvProjects","ElvProjects"));
    }

    public function eachElvProject($id)
    {
        $elvProject = ElvProject::where('id',$id)->first();
        return view("project/each_elv_project", ["elvProject" => $elvProject]);
    }

    public function eachAvProject($id)
    {
        $avProject = AvProject::where('id',$id)->first();
        return view("project/each_av_project", ["avProject" => $avProject]);
    }


}
