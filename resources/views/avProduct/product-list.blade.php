@extends('layouts/master')
@section('title','product list')
@section('imgtext')

      <div class="s01">
      <form>
        <br>
         <div class="inner-form">
            <select class="input-field" name="" id="addCategory" required="required">
                <option value="Product"> &nbsp; Product &nbsp; </option>
                <option value="Brand"> &nbsp; Brand &nbsp; </option>
            </select>
          
          <div class="input-field first-wrap Product">
            <input id="ProductAutoComplete" class="product-name" type="text" placeholder="Search product" />
          </div>

          <div class="input-field first-wrap Brand">
            <input id="BrandAutoComplete" class="brand-name" type="text" placeholder="Search brand" />
          </div>
                
          <div class="input-field third-wrap Product">
            <div class="btn-search"  onclick="productSearch();"> &nbsp; Product Search </div>
          </div>

          <div class="input-field third-wrap Brand">
            <div class="btn-search"  onclick="brandSearch();"> &nbsp; &nbsp; Brand Search </div>
          </div>

        </div>
       </form>
    </div>
 
  
@endsection
@section('content')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link href="../css/web-view/product/search-bar.css" rel="stylesheet" />
<link rel="stylesheet" href="{{asset('css/web-view/product/av-product-list.css')}}">
@include('avProduct/product-sidebar')
<div class="container">
    <div id="product-filter">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('av_products_list')}}">All AV Product</a></li>
                        <li class="breadcrumb-item">Solution</li>
                        <li class="breadcrumb-item active" aria-current="">Brand || Price</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row solution-filter">
           
            <div class="col">
                <div class="row">
                @if(isset($avProducts))
                @foreach($avProducts as $avProduct)
                    <div class="col-12 col-md-6 col-lg-3">
                            <div class="product-grid2">
                            <div class="product-image2">
                            <?php
                                $product_images = json_decode($avProduct->product_images, true);
                            ?>
                            <a href="{{url('av_solution_product_detail',$avProduct->id)}}" target="_blank">
                            <img class="pic-1 img" src="{{asset('assets/img/AvProducts/'.$product_images[0])}}">
                            <img class="pic-2 img" src="{{asset('assets/img/AvProducts/'.$product_images[1])}}">
                            </a>
                                <div class="add-to-cart">
                                <a href="{{url('av_solution_product_detail',$avProduct->id)}}" target="_blank"><i class="fa fa-eye"> </i></a> &nbsp; &nbsp;
                                <a href="#"> <i class="fa fa-shopping-cart"></i>  </a>
                            </div>
                            </div>
                            <a href="{{url('av_solution_product_detail',$avProduct->id)}}" >
                                <div class="product-content">
                                    <h3 class="title">{{$avProduct->product_name}}</h3>
                                    $ {{$avProduct->price}} <br>
                                    <span class="price">{{$avProduct->brand_name}}</span>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
                @endif
                
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('jquery.min.js')}}"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>

