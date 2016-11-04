@extends('spark::layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-7">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <table width="100%">
                            <tbody>
                                <tr>
                                    <td style="width: 75px;">({{ $department->fdid ?: $department->fdid }})</td>
                                    <td>{{ $department->name }}</td>
                                    <td class="align-right" style="width: 125px;"><small class="capitalize">{{ $department->dept_type }}</small></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="panel-body">
                        @if ($department->photo_url)
                        <p class="col-sm-12">
                            <img src="{{ url($department->photo_url) }}" alt="{{ $department->name }}" />
                        </p>
                        @endif
                        @if ($department->org_type)
                        <p class="col-sm-3">
                            <strong>Org-Type:</strong>
                        </p>
                        <p class="col-sm-9">    
                            {{ $department->org_type }}
                        </p>
                        @endif
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
                        @if ($department->stations)
                        <p class="col-sm-3">
                            <strong>Stations:</strong>
                        </p>
                        <p class="col-sm-9">
                            {{ $department->stations }}
                        </p>
                        @endif
                        <p class="col-sm-6">
                            <strong>Primary Agency for Emergency:</strong>
                        </p>
                        <p class="col-sm-6">
                            {{ $department->primary_agency_for_em ? 'Yes' : 'No' }}
                        </p>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">Active Firefighter's</div>
                    <div class="panel-body">
                        <p class="col-sm-4">
                            <strong>Career:</strong>
                        </p>
                        <p class="col-sm-4">
                            <strong>Volunteer:</strong>
                        </p>
                        <p class="col-sm-4">
                            <strong>Paid Per Call:</strong>
                        </p>
                        <p class="col-sm-4">
                            {{ $department->active_ff_career ? $department->active_ff_career : 0 }}
                        </p>
                        <p class="col-sm-4">
                            {{ $department->active_ff_volunteer ? $department->active_ff_volunteer : 0 }}
                        </p>
                        <p class="col-sm-4">
                            {{ $department->active_ff_paid_per_call ? $department->active_ff_paid_per_call : 0 }}
                        </p>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">Non-Firefighting</div>
                    <div class="panel-body">
                        <p class="col-sm-6">
                            <strong>Civilian:</strong>
                        </p>
                        <p class="col-sm-6">
                            <strong>Volunteer:</strong>
                        </p>
                        <p class="col-sm-6">
                            {{ $department->non_ff_civilian ? $department->non_ff_civilian : 0 }}
                        </p>
                        <p class="col-sm-6">
                            {{ $department->non_ff_volunteer ? $department->non_ff_volunteer : 0 }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-5">
                <div class="panel panel-default">
                    <div class="panel-heading">Positions</div>
                    <div class="panel-body">
                        <ul>
                            @foreach ($positions as $position)
                                <li><a href="/position/{{ $position->id }}">{{ $position->title }}</a> (<span class="capitalize">{{ $position->position_type }}</span>)</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection