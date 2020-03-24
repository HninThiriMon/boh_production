@extends('admin::layouts/master')
@section('admin::title','AV Products')
@section('admin::content')

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="{{asset('css/admin/product/av-product.css')}}">



            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						                   	<div class="breadcome-list">
                                <div class="row">
                                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                          <div class="breadcomb-wp">
                                            <div class="breadcomb-ctn">
                                               <h2> Audio & Visual Products </h2> <br>
                                               <div class="add-product">
                                                <a data-toggle="modal" data-target=".bd-example-modal-lg" class="add-multi-preview" href=""> Add </a>
                                               </div>
                                            </div>
                                          </div>
                                      </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       
            <div class="product-status mg-b-30">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="product-status-wrap">
                                <h4 style="color:green;"> List of Products ( Audio & Visual )</h4>
                                
                                <table>
                                    <tr>
                                        <th>Id.</th>
                                        <th>Image</th>
                                        <th>Solution Name</th>
                                        <th style="color:orange;"> Product Name </th>
                                        <th>Brand</th>
                                        <th>Price</th>
                                        <th>Speciation</th>
                                        <th>Setting</th>
                                    </tr>
                                    <?php $i = 0; ?>
                                    @if(isset($avProducts))
                                    @foreach($avProducts as $avProduct)
                                    <tr><?php $i++; $product_images = json_decode($avProduct->product_images, true); ?>
                                        <td width="5%">{{$i}}</td>
                                        <td width="10%"><img src="{{asset('assets/img/AvProducts/'.$product_images[0])}}" alt="" /></td>
                                        <td width="10%">{{$avProduct->solution_name}} 
                                        </td>
                                        <td width="10%" style="color:orange;">{{$avProduct->product_name}}</td>
                                        <td width="10%">{{$avProduct->brand_name}}</td>
                                        <td width="10%">{{$avProduct->price}}</td>
                                        <?php 
                                        $specifications = json_decode($avProduct->specification, true);
                                        ?>
                                        <td width="30%">
                                            @foreach ($specifications as $specification)
                                            {{ Illuminate\Support\Str::limit($specification,50,$end='...')}} ,<br>
                                            @endforeach
                                        </td>

                                        <td>
                                            <button data-toggle="modal" data-target=".edit-modal-lg" data-toggle="tooltip" onclick="updateAvProduct('{{$avProduct->id}}');"  id="category" title="Edit" class="pd-setting-ed multi-preview"><i class="fas fa-edit" aria-hidden="true"></i></button>
                                                                                        
                                            <button data-toggle="tooltip" title="Trash" class="pd-setting-ed" onclick="deleteProduct('{{$avProduct->id}}');" ><i class="fas fa-trash" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </table>
                                <div class="custom-pagination">
                                    <ul class="pagination">
                                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
  
 
    <!-- Start Create modal -->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-lg"></p> 
            <div class="modal-content">
                <div class="modal-header note">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h2 class="modal-title" id="exampleModalLongTitle"> Create New Product ( Audio & Visual )</h2>
                    
                </div>
                    <form action="{{url('boh/add_av_product')}}" method="post"  enctype="multipart/form-data" >
                        @csrf
                        <div class="modal-body">
                        
                                <div class="row">
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                <label for=""> Solution Name :</label>
                                                <select name="solution_name" required="" class="form-control">
                                                @if(isset($avSolutionNames))
                                                @foreach($avSolutionNames as $avSolutionName)
                                                <option value="{{$avSolutionName->name}}">{{$avSolutionName->name}}</option>
                                                @endforeach
                                                @endif
                                               </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for=""> Product Name :</label>
                                                    <input type="text" name="product_name" class="form-control" required/>
                                                </div>

                                                <div class="form-group">
                                                <label for=""> Brand Name :</label>
                                                <select name="brand_name" required="" class="form-control">
                                                @if(isset($brands))
                                                @foreach($brands as $brand)
                                                    <option value="{{$brand->name}}">{{$brand->name}}</option>
                                                @endforeach
                                                @endif
                                                </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for=""> (USD) Price : (number only)</label>
                                                    <input type="text" name="price" class="form-control" required/>
                                                </div>
                                        </div>

                                        <div class="col-md-6">
                                        <label for=""> Specification :</label>
                                        <div class="field_wrapper">
                                        <input type="text" class="form-control" name="specification[]" value=""/>
                                            <a href="javascript:void(0);" class="add_button" title="Add field">
                                            <i class="fas fa-plus-circle"></i></a>
                                        </div>
                                        </div>
                                        
                                </div>
                            
                                <div class="row">
                                <fieldset class="form-group">
                                     <a href="javascript:void(0)" onclick="$('#pro-image').click()">Upload Image</a> (Select at least two image with Ctrl+ ) 
                                     <input type="file" id="pro-image" name="product_images[]" style="display: none;" class="form-control" multiple>
                                 </fieldset>
                                 <div class="preview-images-zone">
                                     
                                 </div>
                                </div>
                        
                        </div>    
                        
                        <div class="modal-footer">
                            <input type="submit" value="Save" class="btn btnSubmit">
                            <button type="button" class="btn btnSubmit" data-dismiss="modal" aria-label="Close"
                            >Cancel</button>
                        </div>
                    </form>

            </div>
        </div>
    </div>
    <!-- End Create modal -->


    <!-- Start Update modal -->
    <div class="modal fade edit-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-lg"></p>
            <div class="modal-content">
                <div class="modal-header note">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h2 class="modal-title" id="exampleModalLongTitle"> Update Product ( Audio & Visual )</h2>
               </div>
                    <form action="{{url('boh/update_av_product')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                        <input type="hidden" id="edit_product_id" name="id">
                                <div class="row">
                                    <div class="col-md-6">
                                            <div class="form-group">
                                                <label for=""> Solution Name :</label>
                                                <input type="text" id="edit_solution_name" name="solution_name" class="form-control" placeholder="Title" value="" disabled/>
                                            
                                            </div>

                                            <div class="form-group">
                                                <label for=""> Product Name :</label>
                                                <input type="text" id="edit_product_name" name="product_name" class="form-control" required/>
                                            </div>

                                            <div class="form-group">
                                                <label for=""> Brand Name :</label>
                                                <input type="text" id="edit_brand_name" name="brand_name" class="form-control" required/>
                                            </div>

                                            <div class="form-group">
                                                <label for="">(USD/$) Price : (number only)</label>
                                                <input type="text" id="edit_price_name" name="price" class="form-control" required/>
                                            </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for=""> Specification :</label>
                                        <div class="update_field_wrapper">
                                            <input type="text" class="form-control" name="update_specification[]" id="edit_specification_name" value=""/>
                                            <a href="javascript:void(0);" class="update_add_button" title="Add field">
                                            <i class="fas fa-plus-circle"></i></a>
                                        </div>
                                    </div> 
                                </div>
                            
                                <div class="row">
                                <input type="hidden" name="deleteImage" id="deleteImage">
                                    <fieldset class="form-group">
                                        <a href="javascript:void(0)" onclick="$('#update-pro-image').click()">Upload Image</a> (Select at least two image with Ctrl+ )
                                        <input type="file" id="update-pro-image" name="product_images[]" style="display: none;" class="form-control" multiple />
                                    </fieldset>
                                    <div class="update-preview-images-zone">
                                        
                                    </div>

                                </div>
                        
                        </div>    
                        
                        <div class="modal-footer">
                            <input type="submit" value="Save" class="btn btnSubmit">
                            <button type="button" class="btn btnSubmit" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
    <!-- End Update modal -->           

