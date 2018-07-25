@extends('admin.master')
@section('content')
	<div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box box-primary">
                
                <div class="box-body">
					

					<div class="form-group">
						<h6>@section('title', 'Package Upper content')</h6> 
						
						{!! Form::open(array('route' => 'uppercontent.update','id'=>'form1','files'=>true)) !!}
							<div class="form-group">
						
								<label for="name">Package upper title</label>
								<textarea name="title" id="editor1" class="form-control" rows="4" cols="50">{{ $dt->title }}</textarea>
							</div>
                                                        
                                                        <div class="form-group">
						
								<label for="name">Package upper title</label>
								<textarea name="content" id="editor2" class="form-control" rows="4" cols="50">{{ $dt->content }}</textarea>
							</div>
									<input type="hidden" name="id" value="{{ $dt->id}}"/>
							
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
	<script src="//cdn.ckeditor.com/4.5.10/full/ckeditor.js"></script>
	<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.1/jquery.validate.min.js"></script>
	<script>
	
	$(document).ready(function(){
		
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