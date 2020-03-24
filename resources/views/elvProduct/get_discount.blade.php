@extends('layouts/master')
@section('title','Discount')
@section('content')
<style>
  .hero {
    min-height: 30%;
    background: url('/images/products/discount_code.jpg') no-repeat fixed;
    background-size: 100%;
    position: relative;
    padding-bottom: 8%;
  }

/* .row{
    margin-top:40px;
    padding: 0 10px;
} */

.clickable{
    cursor: pointer;  
}

.panel-heading span {
	margin-top: -20px;
	font-size: 15px;
}
.panel {
    margin-bottom: 2px !important;
}
.features h3 {
      margin: 0 0 0 0 !important;
}

</style>

<div class="container">

<div class="row">
     <div class="col-md-6">
     <h2>Technical Expert Support</h2> <br>
    <p>BOH usually commit less than what can be done and usually resulted way beyond than committed, clients’ achievements are beyond their expectation. This is the fact that once a customer, they became client forever. This is the recipe of BOH’s services and it will be there forever.</p> <br>
    <p>Clients who are looking for highest quality services are the best suited with BOH.</p> <br>
			<div class="panel panel-success">
				<div class="panel-heading">
					<h3 class="panel-title"> Design with the emphathy</h3>
					<span class="pull-right clickable panel-collapsed"><i class="glyphicon glyphicon-chevron-up"></i></span>
				</div>
				<div class="panel-body">BOH try to sit in the shoes of customer and eyes the project from customers’ point of view and look after the best value out of allowable time and resource limit. Therefore, BOH’s service related products are always exceeding the customer’s expectations.</div>
			</div>
	
			<div class="panel panel-success">
				<div class="panel-heading">
					<h3 class="panel-title"> Highest possible technical solutions</h3>
					<span class="pull-right clickable panel-collapsed"><i class="glyphicon glyphicon-chevron-down"></i></span>
				</div>
				<div class="panel-body">Based on wide variety of experiences of BOH’s members, the designing of the systems is solely on the highest possible solutions available in the market. BOH always trying to bring in success to our clients by adding value to all the process it carried out</div>
			</div>

			<div class="panel panel-success">
				<div class="panel-heading">
					<h3 class="panel-title"> Maintenance oriented installation</h3>
					<span class="pull-right clickable panel-collapsed"><i class="glyphicon glyphicon-chevron-down"></i></span>
				</div>
				<div class="panel-body">All the solutions starting from design, supply and installation, BOH uses maintenance oriented perspective, making sure the products are able to be used for their full lifespan, so that both our clients and BOH itself will be happy by avoiding unnecessary sweats after completion</div>
			</div>
		
			<div class="panel panel-success">
				<div class="panel-heading">
                <h3 class="panel-title"> Highest efficiency and value guaranteed</h3>
					<span class="pull-right clickable panel-collapsed"><i class="glyphicon glyphicon-chevron-down"></i></span>
				</div>
				<div class="panel-body">Making sure all four aspects of project to run smoothly, the end results are always exceeding the plan results what we expected before beginning. BOH ensure to achieve the highest value out of time and efforts our clients and BOH members put into</div>
			</div>
    </div>
      

        <div class="col-md-6">
            <div class="well">
            <form action="{{url('get_discount')}}" method="post">
            @csrf
                    <div class="row">
                 
                        <div class="col-md-12">
                            <div class="form-group">
                            <label for="product">product *</label>
                                <input type="text" class="form-control" value="{{$elvProduct->product_name}}" required="required" disabled/>
                                <input type="hidden" name="product" value="{{$elvProduct->product_name}}">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">
                                    Name *</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter name" required="required" />
                            </div>
                        </div>   

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="email">
                                    Email Address * </label>
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                    </span>
                                    <input type="email" name="email" class="form-control" placeholder="Enter email" required="required" /></div>
                            </div>
                        </div> 

                        <div class="col-md-6">
                            <div class="form-group">   
                            <label for="phone">Phone Number *</label>
                                <input type="text" name="ph_no" class="form-control" placeholder="Enter Phone Number" required="required" />
                            </div>
                        </div>
                            
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="city">City *</label>
                                <input type="text" name="city" class="form-control" placeholder="Enter city" required="required" />
                            </div>
                        </div>
                                                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="company_name">
                                Company Name</label>
                                <input type="text" name="company_name" class="form-control" placeholder="Enter Your Company Name" required="required" />
                            </div>
                        </div>

                        <div class="col-md-6">
                                <div class="form-group">
                                <label for="brand">brand *</label>
                                    <input type="text" name="brand" class="form-control" value="{{$elvProduct->brand_name}}" required="required" disabled/>
                                    <input type="hidden" name="brand" value="{{$elvProduct->brand_name}}">
                                </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="quantity">Quantity</label>
                                <input type="text" name="quantity" class="form-control" placeholder="Enter city" required="required" />
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="message"> Inquiry Details * </label>
                                <textarea name="message" class="form-control" rows="12" cols="25" required="required"
                                placeholder="Inquiry Details..."></textarea>
                            </div>
                        </div>

                            <input type="submit" value="Get Discount" class="btn-dark pull-right myButton" />

                        </div>
            </form>
                    </div>
             
               

            </div>
        </div>
    </div>
      
</div><br><br>


<script src="{{asset('jquery.min.js')}}"></script>
<script>


$(document).on('click', '.panel-heading span.clickable', function(e){
    var $this = $(this);
	if(!$this.hasClass('panel-collapsed')) {
		$this.parents('.panel').find('.panel-body').slideUp();
		$this.addClass('panel-collapsed');
		$this.find('i').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
		
	} else {
		$this.parents('.panel').find('.panel-body').slideDown();
		$this.removeClass('panel-collapsed');
		$this.find('i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
		
	}
})
</script>
 
@endsection