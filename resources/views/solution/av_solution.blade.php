@extends('layouts/master')
@section('title','AV Solution')
@section('imgtext')
      <div class="hero-content text-center">
          <h1>{{$solution->name}}</h1>
         
      </div>
@endsection
@section('content')
<style>
    .hero {
    min-height: 80%;
    background: url("{{asset('assets/img/AvSolutions/'.$solution->cover_image)}}") no-repeat fixed;
    background-size: 100%;
    position: relative;
    padding-bottom: 2%;
    
}
  .hero-content{
    padding-top: 2% !important;
  }

  .fluid {
    width:95%;
    height: 95%;
  }
  
</style>
<script src="{{asset('jquery.min.js')}}"></script>
<style type="text/css" id="slider-css"></style>



<style> 

/* brand slider */
.carousel-item > div {
  float: left;
}
.carousel-by-item [class*="cloneditem-"] {
  display: none;
}
</style>

<link rel="stylesheet" href="{{asset('webslide/css/bootstrap.css')}}">
           
            

<!-- Page Content -->
<div class="container">

  <!-- Portfolio Item Heading -->
  <!-- <h1 class="my-4">
    <small></small>
  </h1> -->  

  <!-- Portfolio Item Row -->
  <div class="row">
    <div class="col-md-8">
      <img src="{{asset('assets/img/AvSolutions/'.$solution->main_image)}}" width="700" height="500" >
    </div>

    <div class="col-md-4">
      <h3 class="my-3">{{$solution->name}}</h3>
     

    <p id="description">{{ \Illuminate\Support\Str::limit($solution->description, 350, $end='...') }}</p> 
    <div id="collapse" style="display:none">
        <p>{{$solution->description}}</p>
    </div>
    <a href="#collapse" class="nav-toggle">Read More</a>

    @if(isset($solution->list))
        <?php $lists = json_decode($solution->list, true); ?>
      <h4 class="my-3">
      @foreach($lists as $list)
           # {{ Illuminate\Support\Str::limit($list,100,$end='...')}} , <br>
      @endforeach
      </h4>
     @endif

      <hr>
      <a href="{{url('About_us')}}" target="blank"> <button type="button"  class="btn btn-dark"> Help me with this System </button> </a>
    </div>

  </div>
  <!-- /.row -->

  <!-- Related Projects Row -->
  <h3 class="my-4"></h3>

  <div class="row">

    <div class="col-md-3 col-sm-6 mb-4">
      <a href="#">
            <img class="fluid" src="{{asset('assets/img/AvSolutions/'.$solution->image_1)}}" alt="">
          </a>
    </div>

    <div class="col-md-3 col-sm-6 mb-4">
      <a href="#">
            <img class="fluid" src="{{asset('assets/img/AvSolutions/'.$solution->image_2)}}" alt="">
          </a>
    </div>

    <div class="col-md-3 col-sm-6 mb-4">
      <a href="#">
            <img class="fluid" src="{{asset('assets/img/AvSolutions/'.$solution->image_3)}}" alt="">
          </a>
    </div>

    <div class="col-md-3 col-sm-6 mb-4">
      <a href="#">
            <img class="fluid" src="{{asset('assets/img/AvSolutions/'.$solution->image_4)}}"  alt="">
          </a>
    </div>

  </div>
  <!-- /.row -->

