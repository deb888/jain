@extends('admin.master')
@section('content')
	<div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box box-primary">
               
                <div class="box-body">
					
					<div class="form-group">
						<table class="table table-bordered" id="example">
							<h6>@section('title', 'User Listing')</h6> 

							<thead>
								<tr>
									<th>Full Name</th>
									<th>User Email</th>
									<th>Joining  Date(mm/dd/yyyy h:m)</th>
									<th> Status </th>
									<th>Action</th>
									
									
								</tr>
							</thead>

							<tbody>
								@foreach ($dt as $user)
									<tr>
										<td>{{ $user->first_name.' '.$user->last_name }}</td>
										<td>{{ $user->email }}</td>
										<td>{{ date('m/d/Y h:i',$user->register_time) }} </td>
										
										<td><?php $sts=$user->status; if($sts==1){ echo '<span class="label label-success">Approved</span>';}else if($sts==2){echo '<span class="label label-danger">Pending</span>';}else{ echo '<span class="label label-warning">Decline</span>';} ?></td>
										
										<td> <a href="{{ route('usermanagement.edit', ['user_id'=>$user->id,]) }}" class=""><i class="fa fa-fw fa-edit"></i></a>
											<a href="{{ route('user.delete',['user_id'=>$user->id,]) }}" class="" onclick="return confirm('Want to delete?');"><i class="fa fa-fw fa-trash"></i>
									
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
						
						
						
						
					</div>
                </div><!-- /.box-body -->
               
            </div><!-- /.box -->
        </div><!-- /.col -->
	</div>
	
	
	
	
	
@stop()

