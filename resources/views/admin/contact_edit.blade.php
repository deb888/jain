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
						{!! Form::open(array('route' => ['contactmanagement.edit'],'method'=>'Post','id'=>'form1','files'=>true,)) !!}
							
							
							<div class="form-group">
								<label for="name">Address</label>
								<textarea name="address" id="editor1" class="form-control" rows="4" cols="50">{{ $dat->address}}</textarea>
							</div>
							<div class="form-group">
								<label for="name">Phone No</label>
								<input type="text" name="emergency_phone" class="form-control" value="{{ $dat->emergency_phone }}"/>
								<!--{!! Form::number('price', 'value', array('class' => 'form-control')); !!}-->
							</div>
							<div class="form-group">
								<label for="name">Contact Email</label>
								<input type="text" name="email" class="form-control" value="{{ $dat->email }}"/>
								<!--{!! Form::number('price', 'value', array('class' => 'form-control')); !!}-->
							</div>
							
							<div class="form-group">
								<label for="name">Facebook Link</label>
								<input type="text" name="fb_link" class="form-control" value="{{ $dat->fb_link }}"/>
								
							</div>
							<div class="form-group">
								<label for="name">Twitter Link</label>
								<input type="text" name="twtr_link" class="form-control" value="{{ $dat->twt_link }}"/>
							</div>
							<div class="form-group">
								<label for="name">Google+ Link</label>
								<input type="text" name="gpgl_link" class="form-control" value="{{ $dat->glpl_link }}"/>
							</div>
							<div class="form-group">
								<label for="name">Instagram Link</label>
								<input type="text" name="inst_link" class="form-control" value="{{ $dat->inst_link }}"/>
							</div>
							<div class="form-group">
								<label for="name">LinkedIn Link</label>
								<input type="text" name="lnkd_link" class="form-control" value="{{ $dat->lnkd_link }}"/>
							</div>
							<div class="form-group">
								<label for="name">SnapChat Link</label>
								<input type="text" name="snpcht_link" class="form-control" value="{{ $dat->snpcht_link }}"/>
							</div>
							<div class="form-group">
								<label for="name">Youtube Link</label>
								<input type="text" name="yutb_link" class="form-control" value="{{ $dat->yutb_link }}"/>
								
							</div>
							
							<input type="hidden" name="id" value="{{ $dat->id }}"/>
							<input type="hidden" name="oldimg" value="{{ $dat->image }}"/>
							<div class="form-group">
								<label for="name">Status</label>
								<select name="status"class="form-control">
								<option value="1" <?php if($dat->status==1){ echo 'selected';} ?>>Active</option>
								<option value="2" <?php if($dat->status==2){ echo 'selected';} ?>>Pending</option>
								<!--<option value="0" <?php if($dat->status==0){ echo 'selected';} ?>>Decline</option>-->
								</select>
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