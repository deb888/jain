
@extends('frontend.master')
@section('content')
<section class="inner-page-banner">
	<img src="{{ URL::asset('public/frontend/images') }}/roof-banner.jpg" alt="">
	<div class="container">
    	<div class="row page-banner-txt">
        	<h1></h1>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting
industry. Lorem Ipsum has been the industry's standard dummy
text ever since the 1500s,</p>
        </div>
    </div>
</section>


	
<section class="estimate-calculate" id="hide_this_portion">
	<div class="container">
    	<div class="row">
		<table class="table table-bordered table-striped" id="example">
    <thead>
      <tr>
        <th>ID</th>
        <th>Project Name</th>
        <th>Generate Pdf</th>
        <th>Generate Date</th>
        <th>Modified Date</th>
        <th>Edit</th>
        
      </tr>
    </thead>
    <tbody>
     @foreach($dt as $key=>$val )     
      <tr class="">
        <td>{{ $key+1 }}</td>
        <td>{{$val->pro_nm}}</td>
        <td><a href="{{ route('get_pdf', ['our_id'=>$val->id,]) }}">Download <i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></td>
		<td>{{ date('d/m/Y h:i:s:a',strtotime($val->created_at)) }}</td>
		<td>{{ date('d/m/Y h:i:s:a',strtotime($val->updated_at))}}</td>
        <td><a href="{{ route('estimateget', ['our_id'=>$val->id,]) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
		
		
        	    </div>
        
        
        
    </div>
</section>






@stop()






