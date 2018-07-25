@extends('admin.master')
@section('content')
	<div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box box-primary">
                
                <div class="box-body">
					

					<div class="form-group">
						<h6>@section('title', 'AboutUs  Create')</h6> 
						
						{!! Form::open(array('route' => 'aboutus.update','id'=>'form1','files'=>true)) !!}
						<div class="form-group">
                            <label for="name">Select Cat</label>
                            <select name="aboutcat"class="form-control required">
                            @foreach($cat as $ct)
                            <option value="{{$ct->id}}" @if($ct->id==$dt->aboutcat) selected @endif>{{$ct->title}}</option>
                            @endforeach
                            </select>
                            </div>
							<div class="form-group">
						
								<label for="name">AboutUs Content</label>
								<textarea name="page_content" id="editor1" class="form-control" rows="4" cols="50">{{ $dt->page_content }}</textarea>
							</div>
                                                         <div class="form-group">
						
								<label for="name">AboutUs Image</label>
								<input type="file" name="image" class="form-control" id="partner_image_name" />
								<img src="{{url('uploads/aboutus')}}/{{ $dt->aboutimage }}" class="img-thumbnail" alt="Cinque Terre" width="200" height="200">
								
							</div>
                                                        
									<input type="hidden" name="post_id" value="{{ $dt->id}}"/>
							
							<div class="form-group">
								<label for="name">Status</label>
								<select name="sts"class="form-control">
								<option value="1" selected>Active</option>
								<option value="2">Inactive</option>
								</select>
							</div>
							
							<div class="form-group">
						         <label for="seo_title">Seo Title</label>
				<textarea name="seo_title" id="editor2" class="form-control" rows="4" cols="50">{{ $dt->seo_title }}</textarea>
							</div>
							<div class="form-group">
						         <label for="meta_keyword">Meta Keywords</label>
				<textarea name="meta_keyword" id="editor2" class="form-control" rows="4" cols="50">{{ $dt->meta_keyword }}</textarea>
							</div>
							<div class="form-group">
						         <label for="meta_description">Meta Description</label>
				<textarea name="meta_description" id="editor2" class="form-control" rows="4" cols="50">{{ $dt->meta_description }}</textarea>
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
	<!-- <script src="//cdn.ckeditor.com/4.5.10/full/ckeditor.js"></script> -->
	<script src="{{asset('public/adminTheme/plugins/ckeditor/ckeditor.js')}}"> </script>
	<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.1/jquery.validate.min.js"></script>
	<script>
	
	$(document).ready(function(){
		CKEDITOR.config.filebrowserBrowseUrl = "{{ URL::asset('public/adminTheme/plugins/ckeditor/kcfinder/browse.php?opener=ckeditor&type=files')}}";

    CKEDITOR.config.filebrowserImageBrowseUrl = "{{ URL::asset('public/adminTheme/plugins/ckeditor/kcfinder/browse.php?opener=ckeditor&type=images')}}";

    CKEDITOR.config.filebrowserFlashBrowseUrl = "{{ URL::asset('public/adminTheme/plugins/ckeditor/kcfinder/browse.php?opener=ckeditor&type=flash')}}";

    CKEDITOR.config.filebrowserUploadUrl = "{{ URL::asset('public/adminTheme/plugins/ckeditor/kcfinder/upload.php?opener=ckeditor&type=files')}}";

    CKEDITOR.config.filebrowserImageUploadUrl = "{{ URL::asset('public/adminTheme/plugins/ckeditor/kcfinder/upload.php?opener=ckeditor&type=images')}}";

    CKEDITOR.config.filebrowserFlashUploadUrl = "{{ URL::asset('public/adminTheme/plugins/ckeditor/kcfinder/upload.php?opener=ckeditor&type=flash')}}";
		 CKEDITOR.replace( 'editor1' );
		
	});
	
	</script>
        <script>
	
	$(document).ready(function(){
		
		 CKEDITOR.replace( 'editor2' );
		
	});
	
	</script>
	<script>
		$.noConflict();
	jQuery(document).ready(function($){
		
		$('#form1').validate();
	});
	
	</script>
@stop()