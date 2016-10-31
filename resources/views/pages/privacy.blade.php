@extends('spark::layouts.app')

@section('content')
<div class="container">
    <!-- Application Dashboard -->
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Privacy Policy</div>

                <div class="panel-body privacy">
                    {!! $privacy !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection