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
						<h6>@section('title', 'User  Edit')</h6> 
						{!! Form::open(array('route' => ['clientmanagement.edit'],'method'=>'Post','id'=>'form1',)) !!}
							<div class="form-group">
								<label for="name">First Name</label>
								<input type="text" name="first_name" class="form-control required" value="{{ $dat->first_name }}"/>
							</div>
							
							<div class="form-group">
								<label for="name">Last Name</label>
								<input type="text" name="last_name" class="form-control required" value="{{ $dat->last_name }}"/>
								<!--{!! Form::number('price', 'value', array('class' => 'form-control')); !!}-->
							</div>
							<div class="form-group">
								<label for="name">Phone No</label>
								<input type="text" name="phone_no" class="form-control required" value="{{ $dat->phone_no }}"/>
								<!--{!! Form::number('price', 'value', array('class' => 'form-control')); !!}-->
							</div>
							<div class="form-group">
								<label for="name">E-mail</label>
								<input type="text" name="email" class="form-control  email" value="{{ $dat->email }}" readonly/>
								<!--{!! Form::number('price', 'value', array('class' => 'form-control')); !!}-->
							</div>
							<input type="hidden" name="id" value="{{ $dat->id }}"/>
							<div class="form-group">
								<label for="name">Status</label>
								<select name="status"class="form-control">
								<option value="1" <?php if($dat->status==1){ echo 'selected';} ?>>Active</option>
								<option value="2" <?php if($dat->status==2){ echo 'selected';} ?>>Pending</option>
								<option value="0" <?php if($dat->status==0){ echo 'selected';} ?>>Decline</option>
								</select>
							</div>
							
							
							
							<div class="form-group">
								<input type="submit" class="btn btn-primary" value="Submit"/> 
							</div>
						{!! Form::close() !!} 
					</div>
                </div><!-- /.box-body -->
				
				 <div class="box-body">
					<div class="form-group">
						<h3>Change Password</h3>
					{!! Form::open(array('route' => ['clientmanagement.change_password'],'method'=>'Post')) !!}
						
						<div class="form-group">
								<label for="name">New Password</label>
								<input type="text" name="password" class="form-control required" value=""/>
								<!--{!! Form::number('price', 'value', array('class' => 'form-control')); !!}-->
						</div>
						<div class="form-group">
								<label for="name">Confirm Password</label>
								<input type="text" name="password_confirmation" class="form-control required" value=""/>
								<!--{!! Form::number('price', 'value', array('class' => 'form-control')); !!}-->
						</div>
						<input type="hidden" name="id" value="{{ $dat->id }}"/>
						<div class="form-group">
								<input type="submit" class="btn btn-info" value="Submit"/> 
						</div>
						{!! Form::close() !!} 
				 
					</div>
				 
				
				</div>
						
            </div><!-- /.box -->
        </div><!-- /.col -->
	</div>
	<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.1/jquery.validate.min.js"></script>
	<script>
		$.noConflict();
	jQuery(document).ready(function($){
		
		$('#form1').validate();
	});
	
	</script>
@stop()