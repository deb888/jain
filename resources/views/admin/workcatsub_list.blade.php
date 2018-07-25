@extends('admin.master')
@section('content')
	<div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box box-primary">
                
                <div class="box-body">
				<div class="pull-right">
				<a href="{{ url('/admin/worksubcatcon/add') }}"><input type="button" class="btn btn-info" value="Add Sub listing"/></a></div>
					<div class="form-group">
						<table class="table table-bordered" id="example">
							<h6>@section('title', 'Our Partner List')</h6> 

							<thead>
								<tr>
									<th>&nbsp;  </th>
									<th>Sub Listing Name  </th>
									<th>Category Name</th>
									<th>Action   </th>
									
									
									
								</tr>
							</thead>

							<tbody>
							<?php  $i=1; ?>
								@foreach ($dt as $about)
									<tr>
										<td>
										{{  $i }}
								</td>
										<td>{{ $about->sub_desc }}</td>
										<!--<td><?php $sts=$about->sts; if($sts==1){ echo '<span class="label label-success">Active</span>';}else if($sts==2){echo '<span class="label label-danger">Inactive</span>';} ?></td>-->
										<td>
										{{ $about->cat_nm }}
										</td>
										<td> <a href="{{ route('worksubcatcon.show', ['our_id'=>$about->id,]) }}" class=""><i class="fa fa-fw fa-edit"></i></a>
											<a href="{{ route('worksubcatcon.delete',['our_id'=>$about->id,]) }}" class="" onclick="return confirm('Want to delete?');"><i class="fa fa-fw fa-trash"></i>
										
											</td>
									</tr>
									<?php  $i++; ?>
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

