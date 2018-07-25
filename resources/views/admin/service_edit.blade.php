@extends('admin.master')
@section('content')
	<div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box box-primary">
                
                <div class="box-body">
					

					<div class="form-group">
						<h6>@section('title', 'Directory  Add')</h6> 
						
						{!! Form::open(array('route' => 'services.update','id'=>'form1','files'=>true,'enctype'=>
						'multipart/form-data')) !!}
							<div class="form-group">
						
								<label for="name">Directory Title</label>
								<input type="text" name="services_title" class="form-control" id="services_title" value="{{ $dat->title}}"/>
							</div>
							<div class="form-group">
						
								<label for="name">Directory Content</label>
                                                                <textarea name="services_content" id="editor1" class="form-control" rows="4" cols="50">{{ $dat->content}}</textarea>
								<!--<input type="text" name="services_content" class="form-control" id="services_content" value="{{ $dat->content}}"/>-->
							</div>
							<div class="form-group">
						
								<label for="name">Directory Image</label>
								<input type="file" name="image" class="form-control" id="partner_image_name" />
								<img src="{{url('uploads/services')}}/{{ $dat->service_image }}" class="img-thumbnail" alt="Cinque Terre" width="200" height="200">
								
							</div>
							
							<div class="form-group">
								<label for="name">Status</label>
								<select name="sts"class="form-control">
								<option value="1" selected>Active</option>
								<option value="2">Inactive</option>
								</select>
							</div>
							
							
							
							<div class="form-group">
								<input type="hidden" name="id" value="{{ $dat->id}}"/>
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
		
		 CKEDITOR.replace( 'services_content' );
		
	});
	
	
	</script>
	<script>
		$.noConflict();
	jQuery(document).ready(function($){
		
		$('#form1').validate();
	});
	
	</script>
@stop()