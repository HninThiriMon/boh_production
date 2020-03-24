@extends('layouts/master')
@section('title','Project Reference')
@section('imgtext')
      <div class="hero-content text-center">
          <h1> Project Reference </h1>
         
      </div>
@endsection
@section('content')
<style>
    .hero {
        min-height: 80%;
       background: url('images/cover.jpg') center center;
        background-size: cover;
        /* position: relative; */
        padding-bottom: 2%;
    }

    .card-product:after {
    content: "";
    display: table;
    clear: both;
    visibility: hidden; }
  .card-product .price-new, .card-product .price {
    margin-right: 5px; }
  .card-product .price-old {
    color: #999; }
  .card-product .img-wrap {
    border-radius: 3px 3px 0 0;
    overflow: hidden;
    position: relative;
    height: 220px;
    text-align: center; }
    .card-product .img-wrap img {
      max-height: 100%;
      max-width: 100%;
      object-fit: cover; }
      
      .card-product .info-wrap {
    overflow: hidden;
    padding: 15px;
    border-top: 1px solid #eee; }
  .card-product .action-wrap {
    padding-top: 4px;
    margin-top: 4px; }
  .card-product .bottom-wrap {
    padding: 15px;
    border-top: 1px solid #eee; }
  .card-product .title {
    margin-top: 0; }

    .center {
    margin: auto;
    /* width: 80%; */
    padding: 1%;
    }

</style>

<div class="container">



<div class="center">
<h2>ELV Projects</h2>
</div>
<div class="row">
@foreach($ElvProjects as $ElvProject )
<div class="col-md-3">
	<figure class="card card-product">
		<div class="img-wrap">
			<img src="{{asset('assets/img/ElvProjects/'.$ElvProject->image_1)}}"  width="300" height="200" >
			<!-- <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i> Quick view</a> -->
		</div>
		<figcaption class="info-wrap">
			<!-- <h6 class="title text-dots"><a href="#">Good item name</a></h6> -->
			<div class="action-wrap">
      <a href="{{url('each_elv_project',$ElvProject->id)}}"> <button class="btn-dark float-right"> view more </button> </a>
      <span class="price-new">{{$ElvProject->company_name}}</span>
				<div class="price-wrap h5">
				<span class="price-new">{{$ElvProject->solution_name}}</span>
				</div> <!-- price-wrap.// -->
			</div> <!-- action-wrap -->
		</figcaption>
	</figure> <!-- card // -->
</div> <!-- col // -->
@endforeach
</div> 




<div class="center">
<h2>Audio & Visual Projects</h2>
</div>
<div class="row">
@foreach($AvProjects as $AvProject )
<div class="col-md-3">
	<figure class="card card-product">
		<div class="img-wrap"> 
			<img src="{{asset('assets/img/AvProjects/'.$AvProject->image_1)}}"  width="300" height="200" >
			<!-- <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i> Quick view</a> -->
		</div>
		<figcaption class="info-wrap">
			<!-- <h6 class="title text-dots"><a href="#">Good item name</a></h6> -->
			<div class="action-wrap">
      <a href="{{url('each_av_project',$AvProject->id)}}"  > <button class="btn-dark float-right"> view more </button> </a>
      
      <span class="price-new">{{$AvProject->company_name}}</span>
				<div class="price-wrap h5">
					<span class="price-new">{{$AvProject->solution_name}}</span>
				
				</div> <!-- price-wrap.// -->
			</div> <!-- action-wrap -->
		</figcaption>
	</figure> <!-- card // -->
</div> <!-- col // -->
@endforeach
</div> 

</div>






@endsection