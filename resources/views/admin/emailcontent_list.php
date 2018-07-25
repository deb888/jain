@extends('admin.master')
@section('content')
	<div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box box-primary">
               
                <div class="box-body">
					
					<div class="form-group">
						<table class="table table-bordered" id="example">
							<h6>@section('title', 'Email Template Listing')</h6> 

							<thead>
								<tr>
									<th>Email Type</th>
									<th>Email Subject</th>
									<th>Email Body</th>
									
									<th>Action</th>
									
									
								</tr>
							</thead>

							<tbody>
								@foreach ($dt as $email)
									<tr>
										<td>{{ $email->email_type }}</td>
										<td>{{ $email->email_subject }}</td>
										<td>{{ $email->email_body }} </td>
										
										
										<td> <a href="{{ route('usermanagement.edit', ['mail_id'=>$email->id,]) }}" class=""><i class="fa fa-fw fa-edit"></i></a>
											<a href="{{ route('user.delete',['mail_id'=>$email->id,]) }}" class="" onclick="return confirm('Want to delete?');"><i class="fa fa-fw fa-trash"></i>
									
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

