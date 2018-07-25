@extends('frontend.master',['homedata'=>$dt])
@section('content')


    <!-- Carousel
    ================================================== -->
   <!--{{print_r($dt)}}-->
   
    @foreach ($dt as $home_banner)
    
    <section class="static-banner wow fadeInUp">
    	<img src="{{url('uploads/banner')}}/{{ $home_banner->banner_image }}" alt="">
        <div class="container banner-caption wow slideInLeft">
        	<div class="row">
            	<h1>{{ $home_banner->upper_iamge_content }}</h1>
                <h2>{{ $home_banner->lower_iamge_content }}</h2>
                <h5><a href="{{ url('/about') }}">Read More</a></h5>
            </div>
        </div>
    </section>
    @endforeach
    
    @foreach ($aboutdata as $home_about)
    <section class="home-about wow fadeInUp">
    	<div class="container">
        	<div class="row section-header">
            	<h2 class="wow slideInLeft">ABOUT <span>US</span></h2>
                <h1 class="wow slideInRight">ABOUT</h1>
            </div>

            <div class="row content-block">
            	<div class="col-lg-7 col-md-7 col-sm-7 content-block-content wow fadeInUp">
                <p>{{ strip_tags($home_about->page_content) }}</p>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-5 content-block-img wow slideInRight">
                	<img src="{{url('uploads/aboutus')}}/{{ $home_about->aboutimage }}" alt="">
                </div>
            </div>

        </div>
    </section>
   @endforeach

    <section class="home-services1">
    	<!--<div class="rotate-bg">&nbsp;</div>-->
        <div class="home-services">
    	<div class="container rotate-anti">
        	<div class="row section-header1 wow fadeInUp">
            	<h2><span>Our</span> services</h2>
            </div>
            <div class="row">
                 @foreach ($servicedata as $home_service)
            	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 srv-content-block wow fadeInUp">
                	<img src="{{url('uploads/services')}}/{{ $home_service->service_image }}" alt="">
                    <h3>{{ $home_service->title }} </h3>
                    <p>{{ $home_service->content }} </p>
                </div>
                 @endforeach
            </div>

            <div class="row link-group">
            	<a href="{{ url('/package') }}">view all <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
            </div>

        </div>
        </div>
       <!-- <div class="rotate-bg1">&nbsp;</div> -->
    </section>



    <section class="home-contact">
    	<div class="container">
        	<div class="row section-header">
            	<h2 class="wow slideInLeft">Contact <span>US</span></h2>
                <h1 class="wow slideInRight">contact</h1>
            </div>

            <div class="row">
            	<div class="col-lg-6 col-md-6 col-sm-6 wow slideInLeft">
                	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d27794724.312881038!2d-96.45654681728294!3d31.74563884346724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited+States!5e0!3m2!1sen!2sin!4v1483696062051" width="100%" height="370" frameborder="0" style="border:1px solid #b8bdb6;" allowfullscreen></iframe>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 adrss-info wow slideInRight">
                   @foreach ($contactdata as $home_contact) 
               	<div class="col-lg-12 addres-row">
                	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-2"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-10">
                    	<h4>{{$home_contact->address}}</h4>
                    </div>
                </div>
                <div class="col-lg-12 addres-row">
                	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-2"><i class="fa fa-phone" aria-hidden="true"></i></div>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-10">
                    	<h4>{{$home_contact->emergency_phone}}</h4>
                    </div>
                </div>
                <div class="col-lg-12 addres-row">
                	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-2"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-10">
                    	<h4><a href="mailto:">{{$home_contact->email}}</a></h4>
    			<!--<h4><a href="mailto:">sales@email.com</a></h4>-->
                    </div>
                </div>
                   @endforeach
               </div>
            </div>


           </div>
    </section>






    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

@stop()
