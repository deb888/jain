@extends('admin.master')
@section('content')
	<div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box box-primary">
                
                <div class="box-body">
				<div class="pull-right">
				<a href="{{ url('/admin/workcategory/add') }}"><input type="button" class="btn btn-info" value="Add Work"/></a></div>
					<div class="form-group">
						<table class="table table-bordered" id="example">
							<h6>@section('title', 'Our Partner List')</h6> 

							<thead>
								<tr>
									<th>&nbsp;  </th>
									<th>category name  </th>
									<th>status   </th>
									<th>Type   </th>
									<th>Action   </th>
									
									
									
								</tr>
							</thead>

							<tbody>
								@foreach ($dt as $about)
									<tr>
										<td><!--<img src="{{url('uploads/banner')}}/{{ $about->banner_image }}" class="img-thumbnail" alt="Cinque Terre" width="200" height="200">-->
								</td>
										<td>{{ $about->cat_nm }}</td>
										<td><?php $sts=$about->sts; if($sts==1){ echo '<span class="label label-success">Active</span>';}else if($sts==2){echo '<span class="label label-danger">Inactive</span>';} ?></td>
										<td>
										@if($about->cat_type==1)
											Exterior
										@else
											Interior
										@endif
										</td>
										<td> <a href="{{ route('workcategory.show', ['our_id'=>$about->id,]) }}" class=""><i class="fa fa-fw fa-edit"></i></a>
											<a href="{{ route('workcategory.delete',['our_id'=>$about->id,]) }}" class="" onclick="return confirm('Want to delete?');"><i class="fa fa-fw fa-trash"></i>
										
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

