@extends('admin.master')
@section('content')
	<div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box box-primary">
                
                <div class="box-body">
					

					<div class="form-group">
						<h6>@section('title', 'AboutUs  Create')</h6> 
						
						{!! Form::open(array('route' => 'aboutus.store','id'=>'form1','files'=>true)) !!}
                            <div class="form-group">

                            <label for="name">AboutUs Content</label>
                            <textarea name="page_content" id="editor1" class="form-control" rows="4" cols="50"></textarea>
                            </div>
                                                       
                            <div class="form-group">
                            <label for="name">Select Cat</label>
                            <select name="aboutcat"class="form-control required">
                            @foreach($cat as $ct)
                            <option value="{{$ct->id}}" selected>{{$ct->title}}</option>
                            @endforeach
                            </select>
                            </div>

									  <div class="form-group">
						
                        <label for="name">AboutUs Image</label>
                        <input type="file" name="image" class="form-control" id="partner_image_name" />
                        
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
		$.noConflict();
	jQuery(document).ready(function($){
		
		$('#form1').validate();
        CKEDITOR.replace( 'editor1' );
        CKEDITOR.replace( 'editor2' );
	});
	
	</script>
@stop()