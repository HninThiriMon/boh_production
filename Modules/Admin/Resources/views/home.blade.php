
@extends('admin::layouts/master')
@section('admin::title','Solutions')

@section('admin::content')
<style>
  .service {
            width:200px; /* you can use % */
            height: 150px;
        }
    .cover {
        width:400px; /* you can use % */
        height: 220px;
    }

    .list_cover{
      width:400px; /* you can use % */
      height: 150px;
    }

</style>

            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <?php
                          use App\HomeCover;
                          $h_cover = HomeCover::all()->last();
                          ?>
							              <div class="breadcome-list">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                          <div class="breadcomb-wp">
                                           <div class="breadcomb-ctn">
                                              <h2>Home page cover Image </h2> <br>
                                             <div class="add-product">
                                               <a data-toggle="modal" data-target="#HomeCoverModal"> Change </a> <br> <br>
                                              <img src="{{asset('images/home/home_cover/'.$h_cover->home_cover)}}" class="cover" >
                                                  
                                             </div>
                                           </div>
                                          
                                          </div>
                                    </div>
                                   

                                </div>
                            </div>

                            <div class="breadcome-list">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                          <div class="breadcomb-wp">
                                           <div class="breadcomb-ctn">
                                              <h2>design service Image </h2> <br>

                                             <div class="add-product">
                                               <a data-toggle="modal" data-target="#DesignServiceModal"> Change </a> <br> <br>
                                              <img src="{{asset('images/home/design_service.jpg')}}" class="service" >
                                                  
                                             </div>
                                           </div>
                                          
                                          </div>
                                    </div>

                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                          <div class="breadcomb-wp">
                                           <div class="breadcomb-ctn">
                                              <h2>Supply service Image </h2> <br>

                                             <div class="add-product">
                                               <a data-toggle="modal" data-target="#SupplyServiceModal"> Change </a> <br> <br>
                                              <img src="{{asset('images/home/supply_service.jpg')}}" class="service" >
                                                  
                                             </div>
                                           </div>
                                          
                                          </div>
                                    </div>

                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                          <div class="breadcomb-wp">
                                           <div class="breadcomb-ctn">
                                              <h2>Install service Image </h2> <br>

                                             <div class="add-product">
                                               <a data-toggle="modal" data-target="#InstallServiceModal"> Change </a> <br> <br>
                                              <img src="{{asset('images/home/install_service.jpg')}}" class="service" >
                                                  
                                             </div>
                                           </div>
                                          
                                          </div>
                                    </div>

                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                          <div class="breadcomb-wp">
                                           <div class="breadcomb-ctn">
                                              <h2>Maintain service Image </h2> <br>

                                             <div class="add-product">
                                               <a data-toggle="modal" data-target="#MaintainServiceModal"> Change </a> <br> <br>
                                              <img src="{{asset('images/home/maintain_service.jpg')}}" class="service" >
                                                 
                                             </div>
                                           </div>
                                          </div>
                                    </div>
                                </div>
                            </div>

                            <div class="breadcome-list">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                          <div class="breadcomb-wp">
                                           <div class="breadcomb-ctn">
                                              <h2>Solutions list cover Image</h2> <br>

                                             <div class="add-product">
                                               <a data-toggle="modal" data-target="#HomeCoverModal"> Change </a> <br> <br>
                                              <img src="{{asset('images/home/cover.jpg')}}" class="list_cover" >
                                             </div>
                                           </div>
                                          
                                          </div>
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                          <div class="breadcomb-wp">
                                           <div class="breadcomb-ctn">
                                              <h2>Projects list cover Image</h2> <br>

                                             <div class="add-product">
                                               <a data-toggle="modal" data-target="#HomeCoverModal"> Change </a> <br> <br>
                                              <img src="{{asset('images/home/cover.jpg')}}" class="list_cover" >
                                                  
                                             </div>
                                           </div>
                                          
                                          </div>
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                          <div class="breadcomb-wp">
                                           <div class="breadcomb-ctn">
                                              <h2>Products list cover Image</h2> <br>
                                             <div class="add-product">
                                               <a data-toggle="modal" data-target="#HomeCoverModal"> Change </a> <br> <br>
                                              <img src="{{asset('images/home/cover.jpg')}}" class="list_cover" >
                                             </div>
                                           </div>
                                          
                                          </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        </div>
                    </div>
                </div>must
            </div>

           
							                 
                   





<!-- Modal for Home Cover -->
<div class="modal fade" id="HomeCoverModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">If you want to change home page Cover</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{url('boh/update_home_cover')}}" method="post" enctype="multipart/form-data">
         @csrf 
      <div class="modal-body">
       <input type="file" name="home_cover">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- End Modal for Home Cover -->

<!-- Modal for Update Design Service Photo  -->
<div class="modal fade" id="DesignServiceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">If you want to change Design Service Photo</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{url('boh/update_design_s_p')}}" method="post" enctype="multipart/form-data">
         @csrf 
      <div class="modal-body">
       <input type="file" name="design_s_p">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- End Modal for Update Design Service Photo  -->

<!-- Modal for Update Supply Service Photo  -->
<div class="modal fade" id="SupplyServiceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">If you want to change Supply Service Photo</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{url('boh/update_supply_s_p')}}" method="post" enctype="multipart/form-data">
         @csrf 
      <div class="modal-body">
       <input type="file" name="supply_s_p">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- End Modal for Update Supply Service Photo  -->


<!-- Modal for Update Install Service Photo  -->
<div class="modal fade" id="InstallServiceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">If you want to change Install Service Photo</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{url('boh/update_install_s_p')}}" method="post" enctype="multipart/form-data">
         @csrf 
      <div class="modal-body">
       <input type="file" name="install_s_p">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- End Modal for Update Install Service Photo  -->


<!-- Modal for Update Maintain Service Photo -->
<div class="modal fade" id="MaintainServiceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">If you want to change Maintain Service Photo</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{url('boh/update_maintain_s_p')}}" method="post" enctype="multipart/form-data">
         @csrf 
      <div class="modal-body">
       <input type="file" name="maintain_s_p">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- End Modal for Update Maintain Service Photo  -->


   
@endsection                              