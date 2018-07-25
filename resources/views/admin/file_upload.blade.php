@extends('admin.master')
@section('content')
	<div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box box-primary">
                
                <div class="box-body">
					

					<div class="form-group">
						<h6>@section('title', 'Terms  Create')</h6> 
						
						{!! Form::open(array('route' => 'pdf.upload.post','method'=>'POST','files'=>true ) ) !!}
							<div class="form-group">
						
								<input type="file" name="image" />
	  <p class="errors">{!!$errors->first('image')!!}</p>
	@if(Session::has('error'))
	<p class="errors">{!! Session::get('error') !!}</p>
	@endif
							</div>
							
							
							
							
							
							
							<div class="form-group">
								<input type="submit" class="btn btn-primary" value="Submit"/> 
							</div>
						{!! Form::close() !!} 
					</div>
                </div><!-- /.box-body -->
               
            </div><!-- /.box -->
        </div><!-- /.col -->
	</div>
@stop()