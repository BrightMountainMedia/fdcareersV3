@extends('spark::layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <featured-position inline-template>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            {{ $position->title }}
                        </div>
                        <div class="panel-body">
                            <h1>Application Details</h1>
                            <p>{{ $position->application_details }}</p>
                        </div>
                    </div>
                </featured-position>
            </div>
        </div>
    </div>
@endsection