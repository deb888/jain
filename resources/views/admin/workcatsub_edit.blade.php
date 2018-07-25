@extends('admin.master')
@section('content')
	<div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box box-primary">
                
                <div class="box-body">
					

					<div class="form-group">
						<h6>@section('title', 'Banner  Edit')</h6> 
						
						{!! Form::open(array('route' => 'worksubcatcon.update','id'=>'form1','files'=>true)) !!}
							<div class="form-group">
						
								<label for="name">Select  category Name</label>
								<select class=" form-control" name="cat_id" id="cat_id">
								<option>Select</option>
								@foreach($dt as $val)
								<option value="{{ $val->id }}" @if($sub_data->cat_id==$val->id) selected @endif >{{ $val->cat_nm }}</option>
							
								@endforeach
								</select>
							</div>
							<div class="form-group">
						
								<label for="name">Sub Listing  Name</label>
								<input type="text" name="sub_desc" class="form-control" id="sub_desc" value="{{ $sub_data->sub_desc }}"/>
							</div>
							<input type="hidden" name="id" value="{{ $sub_data->id }}" /> 
							<div class="form-group">
								<input type="hidden" name="id" value="{{ $sub_data->id}}"/>
								<input type="submit" class="btn btn-primary" value="Submit"/> 
							</div>
						{!! Form::close() !!} 
					</div>
                </div><!-- /.box-body -->
               
            </div><!-- /.box -->
        </div><!-- /.col -->
	</div>
	<script src="//cdn.ckeditor.com/4.5.10/full/ckeditor.js"></script>
	<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.1/jquery.validate.min.js"></script>
	<script>
	
	$(document).ready(function(){
		
		 CKEDITOR.replace( 'editor1' );
		
	});
	
	</script>
	<script>
		$.noConflict();
	jQuery(document).ready(function($){
		
		$('#form1').validate();
	});
	
	</script>
@stop()