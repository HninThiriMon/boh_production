<?php

namespace Modules\Admin\Http\Controllers\Home;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\HomeCover;
use App\model\ServiceImages\Design;
use App\model\ServiceImages\Supply;
use App\model\ServiceImages\Install;
use App\model\ServiceImages\Maintain;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('admin::index');
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
    public function edit($id)
    {
        return view('admin::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function updateHomeCover(Request $request)
    {
       if($request->hasfile('home_cover'))
       {
        $dir = 'images/home/home_cover';
        $h_cover = $request->file('home_cover')->getClientOriginalName();
        $request->file('home_cover')->move($dir, $h_cover);
        $home_cover = new HomeCover();
        $home_cover->home_cover = $h_cover;
        $home_cover->save();
       }
       return redirect("boh/home");
    }
   

    public function adminHome()
    {
        return view('admin::home');
    }

    public function updateDesignSP(Request $request)
    {
        if($request->hasfile('design_s_p'))
       {
        $dir = 'images/home';
        $cover_image = "design_service.jpg";
        $request->file('design_s_p')->move($dir, $cover_image);
       }
       return redirect("boh/home");
    }

    public function updateSupplySP(Request $request)
    {
        if($request->hasfile('supply_s_p'))
       {
        $dir = 'images/home';
        $cover_image = "supply_service.jpg";
        $request->file('supply_s_p')->move($dir, $cover_image);
       }
       return redirect("boh/home");
    }

    public function updateInstallSP(Request $request)
    {
        if($request->hasfile('install_s_p'))
       {
        $dir = 'images/home';
        $cover_image = "install_service.jpg";
        $request->file('install_s_p')->move($dir, $cover_image);
       }
       return redirect("boh/home");
    }

    public function updateMaintainSP(Request $request)
    {
        if($request->hasfile('maintain_s_p'))
       {
        $dir = 'images/home';
        $cover_image = "maintain_service.jpg";
        $request->file('maintain_s_p')->move($dir, $cover_image);
       }
       return redirect("boh/home");
    }
}
