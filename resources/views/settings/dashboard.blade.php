@extends('spark::layouts.app')

@section('content')
<dashboard :user="user" inline-template>
    <div class="container">
        <!-- Application Dashboard -->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        <p>This is where I will be displaying:</p>

                        <ul>
                            <li>the latest jobs posted since last login</li>
                            <li>view saved jobs</li>
                            <li>view jobs applied to</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</dashboard>
@endsection
