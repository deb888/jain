@extends('admin.master')



@section('content')
<div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box box-primary">
            <div class="box-body">
				<div class="pull-right">
				<a href="{{ url('/admin/events/add') }}"><input type="button" class="btn btn-info" value="Add Events"/></a> 
                                </div>
            <h6>@section('title', 'Event  Management')</h6> 
                <div class="box-body">
                <div class="panel-heading">Jain Event List</div>

                <div class="panel-body">
                {!! $calendar->calendar() !!}
    
                </div>
            </div>
        </div>
    </div>
</div>
@stop



