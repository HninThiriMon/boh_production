@extends('layouts/master')
@section('title','Clients')
@section('imgtext')
      <div class="hero-content text-center">
          <h1>Our Clients</h1>
      </div>
@endsection
@section('content')
<style>
    .hero {
    min-height: 80%;
    background: url('/images/building-elv-solution.jpg') no-repeat fixed;
    background-size: cover;
    padding-bottom: 2%;
    
}
  .hero-content{
    padding-top: 2% !important;
  }
</style>

<div class="offset-md-2">
   
        <div class="row ">

            <div class="col-sm-4 py-2" >
            <a href="#" target="_blank">
                    <img src="images\OurClients\access-spectrum.png" alt="" class="img-fluid">
            </a>
            </div>
            <div class="col-sm-4 py-2">
            <a href="#" target="_blank">
                    <img src="images\OurClients\aya-bank.png" alt="" class="img-fluid">
            </a>        
            </div>
            <div class="col-sm-4 py-2">
            <a href="#" target="_blank">
                    <img src="images\OurClients\eternal-co.png" alt="" class="img-fluid">
            </a>  
            </div>
            
        </div>
        <div class="row">

            <div class="col-sm-4 py-2">
            <a href="#" target="_blank">
                    <img src="images\OurClients\huawei.png" alt="" class="img-fluid">
            </a>
            </div>
            <div class="col-sm-4 py-2">
            <a href="#" target="_blank">
                    <img src="images\OurClients\jcgv.png" alt="" class="img-fluid">
            </a>
            </div>
            <div class="col-sm-4 py-2">
            <a href="#" target="_blank">
                    <img src="images\OurClients\marga.png" alt="" class="img-fluid">
            </a>
            </div>
            
        </div>
        <div class="row">

            <div class="col-sm-4 py-2">
            <a href="#" target="_blank">
                    <img src="images\OurClients\moh.png" alt="" class="img-fluid">
            </a>
            </div>
            <div class="col-sm-4 py-2">
            <img src="images\OurClients\ngcapital.png" alt="" class="img-fluid">
            </div>
            <div class="col-sm-4 py-2">
            <img src="images\OurClients\pma.png" alt="" class="img-fluid">
            </div>
           
        </div>
        <div class="row">

            <div class="col-sm-4 py-2">
            <img src="images\OurClients\uab-bank.png" alt="" class="img-fluid">
            </div>
                        
            <div class="col-sm-4 py-2">
            <a href="#" target="_blank">
                        <img src="images\OurClients\max-myanmar.png" alt="" class="img-fluid">
            </a>
            </div>

            <div class="col-sm-4 py-2">
            <img src="images\OurClients\shwe-taung.png" alt="" class="img-fluid">
            </div>


        </div>
        
        
    
</div>

@endsection

