@extends('layouts/master')
@section('title','')
@section('imgtext')
        <div class="hero-content">
            <div class="col-md-7">
                <h1 class="text-center"> AV & ELV  System Integration </h1>
                <!-- <h2> save your EFFORTS & SWEATS by getting a hand from BOH </h2> -->
            </div>
        </div>
@endsection
@section('content')

<link rel="stylesheet" href="css/client_slider/simple-line-icons.css">
<link href="css/client_slider/jquery.fancybox.css" rel="stylesheet"> 
<link href="css/client_slider/flexslider.css" rel="stylesheet" />
<link href="css/client_slider/owl.carousel.css" rel="stylesheet"> 
<link href="css/client_slider/style.css" rel="stylesheet" />
<style>

.hero {
        /* min-height: 80%;
         background-size: cover; */
        /* position: relative; */
        padding-bottom: 15%;
       
    }


.mybg-events {
    background: url('images/blur-scroll.jpg') no-repeat center center fixed;
    background-size: cover;

}

.h-262 {
    height: 262px !important;
}

.title-heading.text-center {
    
    color: #212529;
    font-weight: bold;
}

p.myp.text-center {
    color: #fff;
    font-size: 14px;
    margin-bottom: 3rem;
    object-fit: cover;
}

.my-grid img {
    height: 208px;
    width: 100%;
    object-fit: cover;
}


.big-img2 img {
   
   height: 472px;
   width: 100%;
   object-fit: cover;
}

.text-block {
    min-height: 228px;
    height: auto;
    background: #fff;
    padding: 15px;
}

h5.events-heading {
    font-weight: bold;
    font-size: 17px;
}

p.myp-font {
    font-size: 15px;
}

