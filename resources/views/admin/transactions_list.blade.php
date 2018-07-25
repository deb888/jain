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
							<h6>@section('title', 'Transaction List')</h6> 

							<thead>
								<tr>
									<th>Transaction Id </th>
									<th>Customer Name</th>
									<th>Customer EmailId</th>
									<th>Customer Phone</th>
									<th>Package Buy </th>
									<th>Amount </th>
                                                                        <th>Pay Status </th>
								<!--	<th>Approved Status </th> -->
									<th>Buying Date </th>



								</tr>
							</thead>

							<tbody>
								@foreach ($dt as $about)
									<tr>
										<td>{!! $about->trans_id !!}</td>
										<td>{!! $about->first_name !!} {!! $about->last_name !!}</td>
										<td>{!! $about->email !!}</td>
										<td>{!! $about->phone_no !!}</td>
                                                                                <td>{!! $about->buy_package !!}</td>
										<td>{!! $about->tot_amount !!}</td>
										<td><?php $sts=$about->is_paid; if($sts==1){ echo '<span class="label label-success">Paid</span>';}else if($sts==0){echo '<span class="label label-danger">Not Paid</span>';} ?></td>
									<!--	<td>{!! $about->sts !!}</td>
										<input type="hidden" name="banner_id" id="banner_id" value="{{$about->id}}"/>
										</td> -->
										<td>{!! $about->created_at !!}</td>
									<!--	<td> <a href="{{ route('banner.show', ['our_id'=>$about->id,]) }}" class=""><i class="fa fa-fw fa-edit"></i></a>
											<a href="{{ route('banner.delete',['our_id'=>$about->id,]) }}" class="" onclick="return confirm('Want to delete?');"><i class="fa fa-fw fa-trash"></i>

											</td> -->
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
