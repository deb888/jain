@extends('admin.master')
@section('content')
	<div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box box-primary">
                <div class="form-group col-md-12 pull-right">
			<input type="button" id="sendmail" value="Delete Multiple" class="btn btn-info"/>
			<input type="button" id="button" value="Selectall" class="btn btn-info"/>
			</div>
                <div class="box-body">
					
					<div class="form-group">
						<table class="table table-bordered" id="example">
							<h6>@section('title', 'Request Service Listing')</h6> 

							<thead>
								<tr>
									<tr>
									<th>&nbsp;</th>
									<th>Request Comes From</th>
									<th>Client Phone</th>
									<th>Client Email</th>
									<th>Client Name</th>
									<th>Submitted  Date(mm/dd/yyyy h:m)</th>
									<th>Status Change Date(mm/dd/yyyy h:m)</th>
									<th> Status </th>
									
									<th> Service Emergency </th>
									<th>Action</th>
									
									
								</tr>
									
									
								</tr>
							</thead>
<tbody>
								@foreach ($dt as $client)
									<tr>
										<td><input type="checkbox" name="user_id[]" value="{{ $client->id }}" class="cb"/></td>
										
										<td>{{ $client->first_name.' '.$client->last_name }}</td>
										<td>{{ $client->phone }}</td>
										<td>{{ $client->email }}</td>
										<td>{{ $client->name }}</td>
										<td>{{ date('m/d/Y h:i',strtotime($client->created_at)) }}</td>
										<td>@if($client->status==1)
										{{ date('m/d/Y h:i',$client->action_date) }} 
										@endif</td>
										<td><?php $sts=$client->status; if($sts==1){ echo '<span class="label label-success">Approved</span>';}else if($sts==2){echo '<span class="label label-danger">Pending</span>';}else{ echo '<span class="label label-warning">Unseen</span>';} ?></td>
										<td>@if($client->emergency_flag==1)
										<span class="label label-info">Emergency Request</span>
										@endif</td>
										<td> <a href="{{ route('clientservice.show', ['client_id'=>$client->id,]) }}" class=""><i class="fa fa-fw fa-edit"></i></a>
											<a href="{{ route('clientservice.print', ['client_id'=>$client->id,]) }}" class=""><i class="fa fa-print" aria-hidden="true"></i></a>
											<a href="{{ route('clientservice.delete',['client_id'=>$client->id,]) }}" class="" onclick="return confirm('Want to delete?');"><i class="fa fa-fw fa-trash"></i>
									
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

