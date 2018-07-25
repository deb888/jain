@extends('frontend.master',['homedata'=>$dt])
@section('content')


   <main>
        <section class="banner">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                @foreach ($dt as $home_banner)
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="{{url('uploads/banner')}}/{{ $home_banner->banner_image }}" alt="First slide">
                        <div class="carousel-caption">
                            <div class="cc-hd1"><span>Explore</span> Jainism</div>
                            <div class="cc-hd2">{{ $home_banner->upper_iamge_content }}</div>
                            <a class="cc-anchor" href="#">Get Started <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                    @endforeach

                   
                </div>
                <a class="carousel-control ccp" href="#carouselExampleControls" role="button" data-slide="prev">
                <i class="fa fa-angle-left"></i>
                <span class="sr-only">Previous</span>
              </a>
                <a class="carousel-control ccn" href="#carouselExampleControls" role="button" data-slide="next">
                <i class="fa fa-angle-right"></i>
                <span class="sr-only">Next</span>
              </a>
            </div>
        </section>
        
        <section class="hm-sec hm-sec-1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="sec-lft-main">
                            <h2 class="sec-shd">Jain<span>Religion</span></h2>
                            <p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.
orem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nib. elit.</p>
                            <a class="seeall" href="#">See All <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                    
                    <div class="col-lg-9">
                        <div class="row jrel-row">
                        @foreach ($pacdata as $pac)
                        <div class="col-lg-4 col-sm-6">
                                <div class="jrel-col">
                                   <a href="#">
                                        <div class="jrel-col-img">
                                            <img src="{{url('uploads/pac')}}/{{ $pac->img_nm }}" alt="">
                                        </div>
                                        <div class="jrel-col-hd">{{$pac->pac_nm}}</div>
                                        <div class="jrel-col-txt">{{$pac->info}}</div>
                                    </a>
                                </div>
                            </div>
                        @endforeach


