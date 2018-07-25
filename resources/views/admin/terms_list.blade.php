@extends('admin.master')
@section('content')
	<div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box box-primary">
                
                <div class="box-body">
					
					<div class="form-group">
						<table class="table table-bordered" id="example">
							<h6>@section('title', 'Terms Listing')</h6> 

							<thead>
								<tr>
									<th>AboutUs Content   </th>
									
									
									
								</tr>
							</thead>

							<tbody>
								@foreach ($dt as $terms)
									<tr>
										<td>{!! $terms->content !!}</td>
										
										
										<td> <a href="{{ route('terms_and_condition.edit', ['term_id'=>$terms->id,]) }}" class=""><i class="fa fa-fw fa-edit"></i></a>
											<a href="{{ route('terms_and_condition.delete', ['term_id'=>$terms->id,]) }}" class="" onclick="return confirm('Want to delete?');"><i class="fa fa-fw fa-trash"></i>
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

