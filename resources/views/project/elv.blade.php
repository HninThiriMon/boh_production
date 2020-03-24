@extends('layouts/master')
@section('title','brand')

@section('content')

<style>
    .hero {
        min-height: 80%;
        background: url('/images/building-elv-solution.jpg') no-repeat fixed;
        /* background: url('images/cover.jpg') center center; */
        background-size: cover;
        /* position: relative; */
        padding-bottom: 7%;
    }

    
  .img {
    width:280px;
    height: 190px;
  }
    

  .round-rectangle {
    border-radius: 10% !important;
}


</style>
<link rel="stylesheet" href="{{asset('css/web-view/project/av-project-list.css')}}">


<div class="container">
<h1> ELV Project Complete From BOH </h1>
<div class="how-section1">
                    @if(isset($elvProjects))
                    @php $i = 1; @endphp
                    @foreach($elvProjects as  $elvProject)
                      @php
                          $i = 1 - $i;
                      @endphp
                      @if($i == 0)
                        <div class="row">
                          <div class="col-md-6 how-img">
                          <?php
                          $product_images = json_decode($elvProject->project_images, true);
                          ?>
                          <img src="{{asset('assets/img/ElvProjects/'.$product_images[0])}}" class="round-rectangle img-fluid img" alt=""/>
                          </div>
                          <div class="col-md-6">
                              <h4>{{$elvProject->project_name}}</h4>
                              <h4 class="subheading">{{$elvProject->company_name}}</h4>
                              <small>{{$elvProject->awarded_month}}&nbsp;{{$elvProject->awarded_year}}</small>
                          <p class="text-muted">{{ \Illuminate\Support\Str::limit($elvProject->description, 250, $end='...') }}<a href="{{url('each_elv_project',$elvProject->id)}}" target="_blank" > see more</a></p>
                          </div>
                      </div>
                      @else
                     
                      <div class="row">
                        <div class="col-md-6">
                            <h4>{{$elvProject->project_name}}</h4>
                                        <h4 class="subheading">{{$elvProject->company_name}}</h4>
                                        <small>{{$elvProject->awarded_month}}&nbsp;{{$elvProject->awarded_year}}</small>
                                        <p class="text-muted">{{ \Illuminate\Support\Str::limit($elvProject->description, 250, $end='...') }}<a href="{{url('each_elv_project/'.$elvProject->id)}}" target="_blank" > see more</a></p>
                        </div>
                        <div class="col-md-6 how-img">
                          <?php
                          $product_images = json_decode($elvProject->project_images, true);
                          ?>
                            <img src="{{asset('assets/img/ElvProjects/'.$product_images[0])}}" class="round-rectangle img-fluid img" alt=""/>
                        </div>
                    </div>
                      @endif
                     
                    @endforeach
                    @endif
                    
                </div>

  </div>





@endsection