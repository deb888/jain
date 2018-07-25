@extends('frontend.master')
@section('content')


<section class="inner-page-header wow fadeInDown">
	<div class="container"><h1>register <br><span></span></h1></div>
</section>



<section class="register-page wow fadeInDown">
	<div class="container">
    	<div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6">
            <h2>New User? <span><a href="{{ url('/register') }}">Register</a></span> Here</h2>
						<form role="form" method="POST" action="{{ route('frontloginregister') }}" id="form1" class="register-form">
										 {{ csrf_field() }}

							 <div class="form-group">

										 <input class="form-control" type="text" value="" name="first_name" id="first_name" placeholder="First Name"/>
								 </div>
							 	 <div class="form-group">

										 <input class="form-control" type="text" value="" name="last_name" id="last_name" placeholder="Last Name"/>
								 </div>
								 <div class="form-group">

										 <input class="form-control" type="text" value="" name="email" id="email" placeholder="Email"/>
								 </div>
								 <div class="form-group">

										 <input class="form-control" type="text" value="" name="phone_no" id="phone_no" placeholder="Phone Number"/>
								 </div>
                                                                  <div class="form-group">

										 <input class="form-control" type="text" value="" name="address" id="address" placeholder="Address"/>
								 </div>                
                                                                  <div class="form-group" id="statex">
								 </div>  
                                                                  <div class="form-group" id="cityx">
                                                                     <select name="city" class="form-control" id="slt_city">
                                                                         <option value="">city</option>
                                                                     </select>
								 </div>               
								 <div class="form-group">
									<input type="text" placeholder="Country" class="form-control" name="country" id="country" value="United States">
                                                                        <input type="hidden" id="country_id" value="231">
								 </div> 
								 <div class="form-group">

										 <input class="form-control" type="password" value="" name="password" id="password" placeholder="Password"/>
								 </div>
								 <div class="form-group">

										 <input class="form-control" type="password" value="" name="con_pass" id="con_pass" placeholder="Confirm Password"/>
								 </div>
	<input type="hidden" name="p_id" id="p_idx" value=""/>
								 <div class="form-group">
										 <input class="btn-submit" type="submit" value="Register" />
								 </div>
						 </form>
            </div>

            <div class="col-lg-6 -col-sm-6 col-md-6">
             <h2>Already Registered? Please <span><a href="{{ url('/login') }}">Login</a></span></h2>
            	<img src="{{ URL::asset('public/frontend/images') }}/register.png" alt="">
            </div>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.1/jquery.validate.min.js"></script>
<script>
	
	$(document).ready(function(){
		
		var country_id=$('#country_id').val();
			token = $('meta[name="csrf-token"]').attr('content');
			urlx='{{ route('registerajax.post')}}',
		$.ajax({
		type:'POST',
		headers: {'X-CSRF-TOKEN': token},
		url:urlx,
		data:'country_id='+country_id,

		success:function(msg){
			$('#statex').html(msg);

		}   
});

$('body').on('change', '#slt_sta', function () {

var city_id = this.value;
             token = $('meta[name="csrf-token"]').attr('content');
	     urlx='{{ route('registerajaxcity.post')}}',
		$.ajax({
		type:'POST',
		headers: {'X-CSRF-TOKEN': token},
		url:urlx,
		data:'city_id='+city_id,

		success:function(msg){
			$('#cityx').html(msg);

		}
});
})
		
	});

	</script>




@stop()
