@extends('layouts/master')
@section('title','Contact BOH')
@section('content')
<style>
 .hero {
    min-height: 10%;
    background: url('../images/contact/2.jpeg') no-repeat fixed;
    position: relative;
    padding-bottom: 0% !important;
  }

body {
    font-family: 'Roboto';font-size: 16px;
}

.aboutus-section {
    padding: 90px 0;
}
.aboutus-title {
    font-size: 30px;
    letter-spacing: 0;
    line-height: 32px;
    margin: 0 0 39px;
    padding: 0 0 11px;
    position: relative;
    text-transform: uppercase;
    color: #000;
}
.aboutus-title::after {
    background: #fdb801 none repeat scroll 0 0;
    bottom: 0;
    content: "";
    height: 2px;
    left: 0;
    position: absolute;
    width: 54px;
}
.aboutus-text {
    color: #606060;
    font-size: 13px;
    line-height: 22px;
    margin: 0 0 35px;
}

a:hover, a:active {
    color: #ffb901;
    text-decoration: none;
    outline: 0;
}
.aboutus-more {
    border: 1px solid #fdb801;
    border-radius: 25px;
    color: #fdb801;
    display: inline-block;
    font-size: 14px;
    font-weight: 700;
    letter-spacing: 0;
    padding: 7px 20px;
    text-transform: uppercase;
}
.feature .feature-box .iconset {
    background: #fff none repeat scroll 0 0;
    float: left;
    position: relative;
    width: 18%;
}
.feature .feature-box .iconset::after {
    background: #fdb801 none repeat scroll 0 0;
    content: "";
    height: 150%;
    left: 43%;
    position: absolute;
    top: 100%;
    width: 1px;
}

.feature .feature-box .feature-content h4 {
    color: #0f0f0f;
    font-size: 18px;
    letter-spacing: 0;
    line-height: 22px;
    margin: 0 0 5px;
}


.feature .feature-box .feature-content {
    float: left;
    padding-left: 28px;
    width: 78%;
}
.feature .feature-box .feature-content h4 {
    color: #0f0f0f;
    font-size: 18px;
    letter-spacing: 0;
    line-height: 22px;
    margin: 0 0 5px;
}
.feature .feature-box .feature-content p {
    color: #606060;
    font-size: 13px;
    line-height: 22px;
}
.icon {
    color : #f4b841;
    padding:0px;
    font-size:40px;
    border: 1px solid #fdb801;
    border-radius: 100px;
    color: #fdb801;
    font-size: 28px;
    height: 70px;
    line-height: 70px;
    text-align: center;
    width: 70px;
}
}
</style>
<!------ Include the above in your HEAD tag ---------->

<!-- <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'> -->

<div class="aboutus-section">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="aboutus">
                        <h2 class="aboutus-title">who we are</h2>
                        <p>BOH is a system integration company established in Year 2013 with a group of engineers who are highly experienced in project management locally and regionally. It comprises of professional engineers from strong academic backgrounds.</p>
                       
                        <!-- <a class="aboutus-more" href="#">read more</a> -->
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="aboutus-banner">
                        <img src="{{asset('images/contact/index.jpeg')}}" alt="">
                    </div>
                </div>
                <div class="col-md-5 col-sm-6 col-xs-12">
                    <div class="feature">
                        <div class="feature-box">
                            <div class="clearfix">
                                
                                <div class="feature-content">
                                    <h4>System Design</h4>
                                    <p>BOH helps to draw clients dreams into reality with the best solutions around the world with best fit to requriements</p> <br>
                                </div>
                            </div>
                        </div>
                        <div class="feature-box">
                            <div class="clearfix">
                                
                                <div class="feature-content">
                                    <h4>Project Management</h4>
                                    <p>Managing the projects to acheive the best efficiency with the provided resources and to results it in smiles.</p> <br>
                                </div>
                            </div>
                        </div>
                        <div class="feature-box">
                            <div class="clearfix">
                                
                                <div class="feature-content">
                                    <h4>Service</h4>
                                    <p>Services from the inception of the project idea till the end of the project life span, BOH's best services will be there.</p> <br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <section class="about-us py-5 " id="about-us">
    <div class="container mt-5">
	<div class="row">
		<div class="col-md-6">
		    <!-- <h1 class='text-success'>!</h1> -->
		    <h2>How BOH Work!</h2>
		    <hr>
		    <p>BOH listens the voice of our potential customers, empathize those needs and develop the customized solutions to fulfil the exactly what our customers wanted. With this approach, BOH is able to help out almost everything pertaining to the system integration and extra-low voltage requirement in Myanmar.</p>
		    <!-- <button type="button" class="btn btn-success">Let's Know More</button> -->

		</div>
		<div class="col-md-6">
		    <img src="http://themebubble.com/demo/marketingpro/wp-content/uploads/2016/10/seo-slide.png "alt="">
		</div>
	</div>
</div>
</section>
@endsection