</div>
<!-- /.container -->







            <div class="spe-cor">
    <div class="container">
        <h2>Brands <small>we use</small></h2><hr>
        <div class="row">
            <div id="slider-1" class="carousel carousel-by-item slide" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-4">
                            <img class="d-block img-fluid" src="{{asset('images\brands\amperes-pa-products.jpg')}}" alt="First slide" >
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-lg-2 col-md-3 col-sm-4 col-4">
                            <img class="d-block img-fluid" src="{{asset('images\brands\anviz-security.jpg')}}" alt="First slide">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-lg-2 col-md-3 col-sm-4 col-4">
                            <img class="d-block img-fluid" src="{{asset('images\brands\asenware-fire-alarm.jpg')}}" alt="First slide">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-lg-2 col-md-3 col-sm-4 col-4">
                            <img class="d-block img-fluid" src="{{asset('images\brands\aten-simply-better-connection.jpg')}}" alt="Second slide">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-lg-2 col-md-3 col-sm-4 col-4">
                            <img class="d-block img-fluid" src="{{asset('images\brands\avaya-ipbx-products.jpg')}}" alt="Third slide">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-lg-2 col-md-3 col-sm-4 col-4">
                            <img class="d-block img-fluid" src="{{asset('images\brands\axis-cctv-products.jpg')}}" alt="Third slide">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-lg-2 col-md-3 col-sm-4 col-4">
                            <img class="d-block img-fluid" src="{{asset('images\brands\dalite-rear-projection-screen.jpg')}}" alt="Third slide">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-lg-2 col-md-3 col-sm-4 col-4">
                            <img class="d-block img-fluid" src="{{asset('images\brands\epson-projectors.jpg')}}" alt="Third slide">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-lg-2 col-md-3 col-sm-4 col-4">
                            <img class="d-block img-fluid" src="{{asset('images\brands\extron-av-control-products.jpg')}}" alt="Third slide">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-lg-2 col-md-3 col-sm-4 col-4">
                            <img class="d-block img-fluid" src="{{asset('images\brands\grandview-projection-screen.jpg')}}" alt="Third slide">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-lg-2 col-md-3 col-sm-4 col-4">
                            <img class="d-block img-fluid" src="{{asset('images\brands\hid-access-control.jpg')}}" alt="Third slide">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-lg-2 col-md-3 col-sm-4 col-4">
                            <img class="d-block img-fluid" src="{{asset('images\brands\hikvision-cctv-products.jpg')}}" alt="Third slide">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-lg-2 col-md-3 col-sm-4 col-4">
                            <img class="d-block img-fluid" src="{{asset('images\brands\hochiki-fire-alarm.jpg')}}" alt="Third slide">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-lg-2 col-md-3 col-sm-4 col-4">
                            <img class="d-block img-fluid" src="{{asset('images\brands\honeywell-fire-alarm.jpg')}}" alt="Third slide">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-lg-2 col-md-3 col-sm-4 col-4">
                            <img class="d-block img-fluid" src="{{asset('images\brands\infosat-matv-products.jpg')}}" alt="Third slide">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-lg-2 col-md-3 col-sm-4 col-4">
                            <img class="d-block img-fluid" src="{{asset('images\brands\itc-pa-products.jpg')}}" alt="Third slide">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-lg-2 col-md-3 col-sm-4 col-4">
                            <img class="d-block img-fluid" src="{{asset('images\brands\jbl-by-harman.jpg')}}" alt="Third slide">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-lg-2 col-md-3 col-sm-4 col-4">
                            <img class="d-block img-fluid" src="{{asset('images\brands\king-gates-automations.jpg')}}" alt="Third slide">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-lg-2 col-md-3 col-sm-4 col-4">
                            <img class="d-block img-fluid" src="{{asset('images\brands\klarkteknik-signal-processing.jpg')}}" alt="Third slide">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-lg-2 col-md-3 col-sm-4 col-4">
                            <img class="d-block img-fluid" src="{{asset('images\brands\kramer-av-control-products.jpg')}}" alt="Third slide">
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="col-lg-2 col-md-3 col-sm-4 col-4">
                            <img class="d-block img-fluid" src="{{asset('images\brands\nec-pabx-products.jpg')}}" alt="Third slide">
                        </div>
                    </div>
                    
                    <div class="carousel-item">
                        <div class="col-lg-2 col-md-3 col-sm-4 col-4">
                            <img class="d-block img-fluid" src="{{asset('images\brands\nittan-fire-alarm.jpg')}}" alt="Third slide">
                        </div>
                    </div>
                    
                    <div class="carousel-item">
                        <div class="col-lg-2 col-md-3 col-sm-4 col-4">
                            <img class="d-block img-fluid" src="{{asset('images\brands\panasonic-pabx-products.jpg')}}" alt="Third slide">
                        </div>
                    </div>
                    
                    <div class="carousel-item">
                        <div class="col-lg-2 col-md-3 col-sm-4 col-4">
                            <img class="d-block img-fluid" src="{{asset('images\brands\panasonic-projectors.jpg')}}" alt="Third slide">
                        </div>
                    </div>
                    
                    <div class="carousel-item">
                        <div class="col-lg-2 col-md-3 col-sm-4 col-4">
                            <img class="d-block img-fluid" src="{{asset('images\brands\remaco-projector-screens.jpg')}}" alt="Third slide">
                        </div>
                    </div>
                    
                    <div class="carousel-item">
                        <div class="col-lg-2 col-md-3 col-sm-4 col-4">
                            <img class="d-block img-fluid" src="{{asset('images\brands\tannoy-av-speakers.jpg')}}" alt="Third slide">
                        </div>
                    </div>
                    
                    <div class="carousel-item">
                        <div class="col-lg-2 col-md-3 col-sm-4 col-4">
                            <img class="d-block img-fluid" src="{{asset('images\brands\televes-matv-products.jpg')}}" alt="Third slide">
                        </div>
                    </div>
                    
                    <div class="carousel-item">
                        <div class="col-lg-2 col-md-3 col-sm-4 col-4">
                            <img class="d-block img-fluid" src="{{asset('images\brands\toa-pa-products.jpg')}}" alt="Third slide">
                        </div>
                    </div>
                    
                    <div class="carousel-item">
                        <div class="col-lg-2 col-md-3 col-sm-4 col-4">
                            <img class="d-block img-fluid" src="{{asset('images\brands\unify-pabx-solutions.jpg')}}" alt="Third slide">
                        </div>
                    </div>
                    
                    <div class="carousel-item">
                        <div class="col-lg-2 col-md-3 col-sm-4 col-4">
                            <img class="d-block img-fluid" src="{{asset('images\brands\wisi-matv-products.jpg')}}" alt="Third slide">
                        </div>
                    </div>
                    
                    <div class="carousel-item">
                        <div class="col-lg-2 col-md-3 col-sm-4 col-4">
                            <img class="d-block img-fluid" src="{{asset('images\brands\work-pro-speakers.jpg')}}" alt="Third slide">
                        </div>
                    </div>
                    
                    <div class="carousel-item">
                        <div class="col-lg-2 col-md-3 col-sm-4 col-4">
                            <img class="d-block img-fluid" src="{{asset('images\brands\yamaha-mixing-console.jpg')}}" alt="Third slide">
                        </div>
                    </div>

                </div>
                <a class="carousel-control-prev" href="#slider-1" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#slider-1" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</div>

