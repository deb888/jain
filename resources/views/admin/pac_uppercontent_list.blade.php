@extends('admin.master')
@section('content')
	<div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box box-primary">
                
                <div class="box-body">
					
					<div class="form-group">
						<table class="table table-bordered" id="example">
							<h6>@section('title', 'Package Uppercontent')</h6> 

							<thead>
								<tr>
									<th>Pack Upper content Title</th>
									<th>Pack Upper content </th>                                                                     
									
									
								</tr>
							</thead>

							<tbody>
								@foreach ($dt as $about)
									<tr>
									        <td>{!! $about->pac_uppercontent_title !!}</td>
										<td>{!! $about->pac_uppercontent_content !!}</td>										
										<td> <a href="{{ route('pacuppercontent.show', ['about_id'=>$about->id,]) }}" class=""><i class="fa fa-fw fa-edit"></i></a>
											
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

