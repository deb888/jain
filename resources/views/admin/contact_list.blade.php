@extends('admin.master')
@section('content')
	<div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box box-primary">
                
                <div class="box-body">
					
					<div class="form-group">
						<table class="table table-bordered" id="example">
							<h6>@section('title', 'Contact Listing')</h6> 

							<thead>
								<tr>
									<tr>
									<th>Address</th>
									<th>Email</th>
									<th>Phone No</th>
									<th>Facebook Link</th>	
									<th>Action</th>
									
									
								</tr>
									
									
								</tr>
							</thead>
<tbody>
								@foreach ($dt as $contact)
									<tr>
										<td>{{ $contact->address }}</td>
										<td>{{ $contact->email }}</td>
										<td>{{ $contact->emergency_phone }}</td>
										<td>{{ $contact->fb_link }}</td>
										
										
										
										<td> <a href="{{ route('contactmanagement.show', ['client_id'=>$contact->id,]) }}" class=""><i class="fa fa-fw fa-edit"></i></a>
											<!--<a href="{{ route('contactmanagement.delete',['client_id'=>$contact->id,]) }}" class="" onclick="return confirm('Want to delete?');"><i class="fa fa-fw fa-trash"></i>-->
									
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

