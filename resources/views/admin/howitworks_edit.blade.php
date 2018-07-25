@extends('admin.master')
@section('content')
	<div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box box-primary">
                
                <div class="box-body">
					

					<div class="form-group">
						<h6>@section('title', 'Banner  Add')</h6> 
						
						{!! Form::open(array('route' => 'howitworks.update','id'=>'form1','files'=>true)) !!}
							<div class="form-group">
						
								<label for="name">Step One Heading</label>
								<input type="text" name="step_one_hed" class="form-control" id="step_one_hed" value="{{ $dat->step_one_hed }}"/>
							</div>
							<div class="form-group">
						
								<label for="name">Step One Content</label>
								<textarea name="step_one_cont" class="form-control" id="editor1">{{ $dat->step_one_cont }}</textarea>
							</div>
							<div class="form-group">
						
								<label for="name">Step Two Heading</label>
								<input type="text" name="step_two_hed" class="form-control" id="step_two_hed" value="{{ $dat->step_two_hed }}"/>
							</div>
							<div class="form-group">
						
								<label for="name">Step Two Content</label>
								<textarea name="step_two_cont" class="form-control" id="editor2">{{ $dat->step_two_cont }}</textarea>
							</div>
								<div class="form-group">
						
								<label for="name">Step Three Heading</label>
								<input type="text" name="step_three_hed" class="form-control" id="step_three_hed" value="{{ $dat->step_three_hed }}"/>
							</div>
							<div class="form-group">
						
								<label for="name">Step Three Content</label>
								<textarea name="step_thres_cont" class="form-control" id="editor3">{{ $dat->step_thres_cont }}</textarea>
							</div>	
							
							<div class="form-group">
								<label for="name">Status</label>
								<select name="sts"class="form-control">
								<option value="1" <?php if($dat->sts==1){echo 'selected';} ?>>Active</option>
								<option value="2" <?php if($dat->sts==2){echo 'selected';} ?>>Inactive</option>
								</select>
							</div>
							
							
							
							<div class="form-group">
								<input type="hidden" name="id" value="{{ $dat->id }}"/>
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
		
	});
	
	</script>
	<script>
		$.noConflict();
	jQuery(document).ready(function($){
		
		$('#form1').validate();
	});
	
	</script>
@stop()