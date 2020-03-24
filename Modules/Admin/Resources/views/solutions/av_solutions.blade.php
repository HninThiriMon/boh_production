@extends('admin::layouts/master')
@section('admin::title','AV Solutions')
@section('admin::content')
<link rel="stylesheet" href="{{asset('css/admin/solution/av-solution.css')}}">
<style>
.note
{
    text-align: center;
    height: 80px;
    background: -webkit-linear-gradient(left, #0072ff, #8811c5);
    color: #fff;
    font-weight: bold;
    line-height: 80px;
}
.form-content
{
    padding: 5%;
    border: 1px solid #ced4da;
    background-color: #fff;
    margin-bottom: 2%;
    
}
.form-control{
    /* border-radius:1.5rem; */
    /* color: #333 !important; */
}
.btnSubmit
{
    float:right;
    border:none;
    border-radius:1.5rem;
    padding: 1%;
    width: 20%;
    cursor: pointer;
    background: -webkit-linear-gradient(left, #0072ff, #8811c5);
    color: #fff;
}
</style>  
           <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							                    <div class="breadcome-list">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                          <div class="breadcomb-wp">
                                           <div class="breadcomb-ctn">
                                              <h2> Audio & Visual Solutions </h2> <br>
                                              <div class="add-product">
                                               <a data-toggle="modal" data-target=".bd-example-modal-lg" href="" id="create-list"> Add </a>
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
                                <h4 style="color:green;">List of Solutions ( Audio & Visual )</h4>
                                
                                <table>
                                    <tr>
                                        <th>Id.</th>
                                        <th>Image</th>
                                        <th style="color:orange;"> Name </th>
                                        <th>Description</th>
                                        <th>List </th>
                                        
                                        <th>Setting</th>
                                    </tr>
                                    <?php $i=0; ?>
                                    @if(isset($solutions))
                                    @foreach($solutions as $solution)
                                    <tr><?php $i++; ?>
                                        <td width="3%">{{$i}}</td>
                                        <td width="10%"><img src="{{asset('assets/img/AvSolutions/'.$solution->main_image)}}" alt="" /></td>
                                        <td width="10%" style="color:orange;"> {{$solution->name}} 
                                        </td>
                                        <td width="30%">{{ Illuminate\Support\Str::limit($solution->description,350,$end='...')}}</td>
                                        @if(isset($solution->list))

                                        <?php $lists = json_decode($solution->list, true); ?>
                                        <td width="30%">
                                        @foreach($lists as $list)
                                            {{ Illuminate\Support\Str::limit($list,50,$end='...')}} , <br>
                                        @endforeach
                                        </td>
                                        @endif
                                        <td>
                                        <button data-toggle="modal" data-target=".edit-modal-lg" data-toggle="tooltip" id="update-list" onclick="updateSolution('{{$solution->id}}');" title="Edit" class="pd-setting-ed"><i class="fas fa-edit" aria-hidden="true"></i></button>
                                            
                                            <!-- <a href="{{url('boh/delete_av_solution',$solution->id)}}"> -->
                                            <button data-toggle="tooltip" onclick="deleteSolution('{{$solution->id}}');" title="Trash" class="pd-setting-ed"><i class="fas fa-trash" aria-hidden="true"></i></button>
                                            <!-- </a> -->
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
          </div>


    <!-- Start Create modal -->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-lg"></p> 
            <div class="modal-content">
                <div class="modal-header note">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h2 class="modal-title" id="exampleModalLongTitle"> Create New Solution</h2>
                    
                </div>
                    <form action="{{url('boh/add_av_solution')}}" method="post"  enctype="multipart/form-data" >
                        @csrf
                        <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                            <label class="">Cover Image<i class="fas fa-star-of-life" style="color:red;"></i>
                                <img id="cover_image" src="http://placehold.it/880x200" >
                                <input id="cover_imagepic" name="cover_image" onchange="cover_imageURL(this);" type="file" required>
                            </label>
                            </div>
                        </div>                

                                <div class="row">
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                <label for="">Solution Name<i class="fas fa-star-of-life" style="color:red;"></i></label>
                                                    <input type="text" id="name" name="name" class="form-control" placeholder="Title" value="" required/>
                                                </div>
                                                    <label class="">Main Image<i class="fas fa-star-of-life" style="color:red;"></i>
                                                        <img id="main_image" src="http://placehold.it/400x300" >
                                                        <input id="main_imagepic" name="main_image" class='pis' onchange="main_imageURL(this);" type="file" required>
                                                    </label>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Solution Description<i class="fas fa-star-of-life" style="color:red;"></i></label>
                                                <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                                            </div>
                                        </div> 

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for=""> If you want to add ( List ) </label>
                                                <div class="field_wrapper">
                                                <input type="text" class="form-control" name="list[]" value=""/>
                                                    <a href="javascript:void(0);" class="add_button" title="Add field">
                                                    <i class="fas fa-plus-circle"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        
                                </div>
                            
                                <div class="row">
                                    <div class="col-md-3">
                                    <label class="">Image<i class="fas fa-star-of-life" style="color:red;"></i>
                                        <img id="image_1" src="http://placehold.it/500x300" >
                                        <input id="image_1pic" class='pis' name="image_1" onchange="image_1URL(this);" type="file" required >
                                    </label>
                                    </div>
                                    <div class="col-md-3">
                                    <label class="">Image<i class="fas fa-star-of-life" style="color:red;"></i>
                                        <img id="image_2" src="http://placehold.it/500x300" >
                                        <input id="image_2pic" class='pis' name="image_2" onchange="image_2URL(this);" type="file" required >
                                    </label>
                                    </div>
                                    <div class="col-md-3">
                                    <label class="">Image<i class="fas fa-star-of-life" style="color:red;"></i>
                                        <img id="image_3" src="http://placehold.it/500x300" >
                                        <input id="image_3pic" class='pis' name="image_3" onchange="image_3URL(this);" type="file" required >
                                    </label>
                                    </div>
                                    <div class="col-md-3">
                                    <label class="">Image<i class="fas fa-star-of-life" style="color:red;"></i>
                                        <img id="image_4" src="http://placehold.it/500x300" >
                                        <input id="image_4pic" class='pis' name="image_4" onchange="image_4URL(this);" type="file" required >
                                    </label>
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
                        <h2 class="modal-title" id="exampleModalLongTitle"> Update Solution</h2>
                    
                </div>
                    <form action="{{url('boh/update_av_solution')}}" method="post" enctype="multipart/form-data" >
                        @csrf
                        <div class="modal-body">
                        
                                <div class="row">
                                    <div class="col-md-12">
                                    <label class="">
                                        <img id="edit_cover_image" src="http://placehold.it/880x200" >
                                        <input id="edit_cover_imagepic" name="cover_image" onchange="edit_cover_imageURL(this);" type="file" />
                                    </label>
                                    </div>
                                </div>   

                                <div class="row">
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                <input type="hidden" name="id" id="edit_s_id">
                                                    <label for=""> Solution Name :</label>
                                                    <input type="text" id="edit_name" name="name" class="form-control" placeholder="Title" value="" required />
                                                </div>
                                                    <label class="">
                                                        <img id="edit_main_image" src="http://placehold.it/750x500" >
                                                        <input id="edit_main_imagepic" name="main_image" class='pis' onchange="edit_main_imageURL(this);" type="file" />
                                                    </label>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for=""> Solution Description :</label>
                                                <textarea name="description" id="edit_description" cols="30" rows="10" class="form-control" required ></textarea>
                                            </div>
                                        </div> 

                                        <div class="col-md-6">
                                            <div class="form-group">

                                            <label for=""> If you want to add ( List ) </label>
                                            <input type="hidden" id="count" name="hiddenfieldcount">
                                                <div class="update_field_wrapper">
                                                <!-- <input type="text" class="form-control" name="update_list[]" value="" />
                                                    <a href="javascript:void(0);" class="update_add_button" title="Add field">
                                                    <i class="fas fa-plus-circle"></i></a> -->
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            
                                <div class="row">
                                    <div class="col-md-3">
                                    <label class="">
                                        <img id="edit_image_1" src="http://placehold.it/500x300" >
                                        <input id="edit_image_1pic" class='pis' name="image_1" onchange="edit_image_1URL(this);" type="file" />
                                    </label>
                                    </div>
                                    <div class="col-md-3">
                                    <label class="">
                                        <img id="edit_image_2" src="http://placehold.it/500x300" >
                                        <input id="edit_image_2pic" class='pis' name="image_2" onchange="edit_image_2URL(this);" type="file" />
                                    </label>
                                    </div>
                                    <div class="col-md-3">
                                    <label class="">
                                        <img id="edit_image_3" src="http://placehold.it/500x300" >
                                        <input id="edit_image_3pic" class='pis' name="image_3" onchange="edit_image_3URL(this);" type="file" />
                                    </label>
                                    </div>
                                    <div class="col-md-3">
                                    <label class="">
                                        <img id="edit_image_4" src="http://placehold.it/500x300" >
                                        <input id="edit_image_4pic" class='pis' name="image_4" onchange="edit_image_4URL(this);" type="file" />
                                    </label>
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
<script src="{{asset('js/admin/solution/av-solution.js')}}"></script>
<script>
  $('.cover_imagebtn').bind("click" , function () {
            $('#cover_imagepic').click();
    });
  function cover_imageURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
               reader.onload = function (e) {
                    $('#cover_image')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    $('.main_imagebtn').bind("click" , function () {
            $('#main_imagepic').click();
    });
  function main_imageURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
               reader.onload = function (e) {
                    $('#main_image')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

    $('.image_1btn').bind("click" , function () {
        $('#image_1pic').click();
    });
   function image_1URL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#image_1')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

    $('.image_2btn').bind("click" , function () {
        $('#image_2pic').click();
    });
   function image_2URL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#image_2')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

    $('.image_3btn').bind("click" , function () {
        $('#image_3pic').click();
    });
   function image_3URL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#image_3')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

    $('.image_4btn').bind("click" , function () {
        $('#image_4pic').click();
    });
   function image_4URL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#image_4')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
  
 // <!-- End Create modal -->

 // <!-- Start Update modal -->
    function updateSolution(id) {
        $.get( "{{url('boh/edit_av_solution')}}", { id } )
        .done(function( data ) {
            $('.update_field_wrapper').empty();
        var list_array = JSON.parse(data.list);
        var count = 1;
        $.each(list_array, function (index ,list_arr) {
            var fieldHTML = '';
            if(count > 1)
            {
                fieldHTML = '<div><input type="text" name="update_list[]" class="form-control" value="'+list_arr+'" /><a href="javascript:void(0);" class="update_remove_button"><i class="fas fa-minus-circle"></i></a></div>';
            }
            else
            {
                fieldHTML = '<div><input type="text" name="update_list[]" class="form-control" value="'+ list_arr +'" /><a href="javascript:void(0);" class="update_add_button"  title="Add field"><i class="fas fa-plus-circle"></i></a></div>';
            }
            $('.update_field_wrapper').append(fieldHTML);
              count++;
        });
            var maxField = 10;
            var addButton = $('.update_add_button'); //Add button selector
            var wrapper = $('.update_field_wrapper');
            var fieldHTML1 = '<div><input type="text" name="update_list[]" class="form-control" value=""/><a href="javascript:void(0);" class="update_remove_button"><i class="fas fa-minus-circle"></i></a></div>';
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
            $('#edit_s_id').val(data.id);
            $('#edit_name').val(data.name);
            $('#edit_description').val(data.description);
            var cover_image_e = '../assets/img/AvSolutions/'+data.cover_image;
            var main_image_e = '../assets/img/AvSolutions/'+data.main_image;
            var image_1_e = '../assets/img/AvSolutions/'+data.image_1;
            var image_2_e = '../assets/img/AvSolutions/'+data.image_2;
            var image_3_e = '../assets/img/AvSolutions/'+data.image_3;
            var image_4_e = '../assets/img/AvSolutions/'+data.image_4;
            $('#edit_cover_image').attr('src',cover_image_e);
            $('#edit_main_image').attr('src',main_image_e);
            $('#edit_image_1').attr('src',image_1_e);
            $('#edit_image_2').attr('src',image_2_e);
            $('#edit_image_3').attr('src',image_3_e);
            $('#edit_image_4').attr('src',image_4_e);
        });
    };

    $('.edit_cover_imagebtn').bind("click" , function () {
            $('#edit_cover_imagepic').click();
    });
  function edit_cover_imageURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#edit_cover_image')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

    $('.edit_main_imagebtn').bind("click" , function () {
            $('#edit_main_imagepic').click();
    });
  function edit_main_imageURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#edit_main_image')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

    $('.edit_image_1btn').bind("click" , function () {
        $('#edit_image_1pic').click();
    });
   function edit_image_1URL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#edit_image_1')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }


    $('.edit_image_2btn').bind("click" , function () {
        $('#edit_image_2pic').click();
    });
 
  function edit_image_2URL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#edit_image_2')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

    $('.edit_image_3btn').bind("click" , function () {
        $('#edit_image_3pic').click();
    });
 
  function edit_image_3URL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#edit_image_3')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

    $('.edit_image_4btn').bind("click" , function () {
        $('#edit_image_4pic').click();
    });
 
  function edit_image_4URL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#edit_image_4')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
     
 // <!-- End Update modal -->


    function deleteSolution(id){
        if (confirm('Are you sure want to delete this Solution!')) {
            $.get( "{{url('boh/delete_av_solution')}}",{ id } )
            .done(function( data ) {
                location.reload();
                alert("Successfully deleted");
            });
        } else {
            
        }
        
    }

</script>

@endsection                              