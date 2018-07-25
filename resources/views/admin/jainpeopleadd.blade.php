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
                    {!! Form::open(array('route' => ['jainpeople.store'],'method'=>'Post','id'=>'form1','files'=>true,)) !!}
					<div class="form-group">
						<h2>Parent Member Details</h2> 
						
							
						<div class="form-group">
                        <label for="name">Name</label>
                            <!-- <textarea name="page_content" id="editor1" class="form-control" rows="4" cols="50"></textarea> -->
                            <input type="text" name="name" class="form-control" id="name" />
							</div>
                            <div class="form-group">
                            <label for="name">Father’s Name</label>
                            <!-- <textarea name="page_content" id="editor1" class="form-control" rows="4" cols="50"></textarea> -->
                            <input type="text" name="fname" class="form-control" id="fname" />

							</div>
                            <div class="form-group">
                            <label for="name">Office Address
</label>
                             <textarea name="oname"  class="form-control" rows="4" cols="50"></textarea> 
                            <!-- <input type="text" name="oname" class="form-control" id="oname" /> -->
							</div>
                            <div class="form-group">
                            <label for="name">Native Place
</label>
                            <!-- <textarea name="page_content" id="editor1" class="form-control" rows="4" cols="50"></textarea> -->
                            <input type="text" name="npname" class="form-control" id="npname" />

							</div>
                            <div class="form-group">
                            <label for="name">Occupation</label>
                            <!-- <textarea name="page_content" id="editor1" class="form-control" rows="4" cols="50"></textarea> -->
                            <input type="text" name="ocname" class="form-control" id="npname" />
							</div>
                            <div class="form-group">
                            <label for="name">Telephone</label>
                            <!-- <textarea name="page_content" id="editor1" class="form-control" rows="4" cols="50"></textarea> -->
                            <input type="text" name="tel" class="form-control" id="tel" />
							</div>
                            <div class="form-group">
                            <label for="name">Mobile Phone
</label>
                            <!-- <textarea name="page_content" id="editor1" class="form-control" rows="4" cols="50"></textarea> -->
                            <input type="text" name="mb" class="form-control" id="mb" />
							</div>
                            <div class="form-group">
                            <label for="name">Email ID
</label>
                            <!-- <textarea name="page_content" id="editor1" class="form-control" rows="4" cols="50"></textarea> -->
                            <input type="text" name="emailx" class="form-control" id="emailx" />
							</div>
                            <div class="form-group">
                            <label for="name">Qualification</label>
                            <!-- <textarea name="page_content" id="editor1" class="form-control" rows="4" cols="50"></textarea> -->
                            <input type="text" name="qu" class="form-control" id="qu" />
							</div>
                            <div class="form-group">
                            <label for="name">Date Of Birth
</label>
                            <!-- <textarea name="page_content" id="editor1" class="form-control" rows="4" cols="50"></textarea> -->
                            <input type="date" name="dob" class="form-control" id="dob" />

							</div>
                            <div class="form-group">
                            <label for="name">Date Of Anniversary
</label>
                            <!-- <textarea name="page_content" id="editor1" class="form-control" rows="4" cols="50"></textarea> -->
                            <input type="date" name="doa" class="form-control" id="doa" />
							</div>
                            <div class="form-group">
                            <label for="name">Primary Member Image</label>
                        <input type="file" name="image" class="form-control" id="partner_image_name" />
							</div>
							
							
							<!-- <div class="form-group">
								<input type="submit" class="btn btn-primary" value="Submit"/> 
							</div> -->
					
					</div>
                </div><!-- /.box-body -->
				
                <div class="box-body">
					<?php //print_r($dat); ?>
					<div class="form-group">
						<h2>Members Wife Details</h2> 
						
						                       
                        <div class="form-group">
                        <label for="name">Name</label>
                            <!-- <textarea name="page_content" id="editor1" class="form-control" rows="4" cols="50"></textarea> -->
                            <input type="text" name="sname" class="form-control" id="name" />
							</div>
                            <div class="form-group">
                            <label for="name">Father’s Name</label>
                            <!-- <textarea name="page_content" id="editor1" class="form-control" rows="4" cols="50"></textarea> -->
                            <input type="text" name="sfname" class="form-control" id="fname" />

							</div>
                            <div class="form-group">
                            <label for="name">Office Address
