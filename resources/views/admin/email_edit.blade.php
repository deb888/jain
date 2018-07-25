@extends('admin.master')
@section('content')
<style>
.error{
	
	color:red;
	
}
</style>
	<div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box box-primary">
                
                <div class="box-body">
					<?php //print_r($dat); ?>
					<div class="form-group">
						<h6>@section('title', 'Email Content  Edit')</h6> 
						{!! Form::open(array('route' => ['emailcontent.edit'],'method'=>'Post')) !!}
							<div class="form-group">
								<label for="name">Email Type</label>
								<input type="text" name="email_type" class="form-control required" value="{{ $dat->email_type }}" readonly/>
							</div>
							
							<div class="form-group">
								<label for="name">Email Subject</label>
								<input type="text" name="email_subject" class="form-control required" value="{{ $dat->email_subject }}"/>
								<!--{!! Form::number('price', 'value', array('class' => 'form-control')); !!}-->
							</div>
							<div class="form-group">
								<label for="name">Email Body</label>
								<textarea name="email_body" class="form-control" id="editor1" >{{ $dat->email_body }}</textarea>
							</div>
							
							<input type="hidden" name="id" value="{{ $dat->id }}"/>
							<?php if($dat->id==3){ ?>
								
							<div class="alert alert-warning">
							
								Please Dont Replace The %email% text it will replace by the original link </br>
								Please Dont Replace The %password% text it will replace by the original link 
							
							</div>
								
								
							<?php }else{?>
							
							<div class="alert alert-warning">
							
								Please Dont Replace The %link% text it will replace by the original link 
							
							</div>
							
							
							
							<?php } ?>
							
							
							
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