section#group {
    background: #fff;
    height: 100%;
    width: 100%;
    padding-top: 2rem;
    padding-bottom: 2rem;
}
</style>
<style>
         h1{
             font-size:25px;
             text-align: left;
             text-transform:capitalize;
         }
        .service-box{
            position: relative;
            overflow: hidden;
            margin-bottom:10px;
            perspective:1000px;
            -webkit-perspective:1000px;
        }
        .service-icon{
            
            width: 100%;
            height: 220px;
            padding: 20px;
            text-align: center;
            transition: all .5s ease;
        }

        .service-content{
            position: absolute;
            top: 0;
            left: 0;
            z-index: 1;
            opacity: 0;
            width: 100%;
            height: 220px;
            padding: 20px;
            text-align: center;
            transition: all .5s ease;
            /* background-color: #474747; */
            backface-visibility:hidden;
            transform-style: preserve-3d;
            -webkit-transform: translateY(110px) rotateX(-90deg);
            -moz-transform: translateY(110px) rotateX(-90deg);
            -ms-transform: translateY(110px) rotateX(-90deg);
            -o-transform: translateY(110px) rotateX(-90deg);
            transform: translateY(110px) rotateX(-90deg);
        }
        .service-box .service-icon .front-content{
            position: relative;
            top:80px;
            -webkit-transform: translateY(-50%);
            -moz-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            -o-transform: translateY(-50%);
            transform: translateY(-50%);
        }

        .service-box .service-icon .front-content i {
            font-size: 28px;
            color: #fff;
            font-weight: normal;
        }

        .service-box .service-icon .front-content h3 {
            font-size: 15px;
            color: #fff;
            text-align: center;
            margin-bottom: 15px;
            text-transform: uppercase;
        }
        .service-box .service-content h3 {
            font-size: 15px;
            font-weight: 700;
            color: #fff;
            margin-bottom:10px;
            text-transform: uppercase;
        }
        .service-box .service-content p {
            font-size: 13px;
            /* color: #b1b1b1; */
            color: #fff;
            margin:0;
        }
        .yellow{background-color: #ffc000;}
        .orange{background-color: #fc7f0c;}
        .red{background-color: #e84b3a;}
        .grey{background-color: #474747;}
        .service-box:hover .service-icon{
            opacity: 0;
            -webkit-transform: translateY(-110px) rotateX(90deg);
            -moz-transform: translateY(-110px) rotateX(90deg);
            -ms-transform: translateY(-110px) rotateX(90deg);
            -o-transform: translateY(-110px) rotateX(90deg);
            transform: translateY(-110px) rotateX(90deg);
        }
        .service-box:hover .service-content {
            opacity: 1;
            -webkit-transform: rotateX(0);
            -moz-transform: rotateX(0);
            -ms-transform: rotateX(0);
            -o-transform: rotateX(0);
            transform: rotateX(0);
        }
       
        .client{
            background-color: #fff;
        }

        .sc {
            font-size: 35px;
            /* color: #da4b38; */
            color: silver;
            font-weight: bold;
        }

      .center row {
            margin: auto;
            width: 10%;
            padding: 3%;
        }

        .img {
            width:330px; /* you can use % */
            height: 170px;
        }
        
</style>
    
   <div class="container">
       <div class="row"><h1 class="center sc"> Our Service </h1></div>

            <div class="row">
                <div class="col-md-3 col-sm-6 ">
                    <div class="service-box">
                        <a href="{{url('design')}}">
                            <div>
                            <img src="images/home/design_service.jpg" alt="" class="img">
                            </div>
                            <div class="service-content">
                            <h2>Design</h2>
                                <!-- <p>No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure</p> -->
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 ">
                    <div class="service-box">
                        <a href="{{url('supply')}}">
                            <div>
                            <img src="images/home/supply_service.jpg" alt="" class="img">
                            </div>
                            <div class="service-content">
                                <h2>Supply</h2>
                                <!-- <p>No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure</p> -->
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="service-box ">
                    <a href="{{url('install')}}">
                        <div>
                        <img src="images/home/install_service.jpg" alt="" class="img" >
                        </div>
                        <div class="service-content">
                            <h2>Install </h2>
                            <!-- <p>No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure</p> -->
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="service-box">
                    <a href="{{url('maintain')}}">
                        <div>
                        <img src="images/home/maintain_service.jpg" alt="" class="img">
                        </div>
                        <div class="service-content">
                            <h2>Maintain</h2>
                            <!-- <p>No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure</p> -->
                        </div>
                        </a>
                    </div>
                </div>
            </div>
    </div><br>
   
            <section class="testimonials mybg-events">
                <div class="container">
                    <div class="row ">
                        <div class="col-md-12"><br>
                            <h3 class="title-heading text-center">Team BOH</h3>
                            <p class="myp text-center">
                                Many solutions for smaller problems but none that understands your business requiremnts?
                                We can help you put all pieces of the Puzzle together to deliver an integrated solution to solve your business needs.
                                </p>
                            <p class="myp text-center">
                                Team BOH has begun its journey as an electrical installation team in year 2004 and in year 2013, Team BOH has become a registered company under Directorate of Investment and Company Administration. Audio & Visual Systems Integration, designing, supplying, installation of Extra Low Voltage Systems are core businesses of Team BOH.
                                Starting with two members in Year 2013, Team BOH has grown up to 40 members in Year 2019 and expected to grow further emphasizing on customers’ need and always trying to exceed our customers’ expectation. Credit built along the lifespan, Team BOH achieved the trusts of our respected clients and building it to strengthen further. Team BOH is feeling excited to support you to make your dreams happen in reality.
                            </p>
           
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="big-img2">
                                <img src="images/MATV_SMATV_retrocon.jpg">
                            </div>
                            
                        </div>
                        <div class="col-md-8">
                            <div class="inner-section">
                                <div class="my-grid">
                                    <div class="row">
                                        <div class="col-sm-6 col-md-4 mb-3">
                                        
                                            <img src="images/PABX_ip.jpg">
                                            
                                        </div>
                                        <div class="col-sm-6 col-md-8 mb-3">
                                            
                                            <img src="images/smart_control.jpg">
                                        
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 col-md-8 mb-3">
                                            <div class="text-block">
                                                <h5 class="events-heading">How BOH Works</h5>
                                                <p class="myp-font">  
                                                BOH listens the voice of customers, empathize those needs and develop the customized solutions to fulfil the exactly what our customers wanted</p>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 mb-3">
                                            
                                            <img src="images/fire_alarm.jpg" >
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section> 

   
      
	 <section class="clients">
	 <div class="container">
	 	<div class="clients-slider">
				<h3 class="header-title">Our Clients</h3>
				<div class="clients-control pull-right">
					<a class="prev btn btn-gray btn-xs"><i class="fa fa-angle-left fa-2x"></i></a>
					<a class="next btn btn-gray btn-xs"><i class="fa fa-angle-right fa-2x"></i></a>
				</div><br>
				<span class="line"></span>
				<div id="clients-slider" class="owl-carousel client">
					<div class="item">
						<a href="https://www.shwetaunggroup.com" target="_blank">
						<img title="Shwe Taung Group" alt="Shwe Taung Group" src="images/OurClients/shwe-taung-gray.png">
						<img title="Shwe Taung Group" alt="Shwe Taung Group" src="images/OurClients/shwe-taung.png" class="colored">
						</a>
					</div>
					<div class="item">
						<a href="http://margaglobal.com" target="_blank">
						<img title="Marga Landmark Development" alt="Marga Landmark Development Co., Ltd" src="images/OurClients/marga-gray.png">
						<img title="Marga Landmark Development" alt="Marga Landmark Development Co., Ltd" src="images/OurClients/marga.png" class="colored">
						</a>
					</div>
					<div class="item">
						<a href="http://www.maxmyanmargroup.com" target="_blank">
						<img title="Max Myanmar" alt="Max Myanmar" src="images/OurClients/max-myanmar-gray.png">
						<img title="Max Myanmar" alt="Max Myanmar" src="images/OurClients/max-myanmar.png" class="colored">
						</a>
					</div>
					<div class="item">
						<a href="https://www.huawei.com/mm/" target="_blank">
						<img title="Huawei Myanmar" alt="Huawei Myanmar" src="images/OurClients/huawei-gray.png">
						<img title="Huawei Myanmar" alt="Huawei Myanmar" src="images/OurClients/huawei.png" class="colored">
						</a>
					</div>
					<div class="item">
						<a href="http://www.unitedamarabank.com" target="_blank">
						<img title="United Amara Bank" alt="UAB Bank Myanmar" src="images/OurClients/uab-bank-gray.png">
						<img title="United Amara Bank" alt="UAB Bank Myanmar" src="images/OurClients/uab-bank.png" class="colored">
						</a>
					</div> 
					<div class="item">
						<a href="https://www.ayabank.com/en_US/" target="_blank">
						<img title="Aya Bank" alt="AYA Bank Myanmar" src="images/OurClients/aya-bank-gray.png">
						<img title="Aya Bank" alt="AYA Bank Myanmar" src="images/OurClients/aya-bank.png" class="colored">
						</a>
					</div>
					<div class="item">
						<a href="http://www.nainggroupcapital.com" target="_blank">
						<img title="Naing Group Capital" alt="Naing Group Capital" src="images/OurClients/ngcapital-gray.png">
						<img title="Naing Group Capital" alt="Naing Group Capital" src="images/OurClients/ngcapital.png" class="colored">
						</a>
					</div>
					<div class="item">
						<a href="http://www.accessspectrum.net" target="_blank">
						<img title="Access Spectrum" alt="Access Spectrum" src="images/OurClients/access-spectrum-gray.png">
						<img title="Access Spectrum" alt="Access Spectrum" src="images/OurClients/access-spectrum.png" class="colored">
						</a>
					</div>
					<div class="item">
						<a href="http://www.mohs.gov.mm" target="_blank">
						<img title="Ministry of Healths & Sports" alt="Ministry Of Health and Sports" src="images/OurClients/moh-gray.png">
						<img title="Ministry of Healths & Sports" alt="Ministry Of Health and Sports" src="images/OurClients/moh.png" class="colored">
						</a>
					</div>
					<div class="item">
						<a href="http://www.eternalmyanmar.com" target="_blank">
						<img title="Eternal Myanmar" alt="Eternal Group of Companies" src="images/OurClients/eternal-co-gray.png">
						<img title="Eternal Myanmar" alt="Eternal Group of Companies" src="images/OurClients/eternal-co.png" class="colored">
						</a>
					</div>
					<div class="item">
						<a href="#">
						<img title="JCGV Cinema" alt="JCGV Cinema" src="images/OurClients/jcgv-gray.png">
						<img title="JCGV Cinema" alt="JCGV Cinema" src="images/OurClients/jcgv.png" class="colored">
						</a>
					</div>
					<div class="item">
						<a href="https://pma-mm.com" target="_blank">
						<img title="Paramount Myanmar Aliance" alt="Paramount Myanmar Aliance" src="images/OurClients/pma-gray.png">
						<img title="Paramount Myanmar Aliance" alt="Paramount Myanmar Aliance" src="images/OurClients/pma.png" class="colored">
						</a>
					</div>
					
					
				</div>
				<div class="fullwidth margin-bottom-20">
				</div>
			</div>
		 </div>
	 </section>
	
        <a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>


<!-- client slide
    ================================================== -->
<script src="js/ClientSlider/jquery.js"></script>
<script src="js/ClientSlider/jquery.easing.1.3.js"></script>
<script src="js/ClientSlider/jquery.fancybox.pack.js"></script>
<script src="js/ClientSlider/jquery.fancybox-media.js"></script> 
<script src="js/ClientSlider/portfolio/jquery.quicksand.js"></script>
<script src="js/ClientSlider/portfolio/setting.js"></script>
<script src="js/ClientSlider/jquery.flexslider.js"></script>
<script src="js/ClientSlider/animate.js"></script>
<script src="js/ClientSlider/custom.js"></script>
<script src="js/ClientSlider/owl.carousel.js"></script>
<!-- Placed at the end of client slide -->

<!-- Placed at the start of Home scroll image -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
     <script>
              new WOW().init();
              </script>
    <script>
        $(window).scroll( function(){

 
          var topWindow = $(window).scrollTop();
          var topWindow = topWindow * 1.5;
          var windowHeight = $(window).height();
          var position = topWindow / windowHeight;
          position = 1 - position;
        
          $('#bottom').css('opacity', position);
        
        });
  

</script>
<!-- Placed at the End of Home scroll image -->

@endsection
