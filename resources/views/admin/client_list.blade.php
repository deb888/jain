@extends('admin.master')
@section('content')
	<div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box box-primary">
                
                <div class="box-body">
					
					<div class="form-group">
						<table class="table table-bordered" id="example">
							<h6>@section('title', 'Client Listing')</h6> 

							<thead>
								<tr>
									<tr>
									<th>Full Name</th>
									<th>Client Email</th>
									<th>Joining  Date(mm/dd/yyyy h:m)</th>
									<th> Status </th>
									<th>Action</th>
									
									
								</tr>
									
									
								</tr>
							</thead>
<tbody>
								@foreach ($dt as $client)
									<tr>
										<td>{{ $client->first_name.' '.$client->last_name }}</td>
										<td>{{ $client->email }}</td>
										<td>{{ date('m/d/Y h:i',$client->register_time) }} </td>
										
										<td><?php $sts=$client->status; if($sts==1){ echo '<span class="label label-success">Approved</span>';}else if($sts==2){echo '<span class="label label-danger">Pending</span>';}else{ echo '<span class="label label-warning">Decline</span>';} ?></td>
										
										<td> <a href="{{ route('clientmanagement.show', ['client_id'=>$client->id,]) }}" class=""><i class="fa fa-fw fa-edit"></i></a>
											<a href="{{ route('clientmanagement.delete',['client_id'=>$client->id,]) }}" class="" onclick="return confirm('Want to delete?');"><i class="fa fa-fw fa-trash"></i>
									
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

