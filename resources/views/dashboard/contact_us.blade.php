@extends('layouts/master')
@section('title','Contact BOH')
@section('content')
<style>
    .hero {
    min-height: 80%;
    background: url('/images/contact-us.jpg') no-repeat fixed;
    background-size: 100%;
    position: relative;
    padding-bottom: 8% !important;
  }

</style>
<style>
#snackbar {
  visibility: hidden;
  min-width: 250px;
  margin-left: -125px;
  background-color: green;
  color: #fff;
  text-align: center;
  border-radius: 2px;
  padding: 16px;
  position: fixed;
  z-index: 1;
  left: 80%;
  top: 12%;
  font-size: 17px;
}

#snackbar.show {
  visibility: visible;
  -webkit-animation: fadein 1s, fadeout 9s 9s;
  animation: fadein 1s, fadeout 9s 9s;
}

@-webkit-keyframes fadein {
  from {top: 0; opacity: 0;} 
  to {top: 12%; opacity: 1;}
}

@keyframes fadein {
  from {top: 0; opacity: 0;}
  to {top: 12%; opacity: 1;}
}

@-webkit-keyframes fadeout {
  from {top: 12%; opacity: 1;} 
  to {top: 0; opacity: 0;}
}

@keyframes fadeout {
  from {top: 12%; opacity: 1;}
  to {top: 0; opacity: 0;}
}


</style>

<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<div class="row text-center">

        <legend><span class="glyphicon glyphicon-globe"></span> Our office</legend>
                    <address class="col-md-4 center">
                        <strong>+95-09768 207455</strong><br>
                      Nat Sin Street #102, Kyee Myin Dine, Yangon<br>
                        <a href="mailto:#">tto@boh.com.mm</a>
                    </address>
                    
        </div><br><br>

  
</div>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15276.226107443292!2d96.11256177714651!3d16.823551614699515!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xebb8de8b2a0a4980!2sBOH!5e0!3m2!1sen!2smm!4v1581070641436!5m2!1sen!2smm" width="360" height="418" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
        </div>

        <div class="col-md-8">
            <div class="well">
                <form action="" id="emailSend" >
                 
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">
                                    Name</label>
                                <input type="text" name="full_name" class="form-control" id="full_name" placeholder="Enter name" required="required" />
                            </div>
                            <div class="form-group">
                                <label for="email">
                                    Email Address</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                    </span>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" required="required" /></div>
                            </div>

                            <div class="form-group">
                                <label for="company_name">
                                Company Name</label>
                                <input type="text" name="company_name" class="form-control" id="company_name" placeholder="Enter Your Company Name" required="required" />
                            </div>

                            <div class="form-group">                            
                                <label for="Solution">Solution</label>
                                <select class="form-control form-control-lg" name="solution" id="solution" required="required">
                                    <option value="">Choose Solution </option>
                                    <option value="Audio & Video Conferencing">Audio & Video Conferencing</option>
                                    <option value="Access Control & CCTV">Access Control & CCTV</option>
                                    <option value="Digital Signage">Digital Signage</option>
                                    <option value="Home Threater">Home Threater</option>
                                    <option value="MATV/SMATV/IPVT">MATV/SMATV/IPVT</option>
                                    <option value="Fire Alarm">Fire Alarm</option>
                                    <option value="PABX/IPBX/VOIP">PABX/IPBX/VOIP</option>
                                    <option value="Parking Guidance">Parking Guidance</option>
                                    <option value="Background Music & PA">Background Music & PA</option>
                                    <option value="Structured Cabling">Structured Cabling</option>
                                    <option value="Video Conferencing">Video Conferencing</option>
                                    <option value="iOT Business Solutions">iOT Business Solutions</option>
                                    
                                </select>
            
                            </div>

                            <div class="f/resources/views/dashboardy">City</label>
                                <input type="text" name="city" class="form-control" id="city" placeholder="Enter city" required="required" />
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">
                                    Message</label>
                                <textarea name="message" id="message" class="form-control" rows="12" cols="25" required="required"
                                placeholder="Enter Message ..."></textarea>
                            </div>
                            <div class="form-group">   
                            <label for="name">
                            Phone Number</label>
                                <input type="text" name="ph_no" class="form-control" id="ph_no" placeholder="Enter Phone Number" required="required" />
                            </div>
                       
                            <input type="submit" value="Send Message" class="btn-dark pull-right myButton" />
                           
                                          
                        </div>
                    </div>
                </form> 
               

            </div>
        </div>
    </div>
      
</div><br><br>


           
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-sm-6 col-md-6">
                    <div class="contact-info-block text-center">
                        <img src="images/contact/boh-via-viber.jpg" alt="banner-img" class="img-fluid">
                        <h4>Viber</h4>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-md-6">
                    <div class="contact-info-block text-center">
                        <img src="images/contact/boh-via-wechat.jpg" alt="banner-img" class="img-fluid">
                        <h4>WeChat</h4>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-md-6">
                    <div class="contact-info-block text-center">
                        <img src="images/contact/boh-via-line.jpg" alt="banner-img" class="img-fluid">
                        <h4>Line</h4>
                    </div>
                </div>
            </div>
        </div><br><br>

<div id="snackbar">Well done! Your message Send to Team BOH.</div>



<script>

   function myFunction() {
        var x = document.getElementById("snackbar");
        x.className = "show";
        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 60000);
    }


        $( '#emailSend' ).submit(function( e ) {
           
            $(".myButton").attr("disabled", true);
            myFunction();

            var full_name = $('#full_name').val();
            var email = $('#email').val();
            var solution = $('#solution option:selected').val();
            var company_name = $( "#company_name" ).val();
            var city = $( "#city" ).val();
            var message = $( "#message" ).val();
            var ph_no = $( "#ph_no" ).val();

            var data = {
                '_token' : "{{csrf_token()}}",
                'full_name' : full_name ,
                'email' : email ,
                'solution' : solution ,
                'company_name' : company_name ,
                'city' : city ,
                'message' : message ,
                'ph_no' : ph_no,
        };
        
        $.post( "{{url('email_send')}}", data)
            .done(function( data ) {
            location.reload(true);
           
            });
        
        e.preventDefault();
        });

    

</script>

@endsection