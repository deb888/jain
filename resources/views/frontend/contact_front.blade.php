@extends('frontend.master',['contactdata'=>$contactdata])
@section('content')

<section class="inner-page-header wow fadeInDown">
	<div class="container"><h1>contact Us <br><span></span></h1></div>
</section>


<section class="contact-page">
	<div class="container">
    	<div class="row">
        	<div class="col-lg-6 col-sm-6 col-md-6">
            	<h2>Have a Question? <span>Ask Us!</span></h2>
                <form class="contact-form" action="{{ url('contact/post') }}"  method="POST">
                    {{ csrf_field() }}
                	<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    	<input type="text" placeholder="Name:" class="form-control" name="email" id="email">
                      @if ($errors->has('email'))
                          <span class="help-block">
                              <strong>{{ $errors->first('email') }}</strong>
                          </span>
                      @endif
                    </div>

                    <div class="form-group">
                    	<input type="text" placeholder="Phone:" class="form-control" name="phone" id="phone">
                    </div>
                    <div class="form-group">
                    	<textarea rows="4" class="form-control" placeholder="Message:" name="msg" id="msg"></textarea>
                    </div>
                    <div class="btn-group">
                    	<input type="submit" value="SUBMIT" class="btn-submit">
                    </div>
                </form>
            </div>
             @foreach ($contactdata as $home_contact) 
            <div class="col-lg-6 col-sm-6 col-md-6">
            	<h2>Come <span>Find us!!</span></h2>
            	<div class="col-lg-12 contact-pagerow">
                	<div class="row">
                    	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
               			<div class="col-lg-9 col-md-9 col-sm-9 col-xs-10">
                                <h4>{{$home_contact->address}}</h4>
                            </div>
                    </div>
                </div>

                <div class="col-lg-12 contact-pagerow">
                	<div class="row">
                    	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><i class="fa fa-phone" aria-hidden="true"></i></div>
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-10">
                            <h4>{{$home_contact->emergency_phone}}</h4>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 contact-pagerow">
                	<div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-10">
                                <h4>{{$home_contact->email}}</h4>
                            </div>
                    </div>
                </div>

            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="map-container-iframe"><iframe id="gmap" class="scrollof" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d27794724.312881038!2d-96.45654681728294!3d31.74563884346724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited+States!5e0!3m2!1sen!2sin!4v1483696062051" width="100%" height="370" frameborder="0" allowfullscreen></iframe></section>




@stop()
