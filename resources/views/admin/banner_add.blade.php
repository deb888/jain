@extends('admin.master')
@section('content')
	<div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box box-primary">
                
                <div class="box-body">
					

					<div class="form-group">
						<h6>@section('title', 'Banner  Add')</h6> 
						
						{!! Form::open(array('route' => 'banner.store','id'=>'form1','files'=>true,'enctype'=>
						'multipart/form-data')) !!}
							<div class="form-group">
						
								<label for="name">Banner upper Content</label>
								<input type="text" name="upper_iamge_content" class="form-control" id="upper_iamge_content" />
							</div>
							<div class="form-group">
						
								<label for="name">Banner Lower Content</label>
								<input type="text" name="lower_iamge_content" class="form-control" id="lower_iamge_content" />
							</div>
							<div class="form-group">
						
								<label for="name">Banner Image</label>
								<input type="file" name="image" class="form-control" id="partner_image_name" />
							</div>
									
							
							<div class="form-group">
								<label for="name">Status</label>
								<select name="sts"class="form-control">
								<option value="1" selected>Active</option>
								<option value="2">Inactive</option>
								</select>
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