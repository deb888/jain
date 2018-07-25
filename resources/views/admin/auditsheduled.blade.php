@extends('admin.master')
@section('content')
	<div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box box-primary">

                <div class="box-body">
				<div class="pull-right">			
                                </div>
					<div class="form-group">
						<table class="table table-bordered" id="example">
							<h6>@section('title', 'Transaction List')</h6> 

							<thead>
								<tr>
									<th>Customer Name</th>
									<th>Customer EmailId</th>
									<th>Customer Phone</th>	
									<th>Customer Address</th>					
									<th>Schedule Date </th>



								</tr>
							</thead>

							<tbody>
								@foreach ($dt as $about)
									<tr>
										<td>{!! $about->first_name !!} {!! $about->last_name !!}</td>
										<td>{!! $about->email !!}</td>
										<td>{!! $about->phone_no !!}</td>
										<td>{!! $about->address !!}</td>
										<td>{!! $about->shdl_date !!}</td>
									
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
                </div><!-- /.box-body -->

            </div><!-- /.box -->
        </div><!-- /.col -->
	</div>
	<div style="float:right;"></div>
@stop()
