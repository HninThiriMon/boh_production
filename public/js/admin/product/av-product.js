
   
 //  Start Update modal 
    function updateSolution(id) {
        $.get( "{{url('boh/edit_solution')}}", { id } )
        .done(function( data ) {
            $('#edit_s_id').val(data.id);
            $('#edit_name').val(data.name);
            $('#edit_description').val(data.description);
            $('#edit_list_1').val(data.list_1);
            $('#edit_list_2').val(data.list_2);
            $('#edit_list_3').val(data.list_3);
            $('#edit_list_4').val(data.list_4);
            var main_image_e = '../assets/img/solutions/'+data.main_image;
            var image_1_e = '../assets/img/solutions/'+data.image_1;
            var image_2_e = '../assets/img/solutions/'+data.image_2;
            var image_3_e = '../assets/img/solutions/'+data.image_3;
            var image_4_e = '../assets/img/solutions/'+data.image_4;
            $('.edit_main_image').attr('src',main_image_e);
            $('.edit_image_1').attr('src',image_1_e);
            $('.edit_image_2').attr('src',image_2_e);
            $('.edit_image_3').attr('src',image_3_e);
            $('.edit_image_4').attr('src',image_4_e);
        });
    };

 //  End Update modal 




//  multifile preview 


// create model multifile preview 
$( ".add-multi-preview" ).click(function() {
       
            document.getElementById('pro-image').addEventListener('change', readImage, false);
            
            $(document).on('click', '.image-cancel', function() {
                let no = $(this).data('no');
                $(".preview-image.preview-show-"+no).remove();
            });
        });



        var num = 4;
        function readImage() {
            if (window.File && window.FileList && window.FileReader) {
                var files = event.target.files; //FileList object
                var output = $(".preview-images-zone");

                for (let i = 0; i < files.length; i++) {
                    var file = files[i];
                    if (!file.type.match('image')) continue;
                     var picReader = new FileReader();
                    
                    picReader.addEventListener('load', function (event) {
                        var picFile = event.target;
                        var html =  '<div class="preview-image preview-show-' + num + '">' +
                                    '<div class="image-cancel" data-no="' + num + '">x</div>' +
                                    '<div class="image-zone"><img id="pro-img-' + num + '" src="' + picFile.result + '"></div>' +
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

       


 // End create model multifile preview 



// start create model add plus category 
      

   $(document).ready(function(){
       var maxField = 10; //Input fields increment limitation
       var addButton = $('.add_button'); //Add button selector
       var wrapper = $('.field_wrapper'); //Input field wrapper
       var fieldHTML = '<div><input type="text" name="specification[]" class="form-control" value=""/><a href="javascript:void(0);" class="remove_button"><i class="fas fa-minus-circle"></a></div>'; //New input field html 
       var x = 1; //Initial field counter is 1
       
       //Once add button is clicked
       $(addButton).click(function(){
           //Check maximum number of input fields
           if(x < maxField){ 
               x++; //Increment field counter
               $(wrapper).append(fieldHTML); //Add field html
           }
       });
       
       //Once remove button is clicked
       $(wrapper).on('click', '.remove_button', function(e){
           e.preventDefault();
           $(this).parent('div').remove(); //Remove field html
           x--; //Decrement field counter
       });
   });
   
   
// End create model add plus category 
