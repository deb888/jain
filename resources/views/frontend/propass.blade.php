
@extends('frontend.master')
@section('content')
<section class="inrpgsec profilepg">
	<div class="container">
    	<div class="row">
        	<div class="col-md-3">
            	<div class="profile-sidebar">
				@foreach($dt as $cm)
                	<img id="img-thumb" class="" src="{{ URL::to('/uploads/profilepics').'/'.$cm->profile_img}}" width="100" hight="100">
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
            		<div class="col-md-9 col-sm-9 col-xs-8"><h2>Account Settings</h2></div>
                	
                    </div>
                   
                     <form class="form-horizontal" role="form" method="POST" action="{{ url('/frontendprofilepass') }}" id="form1">
                        {{ csrf_field() }}
            
                        <div class="form-group clearfix">
                          <label class="col-md-3 control-label">Old Password:</label>
                          <div class="col-md-9">
                            <input class="form-control" value="" type="password" name="oldpassword" id="oldpassword">
                          </div>
                        </div>
                        <div class="form-group clearfix">
                          <label class="col-md-3 control-label">New Password:</label>
                          <div class="col-md-9">
                            <input class="form-control" value="" type="password" name="password" id="password">
                          </div>
                        </div>
                        <div class="form-group clearfix">
                          <label class="col-md-3 control-label">Confirm New Password:</label>
                          <div class="col-md-9">
                            <input class="form-control" value="" type="password" name="conpassword" id="conpassword">
                          </div>
                        </div>
                        <div class="form-group clearfix">
                          <label class="col-md-3 control-label"></label>
                          <div class="col-md-9">
                            <input class="btn btn-primary " value="Save Changes" type="submit">
                            <span></span>
                            <input class="btn btn-default" value="Cancel" type="reset">
                          </div>
                        </div>
          </form>
            </div>
        </div>
    </div>
</section>

@stop()


