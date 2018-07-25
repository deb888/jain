@extends('frontend.master')
@section('content')

<!--<section class="inner-page-header wow fadeInDown">
	<div class="container"><h1>Checkout Page <br><span></span></h1></div>
</section>



<section class="package-page-1 wow fadeInUp">
	<div class="container">
    	<div class="row">
        	<h2>Packages You About To Buy Provide:</h2>
            <h4>An insight into our list of variety of pricing packages</h4>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>
    </div>
</section>
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

                <p><a class="link-btn checkbuy" href="javascript:void(0);" ><span class="lft">Proceed To pay</span> <span class="rght"><i class="fa fa-cart-plus" aria-hidden="true"></i></span></a><input type="hidden" name="px_id" id="px_id" value="{{ $pac->id }}"/>
									<input type="hidden" name="" id="" value="{{$pac->pac_prc}}"/>
									<input type="hidden" name="" id="" value="{{$pac->pac_nm}}"/>

								</p>
            </div>

        </div>
    </div>

</section>-->
<section class="inner-page-header wow fadeInDown">
	<div class="container"><h1>checkout <br><span></span></h1></div>
</section>



<section class="checkout-page">
	<div class="container">
    	<div class="row">
        	<div class="col-lg-8 col-sm-8 col-md-8">
            	<div class="row pro-details-row">
                	<div class="col-lg-3 col-sm-3 col-md-3 pro-img">
                    <h4>Product</h4>
                    	<img src="{{url('uploads/pac')}}/{{ $pac->img_nm }}" alt="">
                    </div>
                    <div class="col-lg-3 col-sm-3 col-md-3 pro-description">
                    	<h4>{!! $pac->pac_nm !!}</h4>
                        <p>{{ str_limit(strip_tags($pac->info), $limit = 150, $end = '...')}}</p>
                    </div>
                    <div class="col-lg-3 col-sm-3 col-md-3 pro-package">
                    	<h4>Package Type</h4>
                        <p>Month to Month</p>
                    </div>
                    <div class="col-lg-3 col-sm-3 col-md-3 pro-total-price">
                    	<h4>Total</h4>
                        <h5>${{$pac->pac_prc}}</h5>
                    </div>

                </div>
                <div class="row">
                    <div class="btn-group">
                    <?php if($pac->pac_prc >0 ){ ?>
											<a class="checkbuy" href="javascript:void(0);" ><span class="lft">Proceed To pay</span> <span class="rght"></span></a><input type="hidden" name="px_id" id="px_id" value="{{ $pac->id }}"/>
											<?php }else{ ?>
											<a class="shdl_audit" href="javascript:void(0);" ><span class="lft">Schedule Audit</span> <span class="rght"></span></a><input type="hidden" name="px_id" id="px_id" value="{{ $pac->id }}"/>
											<?php } ?>
												<input type="hidden" name="" id="" value="{{$pac->pac_prc}}"/>
												<input type="hidden" name="" id="" value="{{$pac->id}}"/>
                    </div>
                    </div>
            </div>
            <div class="col-lg-4 col-sm-4 col-md-4 sidebar-info">
            	<h3>Customer details</h3>
                <p><strong>Name:</strong> {{Auth::guard('frontuser')->user()->first_name}}</p>
                <p><strong>Phone:</strong> {{Auth::guard('frontuser')->user()->phone_no}}</p>
                <p><strong>Email:</strong> {{Auth::guard('frontuser')->user()->email}}</p>
                <p><strong>Address:</strong> {{Auth::guard('frontuser')->user()->address}}</p>
            </div>
        </div>
    </div>
		{!! Form::open(array('route' => 'getCheckout','id'=>'frmb')) !!}
			{!! Form::hidden('type','medium') !!}
			{!! Form::hidden('pay',45) !!}
			<input type="hidden" name="pay" id="pay" />
			<input type="hidden" name="type" id="type" />


				{!! Form::close() !!}
</section>


@stop()
