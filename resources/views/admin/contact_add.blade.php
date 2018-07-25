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
						<h6>@section('title', 'Contacts  Edit')</h6> 
						{!! Form::open(array('route' => ['contactmanagement.store'],'method'=>'Post','id'=>'form1','files'=>true,)) !!}
							
                                                        <div class="form-group">
								<label for="name">Address</label>
								<textarea name="address" id="editor1" class="form-control" rows="4" cols="50"></textarea>
							</div>
							<div class="form-group">
								<label for="name">Phone No</label>
								<input type="text" name="emergency_phone" class="form-control required number" value=""/>
								<!--{!! Form::number('price', 'value', array('class' => 'form-control')); !!}-->
							</div>
							<div class="form-group">
								<label for="name">Contact Email</label>
								<input type="text" name="email" class="form-control required email" value=""/>
								<!--{!! Form::number('price', 'value', array('class' => 'form-control')); !!}-->
							</div>
							
							
							<div class="form-group">
								<label for="name">Status</label>
								<select name="status"class="form-control">
								<option value="1" >Active</option>
								<option value="2" >Pending</option>
								<!--<option value="0" >Decline</option>-->
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
		$.noConflict();
	jQuery(document).ready(function($){
		
		$('#form1').validate();
	});
	
	</script>
        <script>
	
	$(document).ready(function(){
		
		 CKEDITOR.replace( 'editor1' );
		
	});
	
	
	</script>
@stop()