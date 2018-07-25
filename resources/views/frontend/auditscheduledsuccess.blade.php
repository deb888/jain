@extends('frontend.master',['contactdata'=>$contactdata])
@section('content')


<section class="inner-page-header wow fadeInDown">
	<div class="container"><h1> audit scheduled </h1></div>
</section>


@foreach($dt as $pak )
<section class="packages-section wh-bg">
 <h2><span style="color:green">Your audit is scheduled successfully.We will contact soon.</span></h2>
	<div class="container">
    	<div class="row">
<h3>Package Name :: <span> {!! $pak->pac_nm !!} </span></h3>
  {!! $pak->pro_crick !!}
</div>
    </div>
</section>
@endforeach
@stop()