function solutionFilter(name) 
    {
        $( ".solution-filter" ).empty();
        var list = "";
        var brand = "";
        var data = {
                    '_token' : "{{ csrf_token() }}",
                    'name' : name 
                    };
        $.post( "{{url('av_solution_product_search')}}", data)
        .done(function( data ) {
            for (var i = 0 ; i < data.avProduct.length; i++ ) 
            {
                    var product_name = data.avProduct[i].product_name!=null? data.avProduct[i].product_name : '';
                    var brand_name = data.avProduct[i].brand_name!=null? data.avProduct[i].brand_name : '';
                    var price = data.avProduct[i].price!=null? data.avProduct[i].price : '';
                    var image_arr = data.avProduct[i].product_images!=null? data.avProduct[i].product_images : '';
                    var id = data.avProduct[i].id!=null? data.avProduct[i].id : '';
                    var product_image = JSON.parse(image_arr);
                    var img_1 = '../assets/img/AvProducts/'+product_image[0] ;
                    var img_2 = '../assets/img/AvProducts/'+product_image[1] ;
                    list += '<div class="col-12 col-md-6 col-lg-3">'+
                                '<div class="product-grid2">'+
                                    '<div class="product-image2">'+
                                        '<a href="#"><img class="pic-1 img" src="'+img_1+'"><img class="pic-2 img" src="'+ img_2 +'"></a>'+
                                        '<div class="add-to-cart">'+
                                        '<i class="fa fa-eye"></i> &nbsp; &nbsp;'+
                                        '<i class="fa fa-shopping-cart"></i> </div>'+
                                    '</div>'+
                                    '<div class="product-content">'+
                                      '<h3 class="title"><a href="#">'+ product_name +'</a></h3> $ '+ price +' <br>'+
                                      '<span class="price">'+ brand_name +'</span>'+
                                    '</div>'+
                                '</div>'+
                            '</div>';
            }

            for (var i = 0 ; i < data.brands.length; i++ ) 
            {
                var name = data.brands[i].name!=null? data.brands[i].name : '';
                brand += '<li class="list-group-item"  data-='+name+' onclick="return brandFilter(\'' + data.solution_name + '\',\'' + name + '\')"><a href="#" > '+name+' </a></li>';
            }
            var price ='<div class="row"><div class="col"><div class="col-12 col-sm-3">'+
                            '<div class="card bg-light mb-3">'+
                                '<div class="card-header bg-dark text-white text-uppercase"> Brands </div>'+
                                '<ul class="list-group category_price" >'+ brand +
                                '</ul>'+
                            '</div>'+
                        '</div><div>'+
                        '<div class="col"><div class="b">'+ list +'</div></div></div>';
                    $('.solution-filter').append(price);
        });

    }

    $( document ).ready(function() {
        $('.Brand').hide();
        $('.Product').show();
       
    });

    $(function () {
        $("#addCategory").change(function () {
            if ($(this).val() == "Product") {
                $(".Brand").hide();
                $(".Product").show();

            }else if($(this).val() == "Brand") {
                $(".Product").hide();
                $(".Brand").show();
            }
        });
    });

    $( function() {

        $.get( "{{url('av_product_autocomplete')}}", function( data ) {
            var productArray = data;
            var dataProduct = [];
                for (var i = 0; i < productArray.length; i++) 
                    {
                    dataProduct[i] = productArray[i].product_name;
                    }
                $( "#ProductAutoComplete" ).autocomplete({
                        source: dataProduct
                    });
        });

        $.get( "{{url('av_brand_autocomplete')}}", function( data ) {
            var brandArray = data;
            var dataBrand = [];
                for (var i = 0; i < brandArray.length; i++) 
                    {
                        dataBrand[i] = brandArray[i].name;
                    }
                $( "#BrandAutoComplete" ).autocomplete({
                        source: dataBrand
                    });
        });

        
        
 	});

    function productSearch() 
    {
       var name = $('.product-name').val();
            $( "#product-filter" ).empty();
            var productlist = "";
            var row = "";
            var data = {
                    '_token' : "{{ csrf_token() }}",
                    'name' : name 
                    };
            $.post( "{{url('av_product_search')}}", data)
            .done(function( data ) {

                for (var i = 0 ; i < data.length; i++ ) {
                	var product_name = data[i].product_name!=null? data[i].product_name : '';
                    var specifi_arr = data[i].specification!=null? data[i].specification : '';
                    var specification = JSON.parse(specifi_arr);
                	var price = data[i].price!=null? data[i].price : '';
                	var id = data[i].id!=null? data[i].id : '';
                    var image_arr = data[i].product_images!=null? data[i].product_images : '';
                    var product_image = JSON.parse(image_arr);
                    var img_1 = '../assets/img/AvProducts/'+product_image[0] ;
                    var brand_name = data[i].brand_name!=null? data[i].brand_name : '';
                    var url = '{{ url("get_av_discount", ":id") }}';
                    url = url.replace('%3Aid', id);

                    row += '<tr>'+
                            '<td><img class="product-list-img" src="'+img_1+'" /> </td>'+
                            '<td>'+ product_name +'</td>'+
                            '<td>'+ brand_name +'</td>'+
                            '<td>'+ specification[0] +' , etc...</td>'+
                            '<td class="text-center"> $ '+ price +'</td>'+
                            '<td><a class="btn-sm btn-dark" href="'+url+'" target="_blank"> Get Discount </a></td>'+
                            '<td class="text-right"><button class="btn btn-sm btn-dark"><i class="fa fa-eye"></i> </button> </td>'+
                        '</tr>';
                }
   
                productlist = '<div class="col-12">'+
                                    '<div class="table-responsive">'+
                                        '<table class="table table-striped">'+
                                        '<thead>'+
                                            '<tr>'+
                                                '<th scope="col"> </th>'+
                                                '<th scope="col">Product</th>'+
                                                '<th scope="col">Brand</th>'+
                                                '<th scope="col">Speciation</th>'+
                                                '<th scope="col" class="text-center">List Price (USD)</th>'+
                                                '<th scope="col"> Discount</th>'+
                                                '<th scope="col" class="text-right">Detail</th>'+
                                            '</tr>'+
                                        '</thead>'+
                                    '<tbody>'+ row +
                                    '</tbody>'+
                                    '</table>'+
                                '</div>'+
                            '</div>';

                 $('#product-filter').append(productlist);
            }); 
           
        }
   
    function brandSearch() 
    {
        var name = $('.brand-name').val();
            $( "#product-filter" ).empty();
            var productlist = "";
            var row = "";
            var data = {
                    '_token' : "{{ csrf_token() }}",
                    'name' : name 
                    };
            $.post( "{{url('av_brand_search')}}", data)
            .done(function( data ) {

                for (var i = 0 ; i < data.length; i++ ) {
                	var product_name = data[i].product_name!=null? data[i].product_name : '';
                    var specifi_arr = data[i].specification!=null? data[i].specification : '';
                    var specification = JSON.parse(specifi_arr);
                	var price = data[i].price!=null? data[i].price : '';
                	var id = data[i].id!=null? data[i].id : '';
                    var image_arr = data[i].product_images!=null? data[i].product_images : '';
                    var product_image = JSON.parse(image_arr);
                    var img_1 = '../assets/img/AvProducts/'+product_image[0] ;
                    var brand_name = data[i].brand_name!=null? data[i].brand_name : '';
                    var url = '{{ url("get_av_discount", ":id") }}';
                    url = url.replace('%3Aid', id);

                    row += '<tr>'+
                            '<td><img class="product-list-img" src="'+img_1+'" /> </td>'+
                            '<td>'+ brand_name +'</td>'+
                            '<td>'+ product_name +'</td>'+
                            '<td>'+ specification[0] +' , etc...</td>'+
                            '<td class="text-center"> $ '+ price +'</td>'+
                            '<td><a class="btn-sm btn-dark" href="'+url+'" target="_blank"> Get Discount </a></td>'+
                            '<td class="text-right"><button class="btn btn-sm btn-dark"><i class="fa fa-eye"></i> </button> </td>'+
                        '</tr>';
                }
   
                productlist = '<div class="col-12">'+
                                    '<div class="table-responsive">'+
                                        '<table class="table table-striped">'+
                                        '<thead>'+
                                            '<tr>'+
                                                '<th scope="col"> </th>'+
                                                '<th scope="col">Product</th>'+
                                                '<th scope="col">Brand</th>'+
                                                '<th scope="col">Speciation</th>'+
                                                '<th scope="col" class="text-center">List Price (USD)</th>'+
                                                '<th scope="col"> Discount</th>'+
                                                '<th scope="col" class="text-right">Detail</th>'+
                                            '</tr>'+
                                        '</thead>'+
                                    '<tbody>'+ row +
                                    '</tbody>'+
                                    '</table>'+
                                '</div>'+
                            '</div>';

                 $('#product-filter').append(productlist);
            }); 
    }


        

   

    function brandFilter( solutionName , brand ) 
    { 
      
      $( ".b" ).empty();
        var brandFilterlist = "";
        var data = {
                    '_token' : "{{ csrf_token() }}",
                    'solutionName' : solutionName ,
                    'brand' : brand,
                    };
        $.post( "{{url('av_solution_brand_filter')}}", data)
            .done(function( data ) {
                for (var i = 0 ; i < data.length; i++ ) {
                    var product_name = data[i].product_name!=null? data[i].product_name : '';
                    var brand_name = data[i].brand_name!=null? data[i].brand_name : '';
                    var price = data[i].price!=null? data[i].price : '';
                    var image_arr = data[i].product_images!=null? data[i].product_images : '';
                    var id = data[i].id!=null? data[i].id : '';
                    var product_image = JSON.parse(image_arr);
                    var img_1 = '../assets/img/AvProducts/'+product_image[0] ;
                    var img_2 = '../assets/img/AvProducts/'+product_image[1] ;
                    brandFilterlist += '<div class="col-12 col-md-6 col-lg-3">'+
                                '<div class="product-grid2">'+
                                    '<div class="product-image2">'+
                                        '<a href="#"><img class="pic-1 img" src="'+img_1+'"><img class="pic-2 img" src="'+ img_2 +'"></a>'+
                                            '<div class="add-to-cart">'+
                                        '<i class="fa fa-eye"></i> &nbsp; &nbsp;'+
                                        '<i class="fa fa-shopping-cart"></i> </div>'+
                                    '</div>'+
                                    '<div class="product-content">'+
                                      '<h3 class="title"><a href="#">'+ product_name +'</a></h3> $ '+ price +' </br>'+
                                      '<span class="price">'+ brand_name +'</span>'+
                                    '</div>'+
                                '</div>'+
                            '</div>';
                        }
                        $('.b').append(brandFilterlist);
            });
    }

</script>

@endsection