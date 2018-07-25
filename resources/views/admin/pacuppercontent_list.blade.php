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
							<h6>@section('title', 'Package Upper content')</h6> 

							<thead>
								<tr>
									<th>Upper  Title </th>
                                                                        <th>Upper  Content </th>
									<!--<th>status   </th>-->
									<th>Action   </th>



								</tr>
							</thead>

							<tbody>
								@foreach ($dt as $about)
									<tr>
										
                                                                                <td>{!! $about->title !!}</td>
										<td>{!! $about->content !!}</td>
										<input type="hidden" name="banner_id" id="banner_id" value="{{$about->id}}"/>
										<td> <a href="{{ route('uppercontent.show', ['our_id'=>$about->id,]) }}" class=""><i class="fa fa-fw fa-edit"></i></a>
											<!--<a href="{{ route('banner.delete',['our_id'=>$about->id,]) }}" class="" onclick="return confirm('Want to delete?');"><i class="fa fa-fw fa-trash"></i> -->

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
