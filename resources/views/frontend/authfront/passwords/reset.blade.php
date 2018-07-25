@extends('frontend.master')

@section('content')
<!--<section class="inner-page-banner">
	<img src="{{ URL::asset('public/frontend/images') }}/login-pg-title-bg.jpg" alt="">
	<div class="container">
    	<div class="row page-banner-txt">
        	<h1>Reset Password</h1>
        </div>
    </div>
</section>


<section class="inrpgsec">
	<div class="container">
    	<div class="row">
        	<div class="col-md-6 col-md-offset-3 text-center">
            	<h2>Reset Password</h2>
                <p>Please enter a new password to reset it.</p>
            	<form class="form-horizontal" role="form" method="POST" action="{{ url('/frontresetpassword') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ Session::get('token')}}">
					<div class="form-group">
                        <input class="form-control" type="text" value="" placeholder="Enter Your Email" name="email" value="{{ $email or old('email') }}"/>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" value="" placeholder="Enter New Password" name="password"/>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" value="" placeholder="Confirm New Password" name="password_confirmation"/>
						 @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                    </div>
					<div class="row">
                       <div class="col-sm-4 col-xs-12 text-left-lg">
                        <div class="form-group">
                            <input class="btn submit-btn" type="submit" value="Submit" />
                        </div>
                       </div>
                       <div class="col-sm-8 col-xs-12 txtsm text-right-lg">
                       	<p>Already have an account? <a href="#">Login here</a></p>
						<p>New user? <a href="#">Register Now</a></p>
                       </div>
                    </div>
                </form>

            </div>

        </div>
    </div>
</section>-->


<section class="inner-page-header wow fadeInDown">
	<div class="container"><h1>Reset Password <br><span></span></h1></div>
</section>



<section class="register-page wow fadeInDown">
	<div class="container">
    	<div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6">
            <h2>reset <span>password</span> here</h2>
            <h4>Enter a new <span>password</span> to reset it.</h4>
            <form class="register-form" role="form" method="POST" action="{{ url('/frontresetpassword') }}">
							{{ csrf_field() }}
            	<div class="form-group">
								<input class="form-control" type="text" value="" placeholder="Enter Your Email" name="email" value="{{ $email or old('email') }}"/>

                </div>
                <div class="form-group">
									<input class="form-control" type="password" value="" placeholder="Enter New Password" name="password"/>

													@if ($errors->has('password'))
															<span class="help-block">
																	<strong>{{ $errors->first('password') }}</strong>
															</span>
													@endif
                </div>
                 <div class="form-group">
									 <input class="form-control" type="password" value="" placeholder="Confirm New Password" name="password_confirmation"/>
 			 @if ($errors->has('password_confirmation'))
 															<span class="help-block">
 																	<strong>{{ $errors->first('password_confirmation') }}</strong>
 															</span>
 													@endif
                </div>
                <div class="btn-group">
                	<input type="submit" value="Submit" class="btn-submit">
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



@endsection
