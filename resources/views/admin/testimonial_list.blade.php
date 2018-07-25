@extends('admin.master')
@section('content')
	<div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box box-primary">
                
                <div class="box-body">
					
					<div class="form-group">
						<table class="table table-bordered" id="example">
							<h6>@section('title', 'Testimonials ')</h6> 

							<thead>
								<tr>
									<th>Id   </th>
									<th>&nbsp;   </th>
									<th>Topic   </th>
									<th> Name   </th>
									<th> Location   </th>
									<th> Topic Description </th>
									<th> Status </th>
									<th> Action </th>
									
									
									
								</tr>
							</thead>

							<tbody>
								@foreach ($dt as $index =>$testimonial)
									<tr>
										<td>{{ $index+1 }}</td>
										<td><img src="{{url('uploads')}}/{{ $testimonial->topicperson_image }}" class="img-thumbnail" alt="Cinque Terre" width="200" height="200">
								</td>
										<td>{{ $testimonial->topic_name }}</td>
										<td>{{ $testimonial->topic_person_name }} </td>
										<td>{{ $testimonial->topicperson_location }} </td>
										<td>{{ $testimonial->topic_description }} </td>
										<td><?php $sts=$testimonial->sts; if($sts==1){ echo '<span class="label label-success">Active</span>';}else if($sts==2){echo '<span class="label label-danger">Inactive</span>';} ?></td>
										
										
										<td> <a href="{{ route('testimonial.show', ['test_id'=>$testimonial->id,]) }}" class=""><i class="fa fa-fw fa-edit"></i></a>
										<a href="{{ route('testimonial.delete',['test_id'=>$testimonial->id,]) }}" class="" onclick="return confirm('Want to delete?');"><i class="fa fa-fw fa-trash"></i>
										
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

