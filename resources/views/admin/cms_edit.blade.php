@extends('admin.master')
@section('content')
	<div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box box-primary">
                
                <div class="box-body">
					

					<div class="form-group">
						<h6>@section('title', 'Cms  Edit')</h6> 
						
						{!! Form::open(array('route' => 'cms.update','id'=>'form1',)) !!}
							<div class="form-group">
						
								<label for="name">HOW IT WORKS Heading</label>
								<textarea name="howitworks_tagline" id="editor1" class="form-control" rows="4" cols="50">{{ $dt->howitworks_tagline }}</textarea>
							</div>
							<!--<div class="form-group">
						
								<label for="name">ABOUT US Heading</label>
								<textarea name="aboutus_tagline" id="editor2" class="form-control" rows="4" cols="50">{{ $dt->aboutus_tagline }}</textarea>
							</div>-->
							<div class="form-group">
						
								<label for="name">TESTIMONIALS Heading</label>
								<textarea name="testimonial_tagline" id="editor3" class="form-control" rows="4" cols="50">{{ $dt->testimonial_tagline }}</textarea>
							</div><div class="form-group">
						
								<label for="name">OUR PARTNERS Heading</label>
								<textarea name="ourpartner_tagline" id="editor4" class="form-control" rows="4" cols="50">{{ $dt->ourpartner_tagline }}</textarea>
							</div>
									<input type="hidden" name="id" value="{{ $dt->id}}"/>
							
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
		 CKEDITOR.replace( 'editor2' );
		 CKEDITOR.replace( 'editor3' );
		 CKEDITOR.replace( 'editor4' );
		
	});
	
	</script>
	<script>
		$.noConflict();
	jQuery(document).ready(function($){
		
		$('#form1').validate();
	});
	
	</script>
@stop()