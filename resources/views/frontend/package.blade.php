@extends('frontend.master',['upperdata'=>$upperdata,'contactdata'=>$contactdata])
@section('content')
<section class="inner-page-header wow fadeInDown">
	<div class="container"><h1>Packages <br><span></span></h1></div>
</section>



@foreach($upperdata as $updata )
<section class="package-page-1 wow fadeInUp">
	<div class="container">
    	<div class="row">
        	<h2>Packages We Provide:</h2>
            <h4>{{ strip_tags($updata->title) }}</h4>
            <p>{{ strip_tags($updata->content) }}</p>
        </div>
    </div>
</section>
@endforeach

@foreach($dt as $k=>$pac )
 @if ($k % 2 == 0)
<section class="packages-section wh-bg">
	<div class="container">
    	<div class="row">
      		<div class="col-lg-6 col-md-6 col-sm-6 col-lg-push-6 col-sm-push-6 wow slideInRight">
            	<h2>{!! $pac->pac_nm !!} </h2>
                <h5>(One-Time Only)</h5>
                <h4><span>${{$pac->pac_prc}}</span></h4>
              {!! $pac->pro_crick !!}
            </div>
        	<div class="col-lg-6 col-md-6 col-sm-6 col-lg-pull-6 col-sm-pull-6 wow slideInLeft">
            	<img src="{{url('uploads/pac')}}/{{ $pac->img_nm }}" alt="">
                <h3>Info:</h3>
                {!! $pac->info !!}
									@if (Auth::guard('frontuser')->check())
									
									<?php if($pac->pac_prc > 0){ ?>
									
									<p><a class="link-btn " href="{{ url('/checkout/') }}/{{$pac->id}}" ><span class="lft">Buy Now</span> <span class="rght"><i class="fa fa-cart-plus" aria-hidden="true"></i></span></a><input type="hidden" name="px_id" id="px_id" value="{{ $pac->id }}"/></p>
									<?php }else{ ?>
<p><a class="link-btn " href="{{ url('/checkout/') }}/{{$pac->id}}" ><span class="lft">Audit Now</span> <span class="rght"><i class="fa fa-cart-plus" aria-hidden="true"></i></span></a><input type="hidden" name="px_id" id="px_id" value="{{ $pac->id }}"/></p>
									<?php } ?>
									@else
									<?php if($pac->pac_prc > 0){ ?>
									<p><a class="link-btn buyclk" href="javascript:void(0);" ><span class="lft">Buy Now</span> <span class="rght"><i class="fa fa-cart-plus" aria-hidden="true"></i></span></a><input type="hidden" name="px_id" id="px_id" value="{{ $pac->id }}"/></p>
									<?php }else{ ?>
									<p><a class="link-btn buyclk" href="javascript:void(0);" ><span class="lft">Audit Now</span> <span class="rght"><i class="fa fa-cart-plus" aria-hidden="true"></i></span></a><input type="hidden" name="px_id" id="px_id" value="{{ $pac->id }}"/></p>
									<?php } ?>

									@endif
                      </div>

        </div>
    </div>
</section>
 @else

 <section class="packages-section">
 	<div class="grey-bg">
 	<div class="container rotate-anti">
     	<div class="row">
         	<div class="col-lg-6 col-md-6 col-sm-6 col-lg-push-6 col-sm-push-6 wow slideInRight">
             	<h2>{!! $pac->pac_nm !!} </h2>
                 <h5>(Month to Month)</h5>
                 <h4><span>${{$pac->pac_prc}}</span></h4>
                   {!! $pac->pro_crick !!}
             </div>
         	<div class="col-lg-6 col-md-6 col-sm-6 col-lg-pull-6 col-sm-pull-6 wow slideInLeft">
             	<img src="{{url('uploads/pac')}}/{{ $pac->img_nm }}" alt="">
                 <h3>Info:</h3>
                  {!! $pac->info !!}
										@if (Auth::guard('frontuser')->check())
										<p><a class="link-btn " href="{{ url('/checkout/') }}/{{$pac->id}}" ><span class="lft">Buy Now</span> <span class="rght"><i class="fa fa-cart-plus" aria-hidden="true"></i></span></a><input type="hidden" name="px_id" id="px_id" value="{{ $pac->id }}"/></p>

										@else
										<p><a class="link-btn buyclk" href="javascript:void(0);" ><span class="lft">Buy Now</span> <span class="rght"><i class="fa fa-cart-plus" aria-hidden="true"></i></span></a><input type="hidden" name="px_id" id="px_id" value="{{ $pac->id }}"/></p>

										@endif
                        </div>

         </div>
     </div>
     </div>
 </section>


 @endif
@endforeach





@stop()
