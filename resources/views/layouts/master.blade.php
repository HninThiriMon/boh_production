<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="theme-color" content="#292B37" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BOH @yield('title')</title>
    <meta name="description" content="Many solutions for smaller problems but none that understands your business requiremnts? We can help you put all pieces of the Puzzle together to deliver an integrated solution to solve your business needs." />
    <!-- <meta name="google-site-verification" content="ZH0hDAPQlWLHlXH3eAfY3hk4g6uRG-bXSlNFYEvtTVk" /> -->
    <!-- <meta name="msvalidate.01" content="0D89F4CB6631D421C328047CD2DAEFE0" /> -->
    <!-- <link rel="apple-touch-icon" href="title/logo">
    <link rel="icon" type="image/png" href="" sizes="32x32" />
    <link rel="icon" type="image/png" href="" sizes="16x16" /> -->
    <link rel="stylesheet" href="{{asset('webslide/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('webslide/css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('webslide/css/etlineFont.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <!-- <link rel="stylesheet" type="text/css" href="webslide/css/icon.css" /> -->
    <link rel="stylesheet" type="text/css" href="{{asset('webslide/css/webslidemenu.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('webslide/css/colorSkins/blackBlue.css')}}" />
<?php
use App\HomeCover;
$h_cover = HomeCover::all()->last();
?>
<style>
 .hero {
            min-height: 60%;
            background: url("{{asset('images/home/home_cover/'.$h_cover->home_cover)}}") no-repeat fixed;
            background-size: 100%;
            position: relative;
            padding-bottom : 20%;
    }
    .smllogo img {
    height: auto;
    width: 35%;
    }

.logo img {
    /* height: auto; */
    width: 35%;
    }

.wsmenu img, object, embed, video {
    max-width: 70% !important;
}

.wsmenu>.wsmenu-list>li {
    text-align: left !important;
    }
</style>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-3651287-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-3651287-3');
</script>
</head>

<body id="top">


@include('layouts/header')

    <section class="hero">
      
      @include('layouts/navigation')
  
      @yield('imgtext')
                   
    </section>

    <section class="features section-padding">
        
        @yield('content')

    </section>
 
  @include('layouts/footer')

      <script src="{{asset('webslide/js/jquery.min.js')}}">
    </script>
    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"> 
</script>  -->
   
    <script src="{{asset('webslide/js/webslidemenu.js')}}">
    </script> 

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <!-- <script async src="{{asset('webslide/js/UA_98502615_2.js')}}"></script>
    <script> window.dataLayer = window.dataLayer || [];
    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-98502615-2');
    </script> -->
    
</body>





















