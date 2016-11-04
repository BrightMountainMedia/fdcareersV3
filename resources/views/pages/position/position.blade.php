@extends('spark::layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @if(Session::has('error'))
            <div class="col-md-12">
                <div class="panel panel-danger">
                    <div class="panel-heading">Error: {{ Session::get('error') }}</div>
                </div>
            </div>
            @endif

            <div class="col-sm-7">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <table width="100%">
                            <tbody>
                                <tr>
                                    <td style="width: 60px;">({{ $position->state }})</td>
                                    <td>{{ $position->title }}</td>
                                    <td class="align-right" style="width: 120px;"><small class="capitalize">{{ $position->position_type }}</small></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="panel-body">
                        <p class="col-sm-3">
                            <strong>Application Details:</strong>
                        </p>
                        <p class="col-sm-9">
                            {{ $position->application_details }}
                        </p>
                        @if ($position->where_to_get_apps_label)
                        <p class="col-sm-3">
                            <strong>Where to get Apps:</strong>
                        </p>
                        <p class="col-sm-9">
                            {{ $position->qualifications_to_apply }}
                        </p>
                        @endif
                        @if ($position->qualifications_to_apply)
                        <p class="col-sm-3">
                            <strong>Qualifications to Apply:</strong>
                        </p>
                        <p class="col-sm-9">
                            {{ $position->qualifications_to_apply }}
                        </p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-sm-5">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <table width="100%">
                            <tbody>
                                <tr>
                                    <td><a href="/department/{{ $department->id }}">{{ $department->name }}</a></td>
                                    <td class="align-right" style="width: 125px;"><small class="capitalize">{{ $department->dept_type }}</small></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="panel-body">
                        @if ($department->email)
                        <div class="row">
                            <p class="col-sm-3">
                                <strong>Email:</strong>
                            </p>
                            <p class="col-sm-9">    
                                <a href="mailto:{{ $department->email }}">{{ $department->email }}</a>
                            </p>
                        </div>
                        @endif
                        @if ($department->hq_address1)
                        <div class="row">
                            <p class="col-sm-3">
                                <strong>HQ Address:</strong>
                            </p>
                            <p class="col-sm-9">
                                {{ $department->hq_address1 }}@if ($department->hq_address2 && $department->hq_address2 != $department->mail_po_box), {{ $department->hq_address2 }}@endif<br/>
                                {{ $department->hq_city }}, {{ $department->hq_state }}  {{ $department->hq_zip }}
                            </p>
                        </div>
                        @endif
                        @if ($department->county)
                        <div class="row">
                            <p class="col-sm-3">
                                <strong>County:</strong>
                            </p>
                            <p class="col-sm-9">
                                {{ $department->county }}
                            </p>
                        </div>
                        @endif
                        @if ($department->hq_phone)
                        <div class="row">
                            <p class="col-sm-3">
                                <strong>HQ Phone:</strong>
                            </p>
                            <p class="col-sm-9">
                                <a href="tel:{{ $department->hq_phone }}">{{ $department->hq_phone }}</a>
                            </p>
                        </div>
                        @endif
                        @if ($department->hq_fax)
                        <div class="row">
                            <p class="col-sm-3">
                                <strong>HQ Fax:</strong>
                            </p>
                            <p class="col-sm-9">
                                <a href="tel:{{ $department->hq_fax }}">{{ $department->hq_fax }}</a>
                            </p>
                        </div>
                        @endif
                        @if ($department->website)
                        <div class="row">
                            <p class="col-sm-3">
                                <strong>Website:</strong>
                            </p>
                            <p class="col-sm-9">
                                <a href="@if (strpos($department->website, 'http://') !== false) {{ $department->website }} @else http://{{ $department->website }} @endif" target="_blank">@if (strpos($department->website, 'http://') !== false) {{ $department->website }} @else http://{{ $department->website }} @endif</a>
                            </p>
                        </div>
                        @endif
                        @if ($department->mail_po_box)
                        <div class="row">
                            <p class="col-sm-3">
                                <strong>Mailing Address:</strong>
                            </p>
                            <p class="col-sm-9">
                                {{ $department->mail_po_box }}<br/>
                                {{ $department->mail_city }}, {{ $department->mail_state }}  {{ $department->mail_zip }}
                            </p>
                        </div>
                        @else
                            @if ($department->hq_address1 !== $department->mail_address1)
                        <div class="row">
                            <p class="col-sm-3">
                                <strong>Mailing Address:</strong>
                            </p>
                            <p class="col-sm-9">
                                {{ $department->mail_address1 }}@if ($department->mail_address2 && $department->mail_address2 != $department->mail_po_box), {{ $department->mail_address2 }}@endif<br/>
                                {{ $department->mail_city }}, {{ $department->mail_state }}  {{ $department->mail_zip }}
                            </p>
                        </div>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection