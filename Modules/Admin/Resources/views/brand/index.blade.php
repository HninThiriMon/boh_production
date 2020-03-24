@extends('admin::layouts/master')
@section('admin::title','Brand')

@section('admin::content')

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

   #brand_pic{
      display: none;
     }

     .brand_btn{
       cursor: pointer;
    }

    #brand {
      width:210px;
      height:145px;
      /* margin-top:20px; */
   } 

   #edit_brand_pic{
      display: none;
     }

     .edit_brand_btn{
       cursor: pointer;
    }

    #edit_brand {
      width:210px;
      height:145px;
      /* margin-top:20px; */
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
                                              <h2> Brands </h2> <br>

                                              <div class="add-product">
                                               <a data-toggle="modal" data-target=".bd-example-modal-lg" href=""> Add </a>
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
                                <h4 style="color:green;">List of Brands</h4>
                                
                                <table>
                                    <tr>
                                        <th>Id.</th>
                                        <th>Logo (brand)</th>
                                        <th style="color:orange;"> Name </th>
                                        <th>Description</th>
                                        <th>Setting</th>
                                    </tr>
                                    <?php $i = 0; ?>
                                    @if(isset($brands))
                                    @foreach($brands as $brand)
                                    <tr> <?php $i++; ?>
                                        <td>{{$i}}</td>
                                        <td width="10%"> <img src="{{asset('assets/img/brands/'.$brand->brand_logo)}}" alt=""> </td>
                                        <td width="10%" style="color:orange;">{{$brand->name}} </td>
                                        <td width="30%">{{ \Illuminate\Support\Str::limit($brand->description,350,$end='...')}}</td>
                                        <td width="20%"></td>
                                        
                                        <td>
                                            <button data-toggle="modal" data-target=".bd-update-modal-lg" data-toggle="tooltip" onclick="updateBrand('{{$brand->id}}');" title="Edit" class="pd-setting-ed"><i class="fas fa-edit" aria-hidden="true"></i></button>
                                            
                                            <a href="{{url('boh/delete_brand',$brand->id)}}">
                                            <button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fas fa-trash" aria-hidden="true"></i></button></a>
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
                        <h2 class="modal-title" id="exampleModalLongTitle"> Add Brand</h2>
                    
                </div>
                    <form action="{{url('boh/add_brand')}}" method="post"  enctype="multipart/form-data" >
                        @csrf
                        <div class="modal-body">
                                <div class="row">
                                        <div class="col-md-6">
                                             <div class="form-group">
                                                    <label class="">
                                                        <img id="brand" src="http://placehold.it/200x150" >
                                                        <input id="brand_pic" name="brand_logo" class='pis' onchange="brand_URL(this);" type="file" required>
                                                    </label>
                                              </div>

                                              <div class="form-group">
                                                <label for=""> Brand Name :</label>
                                                    <input type="text" id="name" name="name" class="form-control" placeholder="Title" value="" required/>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for=""> Description :</label>
                                                <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                                            </div>
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
  <div class="modal fade bd-update-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-lg"></p>
            <div class="modal-content">
                <div class="modal-header note">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h2 class="modal-title" id="exampleModalLongTitle"> Add Brand</h2>
                </div>
                    <form action="{{url('boh/update_brand')}}" method="post"  enctype="multipart/form-data" >
                        @csrf
                        <input type="hidden" name="edit_b_id" id="edit_b_id" />
                        <div class="modal-body">
                                <div class="row">
                                        <div class="col-md-6">
                                             <div class="form-group">
                                                    <label class="">
                                                        <img id="edit_brand" src="http://placehold.it/200x150" >
                                                        <input id="edit_brand_pic" name="brand_logo" class='pis' onchange="edit_brand_URL(this);" type="file" required>
                                                    </label>
                                              </div>

                                              <div class="form-group">
                                                <label for=""> Brand Name :</label>
                                                    <input type="text" id="edit_name" name="name" class="form-control" placeholder="Title" value="" required/>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for=""> Description :</label>
                                                <textarea name="description" id="edit_description" cols="30" rows="10" class="form-control"></textarea>
                                            </div>
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
    <!-- End Update modal -->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script>

 // Start Create modal
   $('.brand_btn').bind("click" , function () {
              $('#brand_pic').click();
      });
    function brand_URL(input) {
              if (input.files && input.files[0]) {
                  var reader = new FileReader();
                 reader.onload = function (e) {
                      $('#brand')
                      .attr('src', e.target.result);
                  };
                  reader.readAsDataURL(input.files[0]);
              }
          }
      
 // End Create modal

 // Start Update modal

 function updateBrand(id) {
        $.get( "{{url('boh/edit_brand')}}", { id } )
        .done(function( data ) {
            $('#edit_b_id').val(data.id);
            $('#edit_name').val(data.name);
            $('#edit_description').val(data.description);
            var brand_logo = '../assets/img/brands/'+data.brand_logo;
            $('#edit_brand').attr('src',brand_logo);
           
        });
    };

    $('.edit_brand_btn').bind("click" , function () {
              $('#edit_brand_pic').click();
      });
    function edit_brand_URL(input) {
              if (input.files && input.files[0]) {
                  var reader = new FileReader();
                 reader.onload = function (e) {
                      $('#edit_brand')
                      .attr('src', e.target.result);
                  };
                  reader.readAsDataURL(input.files[0]);
              }
          }


    </script>

@endsection                              