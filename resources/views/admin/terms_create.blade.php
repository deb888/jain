@extends('admin.master')
@section('content')
	<div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box box-primary">
                
                <div class="box-body">
					

					<div class="form-group">
						<h6>@section('title', 'Terms  Create')</h6> 
						
						{!! Form::open(array('route' => 'terms_and_condition.create')) !!}
							<div class="form-group">
						
								<label for="name">Terms Content</label>
								<textarea name="content" class="form-control" rows="4" cols="50"></textarea>
							</div>
							
							
							<div class="form-group">
								<label for="name">Status</label>
								<select name="status"class="form-control">
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
@stop()