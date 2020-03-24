@extends('layouts/master')
@section('title','Product Detail')
@section('content')

<link rel="stylesheet" href="{{asset('css/web-view/product/av-product-detail.css')}}">
<style>
  .hero {
    min-height: 80%;
    background: url('images/cover.jpg') no-repeat fixed;
    background-size: 100%;
    position: relative;
    padding-bottom: 10%;
  }
	</style>



<div class="container">
	<div class="row">
		</div><br><br>
	<div class="row">
	<!-- <div class="col-md-6"> -->
	<a href="{{url('elv_products_list')}}"><h1><i class="fas fa-arrow-circle-left"></i></h1></a>
	<!-- </div>			 -->
	<div class="col-md-12">
			<div class="text-right">
					<a href="{{url('About_us')}}"><h4>Help me with this system</h4></a>
			</div>
		</div>									
	</div><br><br>
					<div class="col-md-5">
								<?php
								$product_images = json_decode($elvProduct->product_images, true);
								$specifications = json_decode($elvProduct->specification, true);
        ?>
    				<ul id="glasscase" class="gc-start">
											<li><img src="{{asset('assets/img/ElvProducts/'.$product_images[0])}}" alt="Text" data-gc-caption="Your caption text" /></li>
								@foreach ($product_images as $product_image)
											<li><img src="{{asset('assets/img/ElvProducts/'.$product_image)}}" alt="Text" /></li>
								@endforeach
							</ul>
			</div>
				<div class="col-md-7">
					<h2>{{$elvProduct->product_name}}</h2><br>
					<h4>brand : <b>{{$elvProduct->brand_name}}</b></h4>
					<h4>price : <b>$ {{$elvProduct->price}}</b></h4><br>
					<h4>
									@foreach ($specifications as $specification)
										<i class="fas fa-dice-d6"> &nbsp;	<b> {{$specification}}</b> </i> <br><br>
									@endforeach
					</h4>



					
					<p></p>

			</div>

	</div>
	<br><br>

 <script src="{{asset('jquery.min.js')}}"></script>
<script type="text/javascript">
        $(document).ready( function () {
            //If your <ul> has the id "glasscase"
            $('#glasscase').glassCase({ 'thumbsPosition': 'bottom', 'widthDisplay' : 560});
        });
    </script>
    <script src="{{asset('js/web-view/product/av-product-detail.js')}}"></script>

@endsection