<?php

namespace App\Http\Controllers\solution;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Admin\Entities\Solution\AvSolution;
use Modules\Admin\Entities\Project\AvProject;

class AvSolutionsController extends Controller
{
    public function eachAvSolution($id)
    {
        $solution = AvSolution::where('id',$id)->first();
        $AvProjects = AvProject::where('solution_name',$solution->name)->get();
        return view("solution/av_solution", ["solution" => $solution,"AvProjects" => $AvProjects]);
    }
    
    
}