<!--                             
                            <div class="col-lg-4 col-sm-6">
                                <div class="jrel-col">
                                   <a href="#">
                                        <div class="jrel-col-img">
                                            <img src="{{ URL::asset('public/frontend/images/j-rel-2.jpg')}}" alt="">
                                        </div>
                                        <div class="jrel-col-hd">Tirthankara</div>
                                        <div class="jrel-col-txt">A tirthankara is a religious teacher who has been freed from the bonds of karma and crossed the world of transmigrations.</div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="jrel-col">
                                   <a href="#">
                                        <div class="jrel-col-img">
                                            <img src="{{ URL::asset('public/frontend/images/j-rel-3.jpg')}}" alt="">
                                        </div>
                                        <div class="jrel-col-hd">Namokar Mahamantra</div>
                                        <div class="jrel-col-txt">In Namokar Mahamantra, we bow down in respect to the Panch Parmesthi and worship their virtues.</div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="jrel-col">
                                   <a href="#">
                                        <div class="jrel-col-img">
                                            <img src="{{ URL::asset('public/frontend/images/j-rel-4.jpg')}}" alt="">
                                        </div>
                                        <div class="jrel-col-hd">Rituals &amp; festivals</div>
                                        <div class="jrel-col-txt">Jain festivals are either related to life events of Tirthankara or they are performed with intention of purification of soul.</div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="jrel-col">
                                   <a href="#">
                                        <div class="jrel-col-img">
                                            <img src="{{ URL::asset('public/frontend/images/j-rel-5.jpg')}}" alt="">
                                        </div>
                                        <div class="jrel-col-hd">Ahimsa (Non-violence)</div>
                                        <div class="jrel-col-txt">Compassion to all fellow living beings (along with humans) is central to Jain belief.</div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="jrel-col">
                                   <a href="#">
                                        <div class="jrel-col-img">
                                            <img src="{{ URL::asset('public/frontend/images/j-rel-6.jpg')}}" alt="">
                                        </div>
                                        <div class="jrel-col-hd">Tapa</div>
                                        <div class="jrel-col-txt">Tapa (penance or Austerities ) is a great purifier of soul. It can be described as of two kinds, external and internal. Each is of six subdivision.</div>
                                    </a>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
        
        <section class="hm-sec hm-sec-2">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="sec-shd2">Jain <span>Directory</span></h2>
                        <div class="row jdir-row">
                            <!-- <div class="col-lg-3 col-sm-6">
                                <div class="j-dir-col">
                                   <a href="#">
                                        <img src="{{ URL::asset('public/frontend/images/directory-icon-1.svg')}}" alt="Jain Samaj" width="120" height="102">
                                        <h3>Jain Samaj</h3>
                                        <p>Browse the Jain Samaj Directory according to your city, state or name.</p>
                                    </a>
                                </div>
                            </div> -->
                            @foreach($servicedata as $serv)
                            <div class="col-lg-3 col-sm-6">
                                <div class="j-dir-col">
                                   <a href="#">
                                        <img src="{{url('uploads/services')}}/{{ $serv->service_image }}" alt="{{$serv->title}}" width="120" height="102">
                                        <h3>{{$serv->title}}</h3>
                                        <p>{{$serv->content}}</p>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                            <!-- <div class="col-lg-3 col-sm-6">
                                <div class="j-dir-col">
                                   <a href="#">
                                        <img src="{{ URL::asset('public/frontend/images/directory-icon-3.svg')}}" alt="Jain Samaj" width="120" height="102">
                                        <h3>Jain Dharamshala</h3>
                                        <p>Browse the Jain Dharamshala in your city, state, etc.</p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="j-dir-col">
                                   <a href="#">
                                        <img src="{{ URL::asset('public/frontend/images/directory-icon-4.svg')}}" alt="Jain Samaj" width="120" height="102">
                                        <h3>Jain Hotels Nearby</h3>
                                        <p>Browse the Jain Hotels near you.</p>
                                    </a>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="hm-sec hm-sec-3">
            <div class="container">
                <div class="news-calendar-row">
                    <div class="row">
                        <div class="col-lg-6">
                            <h2 class="sec-shd">Jain <span>News &amp; Events</span></h2>
                            <div class="ncr-content">
                                <div class="ncr-content-row">
                                    <h3>
                                        <a href="#">Idol worth lakhs stolen from Jain Temple</a>
                                    </h3>
                                    <div class="ncr-cr-time">27.05.2018</div>
                                    <div class="ncr-cr-smsg">Sensation prevailed in Trimurty Nagar area when unidentified person took away an idol of Lord Vansupujya at Jain Temple under the jurisdiction...</div>
                                    <a href="#" class="ncr-cr-rdmre">Read More</a>
                                </div>
                                <div class="ncr-content-row">
                                    <h3>
                                        <a href="#">Historic Jain temple demolished in Pakistan</a>
                                    </h3>
                                    <div class="ncr-cr-time">27.05.2018</div>
                                    <div class="ncr-cr-smsg">Notwithstanding a court order, authorities in Pakistan’s Punjab province have demolished the remains of a centuries- old Jain temple to pave the way...</div>
                                    <a href="#" class="ncr-cr-rdmre">Read More</a>
                                </div>
                                <div class="ncr-content-row">
                                    <h3>
                                        <a href="#">Idol worth lakhs stolen from Jain Temple</a>
                                    </h3>
                                    <div class="ncr-cr-time">27.05.2018</div>
                                    <div class="ncr-cr-smsg">Notwithstanding a court order, authorities in Pakistan’s Punjab province have demolished the remains of a centuries- old Jain temple to pave the way...</div>
                                    <a href="#" class="ncr-cr-rdmre">Read More</a>
                                </div>
                            </div>
                            
                            <div class="ncr-viewmore">
                                <a href="#" class="btn btn-custom">View More</a>
                            </div>
                            
                        </div>
                        <div class="col-lg-6">
                            <h2 class="sec-shd">Jain <span>Calendar</span></h2>
                            <div class="ncr-content ncr-calendar">
                                <div class="ncr-content-row">
                                  <div class="row">
                                       <div class="ncr-cr-date">
                                           <div class="ncr-cr-date-inner">20<span>May</span></div>
                                       </div>
                                       <div class="ncr-cr-ctxt">
                                           <h3>Rohini Vrat</h3>
                                           <div class="ncr-cr-smsg">Rohini Vrat is mainly observed by women for the long life of their husbands.</div>
                                       </div>                                    
                                       <div class="ncr-cr-time">Thursday</div>
                                   </div>
                                </div>
                                
                                <div class="ncr-content-row">
                                  <div class="row">
                                       <div class="ncr-cr-date">
                                           <div class="ncr-cr-date-inner">21<span>May</span></div>
                                       </div>
                                       <div class="ncr-cr-ctxt">
                                           <h3>Rohini Vrat</h3>
                                           <div class="ncr-cr-smsg">Rohini Vrat is mainly observed by women for the long life of their husbands.</div>
                                       </div>                                    
                                       <div class="ncr-cr-time">Thursday</div>
                                   </div>
                                </div>
                                
                                <div class="ncr-content-row">
                                  <div class="row">
                                       <div class="ncr-cr-date">
                                           <div class="ncr-cr-date-inner">23<span>May</span></div>
                                       </div>
                                       <div class="ncr-cr-ctxt">
                                           <h3>Rohini Vrat</h3>
                                           <div class="ncr-cr-smsg">Rohini Vrat is mainly observed by women for the long life of their husbands.</div>
                                       </div>                                    
                                       <div class="ncr-cr-time">Thursday</div>
                                   </div>
                                </div>
                                
                                <div class="ncr-content-row">
                                  <div class="row">
                                       <div class="ncr-cr-date">
                                           <div class="ncr-cr-date-inner">25<span>May</span></div>
                                       </div>
                                       <div class="ncr-cr-ctxt">
                                           <h3>Rohini Vrat</h3>
                                           <div class="ncr-cr-smsg">Rohini Vrat is mainly observed by women for the long life of their husbands.</div>
                                       </div>                                    
                                       <div class="ncr-cr-time">Thursday</div>
                                   </div>
                                </div>
                                
                                <div class="ncr-content-row">
                                  <div class="row">
                                       <div class="ncr-cr-date">
                                           <div class="ncr-cr-date-inner">28<span>May</span></div>
                                       </div>
                                       <div class="ncr-cr-ctxt">
                                           <h3>Rohini Vrat</h3>
                                           <div class="ncr-cr-smsg">Rohini Vrat is mainly observed by women for the long life of their husbands.</div>
                                       </div>                                    
                                       <div class="ncr-cr-time">Thursday</div>
                                   </div>
                                </div>                                
                                
                            </div>
                            
                            <div class="ncr-viewmore">
                                <a href="#" class="btn btn-custom">View More</a>
                            </div>
                            
                        </div>
                    </div>
                </div>                
            </div>
        </section>
        
    </main>
    
@stop()
