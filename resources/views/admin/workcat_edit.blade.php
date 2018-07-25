@extends('admin.master')
@section('content')
	<div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box box-primary">
                
                <div class="box-body">
					

					<div class="form-group">
						<h6>@section('title', 'Banner  Add')</h6> 
						
						{!! Form::open(array('route' => 'workcategory.update','id'=>'form1','files'=>true)) !!}
							<div class="form-group">
						
								<label for="name">Work category Type</label>
								<select class=" form-control" name="cat_type" id="cat_type">
								<option>Select</option>
								<option value="1" @if($dat->cat_type==1) selected @endif >Exterior</option>
								<option value="2" @if($dat->cat_type==2) selected @endif >Interior</option>
								</select>
							</div>
							<div class="form-group">
						
								<label for="name">Category name</label>
								<input type="text" name="cat_nm" class="form-control" id="cat_nm" value="{{$dat->cat_nm }}"/>
							</div>
							<div class="form-group">
						
								<label for="name">Category Desc</label>
								<input type="text" name="cat_desc" class="form-control" id="cat_desc" value="{{ $dat->cat_desc }}"/>
							</div>
							<div class="form-group">
						
								<label for="name">Category Image</label>
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