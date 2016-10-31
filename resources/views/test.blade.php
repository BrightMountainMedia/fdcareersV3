@extends('spark::layouts.app')

@section('content')
	<div class="container">
        @foreach( $departments as $department )
            @foreach( $old_departments as $old_dept )
            	@if ( $department->name == $old_dept->department_name )
        			<div class="row">
            			<div class="col-sm-6">
		            		<div class="panel panel-default">
	                			<div class="panel-heading">({{ $department->id }}) {{ $department->name }}</div>
				                <div class="panel-body">
									<p>Address1: {{ $department->hq_address1 }}</p>
									<p>State: {{ $department->hq_state }}</p>
				                </div>
		            		</div>
		            	</div>
		            	<div class="col-sm-6">
		            		<div class="panel panel-default">
	                			<div class="panel-heading">({{ $old_dept->department_id }}) {{ $old_dept->department_name }}</div>
				                <div class="panel-body">
									<p>Address1: {{ $old_dept->address1 }}</p>
									<p>State: {{ $old_dept->state }}</p>
				                </div>
		            		</div>
		            	</div>
		            </div>
                @endif
            @endforeach
        @endforeach

    </div>
@endsection