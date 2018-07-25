@extends('frontend.master')
@section('content')

<section class="inner-page-header wow fadeInDown">
	<div class="container"><h1>Payment success <br><span></span></h1></div>
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
                        <p>{!! $pac->info !!}</p>
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
											
                    </div>
                    </div>
            </div>
            <div class="col-lg-4 col-sm-4 col-md-4 sidebar-info">
            	<h3>Customer details</h3>
                <p><strong>Name:</strong> saefnfhvv waefnhff</p>
                <p><strong>Phone:</strong> 9496465464</p>
                <p><strong>Email:</strong> asdcbwaifb@nj.com</p>
                <p><strong>Address:</strong> sdkvhs hfcws iusyfsw oiduvhosnvsv ijhocd.</p>
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
