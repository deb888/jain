@extends('admin.master')
@section('content')
	<div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box box-primary">
                
                <div class="box-body">
					
					<div class="form-group">
						<table class="table table-bordered" id="example">
							<h6>@section('title', 'How It Works Contenet')</h6> 

							<thead>
								<tr>
									<th> Id</th>
									<th> Step One heading And Content</th>
									<th> Step Two heading And Content</th>
									<th> Step Three heading And Content</th>
									
									
									
								</tr>
							</thead>

							<tbody>
								@foreach ($dt as $index=>$data)
									<tr>
										<td>{{ $index + 1 }}</td>
										<td>{!! $data->step_one_hed !!}</br>{!! $data->step_one_cont !!}</td>
										<td>{!! $data->step_two_hed !!}</br>{!! $data->step_two_cont !!}</td>
										<td>{!! $data->step_three_hed !!}</br>{!! $data->step_thres_cont !!}</td>
										
										
										<td> <a href="{{ route('howitworks.show', ['our_id'=>$data->id,]) }}" class=""><i class="fa fa-fw fa-edit"></i></a>
											
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
	<div style="float:right;"></div>
@stop()