<br><hr>

@if(isset($AvProjects))
<div class="container">
    <div class="row">
		<div class="well">
        <h1 class="text-center"> Projects Reference </h1> <hr>
        <div class="list-group">
        @foreach($AvProjects as $AvProject)
            <a href="{{url('each_av_project/'. $AvProject->id )}}" target="_blank" class="list-group-item "> <br>
            <?php
                $project_images = json_decode($AvProject->project_images, true);
            ?>
                <div class="media col-md-3">
                    <figure class="pull-left">
                        <img class="media-object img-rounded img-responsive"  src="{{asset('assets/img/AvProjects/'.$project_images[0])}}" alt="placehold.it/350x250" >
                    </figure>
                </div>
                <div class="col-md-6">
                    <h4 class="list-group-item-heading"> {{$AvProject->company_name}} </h4> <br>
                    <p class="list-group-item-text">{{ \Illuminate\Support\Str::limit($AvProject->description, 250, $end='...') }} </p>   
                </div>
                <div class="col-md-3 text-center">
                   
                    <button type="button" class="btn btn-dark"> View More </button> 
                   
                </div>
            </a><br>
            @endforeach
         
        </div>
        </div>
	</div>
</div>

@endif

<script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
<script>
$(document).ready(function () {
    $('.nav-toggle').click(function () {
        var collapse_content_selector = $(this).attr('href');
        var toggle_switch = $(this);
        $(collapse_content_selector).toggle(function () {
            if ($(this).css('display') == 'none') {
                $("#description").show();
                toggle_switch.html('Read More');
            } else {
                $("#description").hide();
                toggle_switch.html('Read Less');
            }
        });
    });
});
</script>

