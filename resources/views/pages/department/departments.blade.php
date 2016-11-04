@extends('spark::layouts.app')

@section('content')
    <div class="container">
        @foreach ($departments as $department)
        <div class="row">
            <div class="col-sm-7">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <table width="100%">
                            <tbody>
                                <tr>
                                    <td style="width: 75px;">({{ $department->fdid ?: $department->fdid }})</td>
                                    <td><a href="/department/{{ $department->id }}">{{ $department->name }}</a></td>
                                    <td class="align-right" style="width: 125px;"><small class="capitalize">{{ $department->dept_type }}</small></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="panel-body">
                        @if ($department->email)
                        <p class="col-sm-3">
                            <strong>Email:</strong>
                        </p>
                        <p class="col-sm-9">    
                            <a href="mailto:{{ $department->email }}">{{ $department->email }}</a>
                        </p>
                        @endif
                        @if ($department->hq_address1)
                        <p class="col-sm-3">
                            <strong>HQ Address:</strong>
                        </p>
                        <p class="col-sm-9">
                            {{ $department->hq_address1 }}@if ($department->hq_address2 && $department->hq_address2 != $department->mail_po_box), {{ $department->hq_address2 }}@endif<br/>
                            {{ $department->hq_city }}, {{ $department->hq_state }}  {{ $department->hq_zip }}
                        </p>
                        @endif
                        @if ($department->county)
                        <p class="col-sm-3">
                            <strong>County:</strong>
                        </p>
                        <p class="col-sm-9">
                            {{ $department->county }}
                        </p>
                        @endif
                        @if ($department->hq_phone)
                        <p class="col-sm-3">
                            <strong>HQ Phone:</strong>
                        </p>
                        <p class="col-sm-9">
                            <a href="tel:{{ $department->hq_phone }}">{{ $department->hq_phone }}</a>
                        </p>
                        @endif
                        @if ($department->hq_fax)
                        <p class="col-sm-3">
                            <strong>HQ Fax:</strong>
                        </p>
                        <p class="col-sm-9">
                            <a href="tel:{{ $department->hq_fax }}">{{ $department->hq_fax }}</a>
                        </p>
                        @endif
                        @if ($department->website)
                        <p class="col-sm-3">
                            <strong>Website:</strong>
                        </p>
                        <p class="col-sm-9">
                            <a href="@if (strpos($department->website, 'http://') !== false) {{ $department->website }} @else http://{{ $department->website }} @endif" target="_blank">@if (strpos($department->website, 'http://') !== false) {{ $department->website }} @else http://{{ $department->website }} @endif</a>
                        </p>
                        @endif
                        @if ($department->hq_address1 !== $department->mail_address1 && $department->hq_address2 !== $department->mail_address2 && $department->hq_address2 !== $department->mail_po_box)
                        <p class="col-sm-3">
                            <strong>Mailing Address:</strong>
                        </p>
                        <p class="col-sm-9">
                            {{ $department->mail_address1 }}@if ($department->mail_address2), {{ $department->mail_address2 }}@endif<br/>
                            {{ $department->mail_city }}, {{ $department->mail_state }}  {{ $department->mail_zip }}
                        </p>
                        @endif
                        @if ($department->mail_po_box)
                        <p class="col-sm-3">
                            <strong>Mailing Address:</strong>
                        </p>
                        <p class="col-sm-9">
                            {{ $department->mail_po_box }}<br/>
                            {{ $department->mail_city }}, {{ $department->mail_state }}  {{ $department->mail_zip }}
                        </p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-sm-5">
                <div class="panel panel-default">
                    <div class="panel-heading">Positions</div>
                    <div class="panel-body">
                        <ul>
                            @foreach ($positions as $position)
                                @if ( $position->department_id === $department->id )
                                <li><a href="/position/{{ $position->id }}">{{ $position->title }}</a> (<span class="capitalize">{{ $position->position_type }}</span>)</li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        {{ $departments->links() }}
    </div>
@endsection