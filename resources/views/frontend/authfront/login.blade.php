@extends('frontend.master')
@section('content')


<section class="inner-page-header wow fadeInDown">
	<div class="container"><h1>Sign in <br><span></span></h1></div>
</section>



<section class="login-page wow fadeInDown">
	<div class="container">
    	<div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6">
            <h2>Please <span><a href="{{ url('/login') }}">Login</a></span> Here</h2>
            	<form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}" id="form1">
								  {{ csrf_field() }}
            	<div class="form-group">
                  <input class="form-control" type="text" value="" name="email" id="email"/>
                </div>
                <div class="form-group">
                      <input class="form-control" type="password" value="" name="password" id="password"/>
                </div>
										<input type="hidden" name="p_id" id="p_idl" value=""/>
                <div class="btn-group">
                	<input type="submit" value="Login" class="btn-submit">
                    <a href="{{ url('/forgetpassword') }}">Forgot password?</a>
                </div>
            </form>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6">
            	<h2>New user? Please <span><a href="{{ url('/register') }}">Register</a></span></h2>
            	<img src="{{ URL::asset('public/frontend/images') }}/login-img.jpg" alt="">
            </div>

        </div>
    </div>
</section>


@stop()
