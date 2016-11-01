@extends('spark::layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <table width="100%">
                            <tbody>
                                <tr>
                                    <td>Full Time, Paid-On-Call & Contractor Positions</td>
                                    <td class="align-right">Fire Department</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="panel-body">
                        @foreach ($positions as $position)
                            @if ( $position->position_type === 'full-time' || $position->position_type === 'paid-on-call' || $position->position_type === 'contractor' )
                                <table width="100%">
                                    <tbody>
                                        <tr>
                                            <td>({{ $position->state }}) <a href="/position/{{ $position->id }}">{{ $position->title }}</a>, {{ $position->position_type }}</td>
                                            <td class="align-right">
                                                @foreach ($departments as $department)
                                                    @if ($position->department_id === $department->id)
                                                    <a href="/department/{{ $department->id }}">{{ $department->name }}</a>
                                                    @endif
                                                @endforeach
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection