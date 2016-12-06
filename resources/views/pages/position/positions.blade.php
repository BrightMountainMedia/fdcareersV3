@extends('spark::layouts.app')

@section('content')
<positions inline-template>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <table width="100%">
                            <tbody>
                                <tr>
                                    <td>Full Time, Paid-On-Call and Contractor Positions</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="panel-body">
                        @if ( Auth::user() && Auth::user()->subscribed() )
                            @if ( count($paidPositions) > 0 )
                                @foreach ($paidPositions as $position)
                                    <table width="100%">
                                        <tbody>
                                            <tr>
                                                <td><a href="/position/{{ $position->id }}">{{ $position->title }}</a>, {{ $position->position_type }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                @endforeach
                            @else
                            <p>There are no Full-Time, Paid-On-Call or Contractor Positions at this time.</p>
                            @endif
                        @else
                        <p><strong><em>Don't miss the deadline! We have over 700 active full-time, part-time, on call and volunteer jobs in our database.</em></strong></p>
                        <p>Full-time search and email alerts are only available for current subscribers. You can subscribe by <a href="/register">clicking here</a> or explore the site to learn more about how FD Careers can help you land a great job.</p>
                        @endif
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <table width="100%">
                            <tbody>
                                <tr>
                                    <td>Part Time and Volunteer Positions</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="panel-body">
                        @if ( count($unpaidPositions) > 0 )
                        @foreach ($unpaidPositions as $position)
                            <table width="100%">
                                <tbody>
                                    <tr>
                                        <td><a href="/position/{{ $position->id }}">{{ $position->title }}</a>, {{ $position->position_type }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        @endforeach
                        @else
                        <p>There are no Part-Time or Volunteer Positions at this time.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</positions>
@endsection