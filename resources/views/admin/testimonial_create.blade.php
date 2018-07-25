@extends('admin.master')
@section('content')
	<div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box box-primary">
                
                <div class="box-body">
					

					<div class="form-group">
						<h6>@section('title', 'Testimonial Create')</h6> 
						
						{!! Form::open(array('route' => 'testimonial.store','method'=>'POST','files'=>true)) !!}
							
							<div class="form-group">
						
								<label for="name">Topic Name</label>
								<input type="text" name="topic_name" class="form-control" placeholder="TestiMonials topic"/>
							</div>
							<div class="form-group">
						
								<label for="name">Topic Description</label>
								<textarea name="topic_description" class="form-control" id="editor1" rows="4" cols="50"></textarea>
							</div>
							<div class="form-group">
						
								<label for="name">Person Name</label>
								<input type="text" name="topic_person_name" class="form-control" placeholder="TestiMonials Name"/>
							</div>
							<div class="form-group">
						
								<label for="name">Person Location</label>
								<input type="text" name="topicperson_location" class="form-control" placeholder="TestiMonials Location"/>
							</div>
							<div class="form-group">
						
								<label for="name">Person designation</label>
								<input type="text" name="topicperson_designation" class="form-control" placeholder="TestiMonials Location"/>
							</div>
							<div class="form-group">
						
								<label for="name">Person Image</label>
								<input type="file" name="image" class="form-control" placeholder="TestiMonials Location"/>
							</div>
							<div class="form-group">
						
								<label for="name">Background Image</label>
								<input type="file" name="image1" class="form-control" placeholder="TestiMonials Location"/>
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