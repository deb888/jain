@extends('admin.master')
@section('content')
	<div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box box-primary">
                
                <div class="box-body">
					

					<div class="form-group">
						<h6>@section('title', 'Banner  Add')</h6> 
						
						{!! Form::open(array('route' => 'banner.update','id'=>'form1','files'=>true)) !!}
							<div class="form-group">
						
								<label for="name">Banner upper Content</label>
								<input type="text" name="upper_iamge_content" class="form-control" id="upper_iamge_content" value="{{ $dat->upper_iamge_content}}"/>
							</div>
							<div class="form-group">
						
								<label for="name">Banner Lower Content</label>
								<input type="text" name="lower_iamge_content" class="form-control" id="lower_iamge_content" value="{{ $dat->lower_iamge_content}}"/>
							</div>
							<div class="form-group">
						
								<label for="name">Banner Image</label>
								<input type="file" name="image" class="form-control" id="partner_image_name" />
								<img src="{{url('uploads/banner')}}/{{ $dat->banner_image }}" class="img-thumbnail" alt="Cinque Terre" width="200" height="200">
								
							</div>
							
							<div class="form-group">
								<label for="name">Status</label>
								<select name="sts"class="form-control">
								<option value="1" selected>Active</option>
								<option value="2">Inactive</option>
								</select>
							</div>
							<div class="form-group">
						         <label for="home_popup_title">Home Popup Title</label>
				<textarea name="home_popup_title" id="editor2" class="form-control" rows="4" cols="50">{{ $dat->home_popup_title }}</textarea>
							</div>
							<div class="form-group">
						         <label for="home_popup_content">Home Popup Content</label>
				<textarea name="home_popup_content" id="editor2" class="form-control" rows="4" cols="50">{{ $dat->home_popup_content }}</textarea>
							</div>
							<div class="form-group">
						         <label for="home_popup_iframe">Home Popup Iframe</label>
				<textarea name="home_popup_iframe" id="editor2" class="form-control" rows="4" cols="50">{{ $dat->home_popup_iframe }}</textarea>
							</div>
							<div class="form-group">
						         <label for="seo_title">Seo Title</label>
				<textarea name="seo_title" id="editor2" class="form-control" rows="4" cols="50">{{ $dat->seo_title }}</textarea>
							</div>
							<div class="form-group">
						         <label for="meta_keyword">Meta Keywords</label>
				<textarea name="meta_keyword" id="editor2" class="form-control" rows="4" cols="50">{{ $dat->meta_keyword }}</textarea>
							</div>
							<div class="form-group">
						         <label for="meta_description">Meta Description</label>
				<textarea name="meta_description" id="editor2" class="form-control" rows="4" cols="50">{{ $dat->meta_description }}</textarea>
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
		// CKEDITOR.replace( 'editor2' );
		
	});
	
	</script>
	<script>
		$.noConflict();
	jQuery(document).ready(function($){
		
		$('#form1').validate();
	});
	
	</script>
@stop()