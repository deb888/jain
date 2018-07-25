@extends('admin.master')
@section('content')
	<div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box box-primary">
                
                <div class="box-body">
					
					<div class="form-group">
						<table class="table table-bordered" id="example">
							<h6>@section('title', 'Our Partner List')</h6> 

							<thead>
								<tr>
									<th>&nbsp;  </th>
									<th>Our Partner   </th>
									<th>Ordering   </th>
									<th>Action   </th>
									
									
									
								</tr>
							</thead>

							<tbody>
								@foreach ($dt as $about)
									<tr>
										<td><img src="{{url('uploads/partner')}}/{{ $about->partner_image_name }}" class="img-thumbnail" alt="Cinque Terre" width="200" height="200">
								</td>
										<td>{!! $about->partner_name !!}</td>
										<td><input type="text" name="order_id" value="{{ $about->orderx }}" class="form-control order_class"/>
										<input type="hidden" name="id" value="{{ $about->id }}"/>
										</td>
										
										
										<td> <a href="{{ route('ourpartner.show', ['our_id'=>$about->id,]) }}" class=""><i class="fa fa-fw fa-edit"></i></a>
											<a href="{{ route('ourpartner.delete',['our_id'=>$about->id,]) }}" class="" onclick="return confirm('Want to delete?');"><i class="fa fa-fw fa-trash"></i>
										
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