</label>
                             <textarea name="soname"  class="form-control" rows="4" cols="50"></textarea> 
                            <!-- <input type="text" name="oname" class="form-control" id="oname" /> -->
							</div>
                            <div class="form-group">
                            <label for="name">Native Place
</label>
                            <!-- <textarea name="page_content" id="editor1" class="form-control" rows="4" cols="50"></textarea> -->
                            <input type="text" name="snpname" class="form-control" id="npname" />

							</div>
                            <div class="form-group">
                            <label for="name">Occupation</label>
                            <!-- <textarea name="page_content" id="editor1" class="form-control" rows="4" cols="50"></textarea> -->
                            <input type="text" name="socname" class="form-control" id="npname" />
							</div>
                            <div class="form-group">
                            <label for="name">Telephone</label>
                            <!-- <textarea name="page_content" id="editor1" class="form-control" rows="4" cols="50"></textarea> -->
                            <input type="text" name="stel" class="form-control" id="tel" />
							</div>
                            <div class="form-group">
                            <label for="name">Mobile Phone
</label>
                            <!-- <textarea name="page_content" id="editor1" class="form-control" rows="4" cols="50"></textarea> -->
                            <input type="text" name="smb" class="form-control" id="mb" />
							</div>
                            <div class="form-group">
                            <label for="name">Email ID
</label>
                            <!-- <textarea name="page_content" id="editor1" class="form-control" rows="4" cols="50"></textarea> -->
                            <input type="text" name="semail" class="form-control" id="email" />
							</div>
                            <div class="form-group">
                            <label for="name">Qualification</label>
                            <!-- <textarea name="page_content" id="editor1" class="form-control" rows="4" cols="50"></textarea> -->
                            <input type="text" name="squ" class="form-control" id="qu" />
							</div>
                            <div class="form-group">
                            <label for="name">Date Of Birth
</label>
                            <!-- <textarea name="page_content" id="editor1" class="form-control" rows="4" cols="50"></textarea> -->
                            <input type="date" name="sdob" class="form-control" id="dob" />

							</div>
                            <div class="form-group">
                            <label for="name">Date Of Anniversary
</label>
                            <!-- <textarea name="page_content" id="editor1" class="form-control" rows="4" cols="50"></textarea> -->
                            <input type="date" name="sdoa" class="form-control" id="doa" />
							</div>
                            <div class="form-group">
                            <label for="name">Members Wife Image</label>
                        <input type="file" name="simage" class="form-control" id="partner_image_name" />
							</div>
							
							
							
						
					</div>
                </div><!-- /.box-body -->
			
                <div class="box-body">
					<?php //print_r($dat); ?>
					<div class="form-group">
						<h6>@section('title', 'People  Add')</h6> 
					
                        <form method="post" id="testform">
						<div class="form-group">
								<label for="name">First Name</label>
								<input type="text" name="fnmm[]" class="form-control required " value="" id="fnmm"/>
								<!--{!! Form::number('price', 'value', array('class' => 'form-control')); !!}-->
							</div>
                            <div class="form-group">
								<label for="name">Last Name</label>
								<input type="text" name="lnmm[]" class="form-control required " value="" id="lnmm"/>
								<!--{!! Form::number('price', 'value', array('class' => 'form-control')); !!}-->
							</div>
                            <div class="form-group">
								<label for="name">email</label>
								<input type="text" name="email[]" class="form-control required " value="" id="emailxx"/>
								<!--{!! Form::number('price', 'value', array('class' => 'form-control')); !!}-->
							</div>
                           <div class="newone">
                           
                           </div>
							<div class="form-group">
								<input type="button" class="btn btn-primary addvalue" value="Add Other"/> 
							</div>
                            <div class="form-group">
								<input type="submit" class="btn btn-primary" value="Submit"/> 
							</div>
					</form>
					</div>
                   
                </div><!-- /.box-body -->
				
				

	{!! Form::close() !!} 


						
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