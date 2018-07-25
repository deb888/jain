@extends('admin.master')
@section('content')
	<div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box box-primary">
                
                <div class="box-body">
					
					<div class="form-group">
						<table class="table table-bordered" id="example">
							<h6>@section('title', 'About Us')</h6> 

							<thead>
								<tr>
									<th>AboutUs Content</th>
									<th>About Section Image</th>
                                                                        <th>AboutUs Our Partner Bottom Content</th>
									
									
								</tr>
							</thead>

							<tbody>
								@foreach ($dt as $about)
									<tr>
										<td>{!! substr($about->page_content,0,400) !!}</td>
										<td>
								<img src="{{url('uploads/aboutus')}}/{{ $about->aboutimage }}" class="img-thumbnail" alt="Cinque Terre"></td>
										  <td>{!! $about->our_partner_botton_content !!}</td>
										<td> <a href="{{ route('aboutus.show', ['about_id'=>$about->id,]) }}" class=""><i class="fa fa-fw fa-edit"></i></a>
											
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
	<div style="float:right;">{!! $dt->links() !!}</div>
@stop()

