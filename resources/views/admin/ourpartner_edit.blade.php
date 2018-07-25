@extends('admin.master')
@section('content')
	<div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box box-primary">
                
                <div class="box-body">
					

					<div class="form-group">
						<h6>@section('title', 'OurPartner  Edit')</h6> 
						
						{!! Form::open(array('route' => 'ourpartner.update','id'=>'form1','files'=>true)) !!}
							<div class="form-group">
						
								<label for="name">Partner Name</label>
								<input type="text" name="partner_name" class="form-control" id="partner_name" value="{{ $dat->partner_name}}"/>
							</div>
							<div class="form-group">
						
								<label for="name">Partner Image</label>
								<input type="file" name="image" class="form-control" id="partner_image_name" />
								<img src="{{url('uploads/partner')}}/{{ $dat->partner_image_name }}" class="img-thumbnail" alt="Cinque Terre" width="200" height="200">
								
							</div>
									
							
							<div class="form-group">
								<label for="name">Status</label>
								<select name="sts"class="form-control">
								<option value="1" selected>Active</option>
								<option value="2">Inactive</option>
								</select>
							</div>
							
							
							
							<div class="form-group">
							<input type="hidden" name="id" value="{{ $dat->id }}" />
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