
@extends('frontend.master')
@section('content')
 
<section class="inrpgsec profilepg">
	<div class="container">
    	<div class="row">
        	<div class="col-md-3">
            	<div class="profile-sidebar">
				@foreach($dt as $cm)
                	<img id="img-thumb" class="" src="{{ URL::to('/uploads/profilepics/').'/'.$cm->profile_img}}" width="100" hight="100">
					@endforeach
                    <div class="uploadpic">
                        <button class="btn" data-toggle="collapse" data-target="#demo">Edit/ Change Picture</button>
                        
						<div class="col-lg-12 text-center collapse" id="demo">
  {!! Form::open(array('route' => 'upload-post', 'method' => 'POST', 'id' => 'my-dropzone', 'class' => 'form single-dropzone', 'files' => true)) !!}
    <div id="img-thumb-preview">
      
    </div>
    <button id="upload-submit" class="btn btn-default margin-t-5"><i class="fa fa-upload"></i> Upload Picture</button>
  {!! Form::close() !!}
</div>
                    </div>
                    <h3>User</h3>
                    <div class="profile-usermenu">
					<ul class="nav">
						<li class="active">
							<a href="{{ url('/frontendprofile') }}">
							<i class="fa fa-home"></i>
							Overview </a>
						</li>
						<li>
							<a href="{{ url('/frontendprofilepass') }}">
							<i class="fa fa-user"></i>
							Account Settings </a>
						</li>
						<li>
							<a href="{{ url('/home/logout') }}" target="_blank">
							<i class="fa fa-sign-out"></i>
							Logout </a>
						</li>
					</ul>
				</div>
                </div>            	
            </div>
            <div class="col-md-9">
            	<div class="row">
            		<div class="col-md-9 col-sm-9 col-xs-8"><h2>Personal Info</h2></div>
                	<div class="col-md-3 col-sm-3 col-xs-4 text-right switchcol">
                		<!-- Rounded switch -->
                        
                        <label class="switch" id="sth">
                          <input type="checkbox" id="chek" value="1" name="chek"/>
                          <div class="slider round "></div>
                          <span class="switchtxt">Edit</span>
                        </label>
					</div>
                    </div>
					@foreach($dt as $cm)
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/frontendprofile') }}" id="form1">
                        {{ csrf_field() }}
                    <div class="form-group clearfix">
              			<label class="col-md-2 control-label">Email:</label>
             		<div class="col-md-9">
                		<input class="form-control" value="{{ $cm->email}}" type="text" name="email" id="email" disabled="disabled">
              			</div>
            		</div>
                    <div class="form-group clearfix">
                      <label class="col-md-2 control-label">First name:</label>
                      <div class="col-md-9">
                        <input class="form-control" value="{{ $cm->first_name}}" type="text" name="first_name" id="first_name" disabled="disabled">
                      </div>
                    </div>
                    <div class="form-group clearfix">
                      <label class="col-md-2 control-label">Last name:</label>
                      <div class="col-md-9">
                        <input class="form-control" value="{{ $cm->last_name}}" type="text" name="last_name" id="last_name" disabled="disabled">
                      </div>
                    </div>
                   <div class="form-group clearfix">
                      <label class="col-md-2 control-label">Phone:</label>
                      <div class="col-md-9">
                        <input class="form-control" value="{{ $cm->phone_no}}" type="text" name="phone_no" id="phone_no" disabled="disabled">
                      </div>
                    </div>
                   
                    <div class="form-group clearfix">
                      <label class="col-md-2 control-label">Address:</label>
                      <div class="col-md-9">
                        <input class="form-control" value="{{ $cm->address}}" type="text" name="address" id="address" disabled="disabled">
                      </div>
                    </div>
                    <div class="form-group clearfix">
                      <label class="col-md-2 control-label"></label>
                      <div class="col-md-9">
                        <input class="btn btn-primary " value="Save Changes" type="submit" id="sub" disabled="disabled">
                        <span></span>
                        <input class="btn btn-default " value="Cancel" type="reset" id="clrtest">
                      </div>
                    </div>
          </form>
		  @endforeach
            </div>
        </div>
    </div>
</section>
@stop()



