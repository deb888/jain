@extends('admin.master')
@section('content')
	<div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box box-primary">

                <div class="box-body">
				<div class="pull-right">
			<!--	<a href="{{ url('/admin/banner/add') }}"><input type="button" class="btn btn-info" value="Add Banner"/></a> -->
                                </div>
					<div class="form-group">
						<table class="table table-bordered" id="example">
							<h6>@section('title', 'Jain Directory List')</h6> 

							<thead>
								<tr>
									<th>&nbsp;  </th>
									<th>Full Name </th>
                                    <th>Full  Address </th>
									<th>status   </th>
									<th>Action   </th>



								</tr>
							</thead>

							<tbody>
								
							</tbody>
						</table>
					</div>
                </div><!-- /.box-body -->

            </div><!-- /.box -->
        </div><!-- /.col -->
	</div>
	<div style="float:right;"></div>
@stop()
