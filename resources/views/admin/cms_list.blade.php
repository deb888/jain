@extends('admin.master')
@section('content')
	<div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box box-primary">
                
                <div class="box-body">
					
					<div class="form-group">
						<table class="table table-bordered" id="example">
							<h6>@section('title', 'Cms Content')</h6> 

							<thead>
								<tr>
									<th>HOW IT WORKS Heading   </th>
									
									<th>TESTIMONIALS Heading   </th>
									<th>OUR PARTNERS Heading </th>
									<th>Action   </th>
									
									
									
								</tr>
							</thead>

							<tbody>
								@foreach ($dt as $about)
									<tr>
										<td>{!! $about->howitworks_tagline !!}</td>
										
										<td>{!! $about->testimonial_tagline !!}</td>
										<td>{!! $about->ourpartner_tagline !!}</td>
										
										
										<td> <a href="{{ route('cms.show', ['our_id'=>$about->id,]) }}" class=""><i class="fa fa-fw fa-edit"></i></a>
											
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