<script src="{{asset('jquery.min.js')}}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="{{asset('js/admin/product/av-product.js')}}"></script>

<script>

var imageArray = new Array();
      $(document).on('click', '.image-cancel', function() {
          let no = $(this).data('no');
          var image = $(this).data('image');
          $(".preview-image.preview-show-"+no).remove();
          imageArray.push(image);
        $('#deleteImage').val(imageArray);

      });


    function updateAvProduct(id) {
        $.get( "{{url('boh/edit_av_product')}}", { id } )
        .done(function( data ) {
            $('.update_field_wrapper').empty();
        var specification_array = JSON.parse(data.specification);
        var count = 1;
        $.each(specification_array, function (index ,specification_arr) {
            var fieldHTML = '';
            if(count > 1)
            {
                fieldHTML = '<div><input type="text" name="update_specification[]" class="form-control" value="'+specification_arr+'" /><a href="javascript:void(0);" class="update_remove_button"><i class="fas fa-minus-circle"></i></a></div>';
            }
            else
            {
                fieldHTML = '<div><input type="text" name="update_specification[]" class="form-control" value="'+ specification_arr +'" /><a href="javascript:void(0);" class="update_add_button"  title="Add field"><i class="fas fa-plus-circle"></i></a></div>';
            }
            $('.update_field_wrapper').append(fieldHTML);
              count++;
        });
            var maxField = 10;
            var addButton = $('.update_add_button'); //Add button selector
            var wrapper = $('.update_field_wrapper');
            var fieldHTML1 = '<div><input type="text" name="update_specification[]" class="form-control" value=""/><a href="javascript:void(0);" class="update_remove_button"><i class="fas fa-minus-circle"></i></a></div>';
            var x = 1; //Initial field counter is 1
    
                //Once add button is clicked
            $(addButton).click(function(){
                //Check maximum number of input fields
                if(x < maxField){
                    x++; //Increment field counter
                    $(wrapper).append(fieldHTML1); //Add field html
                }
            });
           
            //Once remove button is clicked
            $(wrapper).on('click', '.update_remove_button', function(e){
                e.preventDefault();
                $(this).parent('div').remove(); //Remove field html
                x--; //Decrement field counter
            });


            $('.update-preview-images-zone').empty();
            imageArray = [];
            var product_images = JSON.parse(data.product_images);
            var num = 4;
            $.each(product_images, function (index ,product_images_arr) {
            var html = '';
            
            var html =  '<div class="preview-image preview-show-' + num + '">' +
                              '<div class="image-cancel" data-image="'+product_images_arr+'" data-no="' + num + '">x</div>' +
                              '<div class="image-zone"><img id="update-pro-img-' + num + '" src="../assets/img/AvProducts/' + product_images_arr + '"></div>' +
                              '<div class="tools-edit-image"><a href="javascript:void(0)" data-no="' + num + '" class="btn btn-light btn-edit-image">edit</a></div>' +
                              '</div>';

            $(".update-preview-images-zone").append(html);
                  num = num + 1;
               
        });
    document.getElementById('update-pro-image').addEventListener('change', updateReadImage, false);
    
  var num = 4;
  function updateReadImage() {
      if (window.File && window.FileList && window.FileReader) {
          var files = event.target.files; //FileList object
          var output = $(".update-preview-images-zone");

          for (let i = 0; i < files.length; i++) {
              var file = files[i];
              if (!file.type.match('image')) continue;
               var picReader = new FileReader();
              
              picReader.addEventListener('load', function (event) {
                  var picFile = event.target;
                  var html =  '<div class="preview-image preview-show-' + num + '">' +
                              '<div class="image-cancel" data-no="' + num + '">x</div>' +
                              '<div class="image-zone"><img id="update-pro-img-' + num + '" src="' + picFile.result + '"></div>' +
                              '<div class="tools-edit-image"><a href="javascript:void(0)" data-no="' + num + '" class="btn btn-light btn-edit-image">edit</a></div>' +
                              '</div>';

                  output.append(html);
                  num = num + 1;
              });

              picReader.readAsDataURL(file);
          }
           $("#pro-image").val('');
      } else {
          console.log('Browser not support');
      }
  }
            $('#edit_product_id').val(data.id);
            $('#edit_solution_name').val(data.solution_name);
            $('#edit_product_name').val(data.product_name);
            $('#edit_brand_name').val(data.brand_name);
            $('#edit_price_name').val(data.price);
          
          
         });
    };




    function deleteProduct(id){
        if (confirm('Are you sure want to delete this Product!')) {
            $.get( "{{url('boh/delete_av_product')}}",{ id } )
            .done(function( data ) {
                location.reload();
                alert("Successfully deleted");
            });
        } else {
            
        }
        
    }



</script>

@endsection        