<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Admin\Entities\Solution;
use Intervention\Image\Exception\NotReadableException;
use Modules\Admin\Entities\Solution\AvSolution;
use Modules\Admin\Entities\Project\ElvProject;

class SolutionController extends Controller
{
    public function solutions()
    {
        $ELVsolutions = Solution::all();
        $AVsolutions = AvSolution::all();
        return view("solution/solutions",compact("ELVsolutions","AVsolutions"));
    }

    public function av()
    {
        return view("solution/av");
    }

    public function digitalSignage($id)
    {
        $solution = Solution::where('id',$id)->first();
        $ElvProjects = ElvProject::where('solution_name',$solution->name)->get();
	 return view("solution/digital_signage", ["solution" => $solution,"ElvProjects" => $ElvProjects]);
    }

    public function homeTheater()
    {
        return view("solution/home_theater");
    }

    public function AccessControlCCTV()
    {
        return view("solution/access_control_cctv");
    }

    public function MatvSmatvIptv()
    {
        return view("solution/matv_smatv_iptv");
    }

    public function fireAlarm()
    {
        return view("solution/fire_alarm");
    }

    public function PabxIpbxVoip()
    {
        return view("solution/pabx_ipbx_voip");
    }

    public function parkingGuidance()
    {
        return view("solution/parking_guidance");
    }

    public function backgroundMusicPa()
    {
        return view("solution/background_music_pa");
    }

    public function structuredCabling()
    {
        return view("solution/structured_cabling");
    }

    public function videoConferencing()
    {
        return view("solution/video_conferencing");
    }

    public function iotBusinessSolutions()
    {
        return view("solution/iot_business_solutions");
    }


}
