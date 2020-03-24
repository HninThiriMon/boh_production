@extends('admin::layouts/master')
@section('admin::title','AV Projects')
@section('admin::content')

<!-- multi file upload preview -->

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="{{asset('css/admin/project/av-project.css')}}">
<!-- end multi file upload preview -->
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
                                              <h2> AV Projects </h2> <br>

                                              <div class="add-product">
                                               <a data-toggle="modal" data-target=".bd-example-modal-lg" id="add-multi-preview-image" href=""> Add </a>
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
                                <h4 style="color:green;">List of Projects ( AV )</h4>
                                
                                <table>
                                    <tr>
                                        <th>Id.</th>
                                        <th>Image</th>
                                        <th style="color:orange;">Project Name </th>
                                        <th>Company Name </th>
                                        <th style="color:yellow;">Solution Name </th>
                                        <th>City</th>
                                        <th>Awarded Date</th>
                                        <th>Description</th>
                                        <th>Setting</th>
                                    </tr>
                                    <?php $i=0; ?>
                                    @if(isset($avProjects))
                                    @foreach($avProjects as $avProject)
                                    <tr><?php $i++; $project_images = json_decode($avProject->project_images, true);  ?>
                                        <td width="3%">{{$i}}</td>
                                        <td width="7%"><img src="{{asset('assets/img/AvProjects/'.$project_images[0])}}" alt="" /></td>
                                        <td width="10%" style="color:orange;">{{$avProject->project_name}}</td>
                                        <td width="10%">{{$avProject->company_name}}</td>
                                        <td width="10%" style="color:yellow;">{{$avProject->solution_name}}</td>
                                        <td width="10%">{{$avProject->city}}</td>
                                        <td width="10%">{{$avProject->awarded_month}}{{$avProject->awarded_year}}</td>
                                        <td width="30%">{{\Illuminate\Support\Str::limit($avProject->description,350,$end='...')}}</td>
                                        <td>
                                            <button data-toggle="modal" data-target=".edit-modal-lg" data-toggle="tooltip" id="update-multi-preview-image" onclick="updateAvProject('{{$avProject->id}}');" title="Edit" class="pd-setting-ed"><i class="fas fa-edit" aria-hidden="true"></i></button>
                                            
                                            <!-- <a href="{{url('boh/delete_av_project',$avProject->id)}}"> -->
                                            <button data-toggle="tooltip" title="Trash" onclick="deleteProject('{{$avProject->id}}');" class="pd-setting-ed"><i class="fas fa-trash" aria-hidden="true"></i></button>
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
                        <h2 class="modal-title" id="exampleModalLongTitle"> Create New AV Project</h2>
                    
                </div>
                    <form action="{{url('boh/add_av_project')}}" method="post"  enctype="multipart/form-data" >
                        @csrf
                        <div class="modal-body">
                                <div class="row">
                                           
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for=""> Project Name :</label>
                                                <input type="text" name="project_name" class="form-control" placeholder="Title" value="" required/>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for=""> Company Name :</label>
                                                <input type="text" name="company_name" class="form-control" placeholder="Title" value="" required/>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for=""> Project Description :</label>
                                                <textarea name="description" cols="30" rows="10" class="form-control"></textarea>
                                            </div>
                                        </div> 
                                      

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for=""> Solution Name :</label>
                                                <select name="solution_name" required="" class="form-control">
                                                @foreach($avSolutionNames as $avSolutionName)
                                                <option value="{{$avSolutionName->id}}">{{$avSolutionName->name}}</option>
                                                @endforeach
                                               </select>
                                            </div>
                                        </div>
                                     
                                        <div class="col-md-3">
                                            <div class="form-group">
                                            <label for="awarded_month">Awarded Month :</label>
                                            <select class="form-control form-control-lg" name="awarded_month" required="required">
                                                <option value="">Choose Month </option>
                                                <option value="January">January</option>
                                                <option value="February">February</option>
                                                <option value="March">March</option>
                                                <option value="April">April</option>
                                                <option value="May">May</option>
                                                <option value="June">June</option>
                                                <option value="July">July</option>
                                                <option value="August">August</option>
                                                <option value="September">September</option>
                                                <option value="October">October</option>
                                                <option value="November">November</option>
                                                <option value="December">December</option>
                                             </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                            <label for="awarded_year">Awarded Year :</label>
                                            <select class="form-control form-control-lg" name="awarded_year" required="required">
                                                <option value="">Choose Year </option>
                            <option value="2013">2013</option><option value="2014">2014</option>
                            <option value="2015">2015</option><option value="2016">2016</option>
                            <option value="2017">2017</option><option value="2018">2018</option>
                            <option value="2019">2019</option><option value="2020">2020</option>
                            <option value="2021">2021</option><option value="2022">2022</option>
                            <option value="2023">2023</option><option value="2024">2024</option>
                            <option value="2025">2025</option><option value="2026">2026</option>
                            <option value="2027">2027</option><option value="2028">2028</option>
                            <option value="2029">2029</option><option value="2030">2030</option>
                            <option value="2031">2031</option><option value="2032">2032</option>
                            <option value="2033">2033</option><option value="2034">2034</option>
                            <option value="2035">2035</option><option value="2036">2036</option>
                            <option value="2037">2037</option><option value="2038">2038</option>
                            <option value="2039">2039</option><option value="2040">2040</option>
                            <option value="2041">2041</option><option value="2042">2042</option>
                            <option value="2043">2043</option><option value="2044">2044</option>
                            <option value="2045">2045</option><option value="2046">2046</option>
                            <option value="2047">2047</option><option value="2048">2048</option>
                            <option value="2049">2049</option><option value="2050">2050</option>
                            <option value="2051">2051</option><option value="2052">2052</option>
                            <option value="2053">2053</option><option value="2054">2054</option>
                            <option value="2055">2055</option><option value="2056">2056</option>
                            <option value="2057">2057</option><option value="2058">2058</option>
                            <option value="2059">2059</option><option value="2060">2060</option>
                            <option value="2061">2061</option><option value="2062">2062</option>
                            <option value="2063">2063</option><option value="2064">2064</option>
                            <option value="2065">2065</option><option value="2066">2066</option>
                            <option value="2067">2067</option><option value="2068">2068</option>
                            <option value="2069">2069</option><option value="2070">2070</option>
                            <option value="2071">2071</option><option value="2072">2072</option>
                            <option value="2073">2073</option><option value="2074">2074</option>
                            <option value="2075">2075</option><option value="2076">2076</option>
                            <option value="2077">2077</option><option value="2078">2078</option>
                            <option value="2079">2079</option><option value="2080">2080</option>
                            <option value="2081">2081</option><option value="2082">2082</option>
                                             </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for=""> City :</label>
                                                <input type="text" name="city" class="form-control" placeholder="Title" value="" required/>
                                            </div>
                                        </div>
                                        
                                </div>
                            
                            <div class="row">
                                 <fieldset class="form-group">
                                     <a href="javascript:void(0)" onclick="$('#pro-image').click()">Upload Image</a>
                                     <input type="file" id="pro-image" name="project_image[]" style="display: none;" class="form-control" multiple>
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
                        <h2 class="modal-title" id="exampleModalLongTitle"> Update AV Project</h2>
                    
                </div>
                    <form action="{{url('boh/update_av_project')}}" method="post" enctype="multipart/form-data" >
                        @csrf
                        <div class="modal-body">
                         <input type="hidden" id="edit_pj_id" name="id">
                                            
                                <div class="row">
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for=""> Project Name :</label>
                                                <input type="text" id="edit_project_name" name="project_name" class="form-control" placeholder="Title" value="" required/>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for=""> Company Name :</label>
                                                <input type="text" id="edit_company_name" name="company_name" class="form-control" placeholder="Title" value="" required/>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for=""> Project Description :</label>
                                                <textarea id="edit_description" name="description" cols="30" rows="10" class="form-control"></textarea>
                                            </div>
                                        </div>                                        

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for=""> Solution Name :</label>
                                                <input type="text" id="edit_solution_name" name="solution_name" class="form-control" placeholder="Title" value="" disabled/>
                                            </div>
                                        </div>
                                    
                                        <div class="col-md-3">
                                            <div class="form-group">
                                            <label for="awarded_month">Awarded Month :</label>
                                            <select class="form-control form-control-lg" name="awarded_month" id="edit_awarded_month"  required="required">
                                                <option value="">Choose Month </option>
                                                <option value="January">January</option>
                                                <option value="February">February</option>
                                                <option value="March">March</option>
                                                <option value="April">April</option>
                                                <option value="May">May</option>
                                                <option value="June">June</option>
                                                <option value="July">July</option>
                                                <option value="August">August</option>
                                                <option value="September">September</option>
                                                <option value="October">October</option>
                                                <option value="November">November</option>
                                                <option value="December">December</option>
                                             </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                            <label for="awarded_year">Awarded Year :</label>
                                            <select class="form-control form-control-lg" name="awarded_year" id="edit_awarded_year" required="required">
                                                <option value="">Choose Year </option>
                            <option value="2013">2013</option><option value="2014">2014</option>
                            <option value="2015">2015</option><option value="2016">2016</option>
                            <option value="2017">2017</option><option value="2018">2018</option>
                            <option value="2019">2019</option><option value="2020">2020</option>
                            <option value="2021">2021</option><option value="2022">2022</option>
                            <option value="2023">2023</option><option value="2024">2024</option>
                            <option value="2025">2025</option><option value="2026">2026</option>
                            <option value="2027">2027</option><option value="2028">2028</option>
                            <option value="2029">2029</option><option value="2030">2030</option>
                            <option value="2031">2031</option><option value="2032">2032</option>
                            <option value="2033">2033</option><option value="2034">2034</option>
                            <option value="2035">2035</option><option value="2036">2036</option>
                            <option value="2037">2037</option><option value="2038">2038</option>
                            <option value="2039">2039</option><option value="2040">2040</option>
                            <option value="2041">2041</option><option value="2042">2042</option>
                            <option value="2043">2043</option><option value="2044">2044</option>
                            <option value="2045">2045</option><option value="2046">2046</option>
                            <option value="2047">2047</option><option value="2048">2048</option>
                            <option value="2049">2049</option><option value="2050">2050</option>
                            <option value="2051">2051</option><option value="2052">2052</option>
                            <option value="2053">2053</option><option value="2054">2054</option>
                            <option value="2055">2055</option><option value="2056">2056</option>
                            <option value="2057">2057</option><option value="2058">2058</option>
                            <option value="2059">2059</option><option value="2060">2060</option>
                            <option value="2061">2061</option><option value="2062">2062</option>
                            <option value="2063">2063</option><option value="2064">2064</option>
                            <option value="2065">2065</option><option value="2066">2066</option>
                            <option value="2067">2067</option><option value="2068">2068</option>
                            <option value="2069">2069</option><option value="2070">2070</option>
                            <option value="2071">2071</option><option value="2072">2072</option>
                            <option value="2073">2073</option><option value="2074">2074</option>
                            <option value="2075">2075</option><option value="2076">2076</option>
                            <option value="2077">2077</option><option value="2078">2078</option>
                            <option value="2079">2079</option><option value="2080">2080</option>
                            <option value="2081">2081</option><option value="2082">2082</option>
                                             </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for=""> City :</label>
                                                <input type="text" id="edit_city" name="city" class="form-control" placeholder="Title" value="" required/>
                                            </div>
                                        </div>
                                        
                                </div>
                            
                                <div class="row">
                                <input type="hidden" name="deleteImage" id="deleteImage">
                                 <fieldset class="form-group">
                                     <a href="javascript:void(0)" onclick="$('#update-pro-image').click()">Upload Image</a>
                                     <input type="file" id="update-pro-image" name="project_image[]" style="display: none;" class="form-control" multiple>
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
    <script src="{{asset('js/admin/project/av-project.js')}}"></script>
    <script>
 // <!-- Start Update modal -->


 var imageArray = new Array();
      $(document).on('click', '.image-cancel', function() {
          let no = $(this).data('no');
          var image = $(this).data('image');
          $(".preview-image.preview-show-"+no).remove();
          imageArray.push(image);
        $('#deleteImage').val(imageArray);

      });


    function updateAvProject(id) {
        $.get( "{{url('boh/edit_av_project')}}", { id } )
        .done(function( data ) {
            $('.update-preview-images-zone').empty();
            imageArray = [];
            var project_images = JSON.parse(data.project_images);
            var num = 4;
            $.each(project_images, function (index ,project_images_arr) {
            var html = '';
            
            var html =  '<div class="preview-image preview-show-' + num + '">' +
                              '<div class="image-cancel" data-image="'+project_images_arr+'" data-no="' + num + '">x</div>' +
                              '<div class="image-zone"><img id="update-pro-img-' + num + '" src="../assets/img/AvProjects/' + project_images_arr + '"></div>' +
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
           // $("#pro-image").val('');
      } else {
          console.log('Browser not support');
      }
  }
            $('#edit_pj_id').val(data.id);
            $('#edit_project_name').val(data.project_name);
            $('#edit_company_name').val(data.company_name);
            $('#edit_solution_name').val(data.solution_name);
            $('#edit_city').val(data.city);
            $('#edit_awarded_month').val(data.awarded_month);
            $('#edit_awarded_year').val(data.awarded_year);
            $('#edit_description').val(data.description);
            var cover_image_e = '../assets/img/AvProjects/'+data.cover_image;
            $('#edit_cover_image').attr('src',cover_image_e);
          
        });
    };

 
    function deleteProject(id){
        if (confirm('Are you sure want to delete this Project!')) {
            $.get( "{{url('boh/delete_av_project')}}",{ id } )
            .done(function( data ) {
                location.reload();
                alert("Successfully deleted");
            });
        } else {
            
        }
        
    }

</script>

@endsection                              