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
						<h6>@section('title', 'Events  Add')</h6> 
						{!! Form::open(array('route' => ['events.store'],'method'=>'Post','id'=>'form1','files'=>true,)) !!}
							
						<div class="form-group">
						
						<label for="name">EventDetails</label>
						<textarea name="eventsdetails" id="editor1" class="form-control required" rows="4" cols="50"></textarea>
					</div>                        
							<div class="form-group">
								<label for="name">Event Name</label>
								<input type="text" name="title" class="form-control required " value=""/>
								<!--{!! Form::number('price', 'value', array('class' => 'form-control')); !!}-->
							</div>
							<div class="form-group">
								<label for="name">Start Date</label>
								<input type="date" name="start_date" class="form-control required date" value=""/>
								<!--{!! Form::number('price', 'value', array('class' => 'form-control')); !!}-->
							</div>
							<div class="form-group">
								<label for="name">End Date</label>
								<input type="date" name="end_date" class="form-control required date" value=""/>
								<!--{!! Form::number('price', 'value', array('class' => 'form-control')); !!}-->
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
	});
	
	</script>
       
@stop()