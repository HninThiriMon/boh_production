@extends('layouts/master')
@section('title','brand')
@section('imgtext')
      <div class="hero-content text-center">
          <h1> Available Solutions </h1>
         
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
  .hero-content{
    padding-top: 2% !important;
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
<h2>ELV Solutions</h2>
</div>
<div class="row">
@foreach($ELVsolutions as $ELVsolution )
<div class="col-md-3">
	<figure class="card card-product">
		<div class="img-wrap"> 
			<img src="{{asset('assets/img/solutions/'.$ELVsolution->main_image)}}"  width="300" height="200" >
			<!-- <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i> Quick view</a> -->
		</div>
		<figcaption class="info-wrap">
			<!-- <h6 class="title text-dots"><a href="#">Good item name</a></h6> -->
			<div class="action-wrap">
      <a href="{{url('solution',$ELVsolution->id)}}"  > <button class="btn-dark float-right"> view more </button> </a>
      
			
				<div class="price-wrap h5">
					<span class="price-new">{{$ELVsolution->name}}</span>
				
				</div> <!-- price-wrap.// -->
			</div> <!-- action-wrap -->
		</figcaption>
	</figure> <!-- card // -->
</div> <!-- col // -->
@endforeach
</div> 




<div class="center">
<h2>Audio & Visual Solutions</h2>
</div>
<div class="row">
@foreach($AVsolutions as $AVsolution )
<div class="col-md-3">
	<figure class="card card-product">
		<div class="img-wrap"> 
			<img src="{{asset('assets/img/AvSolutions/'.$AVsolution->main_image)}}"  width="300" height="200" >
			<!-- <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i> Quick view</a> -->
		</div>
		<figcaption class="info-wrap">
			<!-- <h6 class="title text-dots"><a href="#">Good item name</a></h6> -->
			<div class="action-wrap">
      <a href="{{url('solution',$AVsolution->id)}}"  > <button class="btn-dark float-right"> view more </button> </a>
      
			
				<div class="price-wrap h5">
					<span class="price-new">{{$AVsolution->name}}</span>
				
				</div> <!-- price-wrap.// -->
			</div> <!-- action-wrap -->
		</figcaption>
	</figure> <!-- card // -->
</div> <!-- col // -->
@endforeach
</div> 

</div>






@endsection