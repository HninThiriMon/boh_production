@extends('layouts/master')
@section('title','brand')
@section('content')
<style>
    .hero {
        min-height: 30%;
        background: url('/images/building-elv-solution.jpg') no-repeat fixed;
        /* background: url('images/cover.jpg') center center; */
        background-size: cover;
        /* position: relative; */
        padding-bottom: 7%;
    }

    hero-content.{
      padding-top: 0% important!;
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
<h1>Audio & Visual Project Complete From BOH </h1>
<div class="how-section1">
                    @if(isset($avProjects))
                    @php $i = 1; @endphp
                    @foreach($avProjects as  $avProject)
                      @php
                          $i = 1 - $i;
                      @endphp
                      @if($i == 0)
                        <div class="row">
                          <div class="col-md-6 how-img">
                          <?php
                          $product_images = json_decode($avProject->project_images, true);
                          ?>
                          <img src="{{asset('assets/img/AvProjects/'.$product_images[0])}}" class="round-rectangle img-fluid img" alt=""/>
                          </div>
                          <div class="col-md-6">
                              <h4>{{$avProject->project_name}}</h4>
                              <h4 class="subheading">{{$avProject->company_name}}</h4>
                              <small>{{$avProject->awarded_month}}&nbsp;{{$avProject->awarded_year}}</small>
                          <p class="text-muted">{{ \Illuminate\Support\Str::limit($avProject->description, 250, $end='...') }}<a href="{{url('each_av_project/'.$avProject->id)}}" target="_blank" > see more</a> </p>
                          
                          </div>
                      </div>
                      @else
                     
                      <div class="row">
                        <div class="col-md-6">
                            <h4>{{$avProject->project_name}}</h4>
                                        <h4 class="subheading">{{$avProject->company_name}}</h4>
                                        <small>{{$avProject->awarded_month}}&nbsp;{{$avProject->awarded_year}}</small>
                                        <p class="text-muted">{{ \Illuminate\Support\Str::limit($avProject->description, 250, $end='...') }}<a href="{{url('each_av_project',$avProject->id)}}" target="_blank" > see more</a></p>
                        </div>
                        <div class="col-md-6 how-img">
                          <?php
                          $product_images = json_decode($avProject->project_images, true);
                          ?>
                            <img src="{{asset('assets/img/AvProjects/'.$product_images[0])}}" class="round-rectangle img-fluid img" alt=""/>
                        </div>
                    </div>
                      @endif
                     
                    @endforeach
                    @endif
                    <!-- <div class="row">
                        <div class="col-md-6">
                            <h4>Get hired quickly</h4>
                                        <h4 class="subheading">GetLance makes it easy to connect with clients and begin doing great work.</h4>
                                        <p class="text-muted">Streamlined hiring. GetLance’s sophisticated algorithms highlight projects you’re a great fit for.
                                            Top Rated and Rising Talent programs. Enjoy higher visibility with the added status of prestigious programs.
                                            Do substantial work with top clients. GetLance pricing encourages freelancers to use GetLance for repeat relationships with their clients.</p>
                        </div>
                        <div class="col-md-6 how-img">
                            <img src="https://image.ibb.co/cHgKnU/Work_Section2_freelance_img2.png" class="rounded-circle img-fluid" alt=""/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 how-img">
                             <img src="https://image.ibb.co/ctSLu9/Work_Section2_freelance_img3.png" class="rounded-circle img-fluid" alt=""/>
                        </div>
                        <div class="col-md-6">
                            <h4>Work efficiently, effectively.</h4>
                                        <h4 class="subheading">With GetLance, you have the freedom and flexibility to control when, where, and how you work. Each project includes an online workspace shared by you and your client, allowing you to:</h4>
                                        <p class="text-muted">Send and receive files. Deliver digital assets in a secure environment.
                                            Share feedback in real time. Use GetLance Messages to communicate via text, chat, or video.
                                            Use our mobile app. Many features can be accessed on your mobile phone when on the go.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Get paid on time</h4>
                                        <h4 class="subheading">All projects include GetLance Payment Protection — helping ensure that you get paid for all work successfully completed through the freelancing website.</h4>
                                        <p class="text-muted">All invoices and payments happen through GetLance. Count on a simple and streamlined process.
                                            Hourly and fixed-price projects. For hourly work, submit timesheets through GetLance. For fixed-price jobs, set milestones and funds are released via GetLance escrow features.
                                            Multiple payment options. Choose a payment method that works best for you, from direct deposit or PayPal to wire transfer and more.</p>
                        </div>
                        <div class="col-md-6 how-img">
                            <img src="https://image.ibb.co/gQ9iE9/Work_Section2_freelance_img4.png" class="rounded-circle img-fluid" alt=""/>
                        </div>
                    </div> -->
                </div>

  </div>





@endsection