<script>
function GetUnique(e) {
    var l = [],
        s = temp_c = [],
        t = ["col-md-1", "col-md-2", "col-md-3", "col-md-4", "col-md-6", "col-md-12", "col-sm-1", "col-sm-2", "col-sm-3", "col-sm-4", "col-sm-6", "col-sm-12", "col-lg-1", "col-lg-2", "col-lg-3", "col-lg-4", "col-lg-6", "col-lg-12", "col-xs-1", "col-xs-2", "col-xs-3", "col-xs-4", "col-xs-6", "col-xs-12", "col-xl-1", "col-xl-2", "col-xl-3", "col-xl-4", "col-xl-6", "col-xl-12"];
    $(e).each(function() {
        for (var l = $(e + " > div").attr("class").split(/\s+/), t = 0; t < l.length; t++) s.push(l[t])
    });
    for (var c = 0; c < s.length; c++) temp_c = s[c].split("-"), 2 == temp_c.length && (temp_c.push(""), temp_c[2] = temp_c[1], temp_c[1] = "xs", s[c] = temp_c.join("-")), -1 == $.inArray(s[c], l) && $.inArray(s[c], t) && l.push(s[c]);
    return l
}

function setcss(e, l, s) {
    for (var t = ["", "", "", "", "", ""], c = d = f = g = 0, r = [1200, 992, 768, 567, 0], o = [], a = 0; a < e.length; a++) {
        var i = e[a].split("-");
        if (3 == i.length) {
            switch (i[1]) {
                case "xl":
                    d = 0;
                    break;
                case "lg":
                    d = 1;
                    break;
                case "md":
                    d = 2;
                    break;
                case "sm":
                    d = 3;
                    break;
                case "xs":
                    d = 4
            }
            t[d] = i[2]
        }
    }
    for (var n = 0; n < t.length; n++)
        if ("" !== t[n]) {
            if (0 === c && (c = 12 / t[n]), f = 12 / t[n], g = 100 / f, a = s + " > .carousel-item.active.carousel-item-right," + s + " > .carousel-item.carousel-item-next {-webkit-transform: translate3d(" + g + "%, 0, 0);transform: translate3d(" + g + ", 0, 0);left: 0;}" + s + " > .carousel-item.active.carousel-item-left," + s + " > .carousel-item.carousel-item-prev {-webkit-transform: translate3d(-" + g + "%, 0, 0);transform: translate3d(-" + g + "%, 0, 0);left: 0;}" + s + " > .carousel-item.carousel-item-left, " + s + " > .carousel-item.carousel-item-prev.carousel-item-right, " + s + " > .carousel-item.active {-webkit-transform: translate3d(0, 0, 0);transform: translate3d(0, 0, 0);left: 0;}", f > 1) {
                for (k = 0; k < f - 1; k++) o.push(l + " .cloneditem-" + k);
                o.length && (a = a + o.join(",") + "{display: block;}"), o = []
            }
            0 !== r[n] && (a = "@media all and (min-width: " + r[n] + "px) {" + a + "}"), $("#slider-css").prepend(a)
        } $(l).each(function() {
        for (var e = $(this), l = 0; l < c - 1; l++)(e = e.next()).length || (e = $(this).siblings(":first")), e.children(":first-child").clone().addClass("cloneditem-" + l).appendTo($(this))
    })
}

//Use Different Slider IDs for multiple slider
$(document).ready(function() {
    var item = '#slider-1 .carousel-item';
    var item_inner = "#slider-1 .carousel-inner";
    classes = GetUnique(item);
    setcss(classes, item, item_inner);


    var item_1 = '#slider-2 .carousel-item';
    var item_inner_1 = "#slider-2 .carousel-inner";
    classes = GetUnique(item_1);
    setcss(classes, item_1, item_inner_1);
});
</script>


@endsection