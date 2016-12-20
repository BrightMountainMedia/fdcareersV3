@extends('spark::layouts.app')

@section('meta')
    <meta property="og:app_id" content="611587618967503" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="https://{{ $_SERVER['HTTP_HOST'] }}{{ $_SERVER['REQUEST_URI'] }}" />
    <meta property="og:title" content="{{ $position->title }}" />
    <meta property="og:description" content="{{ substr(strip_tags($position->application_details), 0, 150) }}..." />
    <meta property="og:image" content="https://www.fdcareers.com/img/facebook-position.jpg" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />
@endsection

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

            @if ( isset($info) )
            <div class="col-md-12">
                <div class="panel panel-info">
                    <div class="panel-heading"><center>{{ $info }}</center></div>
                </div>
            </div>
            @endif

            @if ( isset($department) )
            <div class="col-sm-8">
                @if ( Auth::check() )
                    @if ( in_array(Auth::user()->email, Spark::$developers) || Auth::user()->id === $department->owner_id )
                    <div class="panel panel-default panel-flush">
                        <!-- Create Button -->
                        <a class="btn btn-primary btn-block inverse" href="/settings#/department/{{ $department->id }}/position/{{ $position->id }}">
                            <i class="fa fa-pencil"></i> Edit this Position
                        </a>
                    </div>
                    @endif
                @endif

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
                        @if ($position->video)
                        <div class="video-container">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $position->video }}" frameborder="0" allowfullscreen></iframe>
                        </div>
                        <br/>
                        @endif
                        @if ($position->salary)
                        <div class="row">
                            <div class="col-sm-3">
                                <strong>Salary:</strong>
                            </div>
                            <div class="col-sm-9">
                                {{ $position->salary }}
                            </div>
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-sm-3">
                                <strong>Application Details:</strong>
                            </div>
                            <div class="col-sm-9">
                                {!! nl2br($position->application_details) !!}
                            </div>
                        </div>
                        @if ($position->testing_details)
                        <div class="row">
                            <div class="col-sm-3">
                                <strong>Testing Details:</strong>
                            </div>
                            <div class="col-sm-9">
                                {!! nl2br($position->testing_details) !!}
                            </div>
                        </div>
                        @endif
                        @if ($position->orientation_details)
                        <div class="row">
                            <div class="col-sm-3">
                                <strong>Orientation Details:</strong>
                            </div>
                            <div class="col-sm-9">
                                {!! nl2br($position->orientation_details) !!}
                            </div>
                        </div>
                        @endif
                        @if ($position->requirements)
                        <div class="row">
                            <div class="col-sm-3">
                                <strong>Duties / Requirements:</strong>
                            </div>
                            <div class="col-sm-9">
                                {!! nl2br($position->requirements) !!}
                            </div>
                        </div>
                        @endif
                        @if ($position->qualifications)
                        <div class="row">
                            <div class="col-sm-3">
                                <strong>Qualifications:</strong>
                            </div>
                            <div class="col-sm-9">
                                {!! nl2br($position->qualifications) !!}
                            </div>
                        </div>
                        @endif
                        @if ($position->residency_requirements)
                        <div class="row">
                            <div class="col-sm-3">
                                <strong>Residency Requirements:</strong>
                            </div>
                            <div class="col-sm-9">
                                {!! nl2br($position->residency_requirements) !!}
                            </div>
                        </div>
                        @endif
                        @if ($position->doc1_title && $position->doc1_url)
                        <div class="row">
                            <div class="col-sm-9 col-sm-offset-3">
                                <a href="{{ $position->doc1_url }}">{{ $position->doc1_title }}</a>
                            </div>
                        </div>
                        <br/>
                        @endif
                        @if (! $position->doc1_title && $position->doc1_url)
                        <div class="row">
                            <div class="col-sm-9 col-sm-offset-3">
                                <a href="{{ $position->doc1_url }}">{{ $position->doc1_url }}</a>
                            </div>
                        </div>
                        <br/>
                        @endif
                        @if ($position->doc2_title && $position->doc2_url)
                        <div class="row">
                            <div class="col-sm-9 col-sm-offset-3">
                                <a href="{{ $position->doc2_url }}">{{ $position->doc2_title }}</a>
                            </div>
                        </div>
                        <br/>
                        @endif
                        @if (! $position->doc2_title && $position->doc2_url)
                        <div class="row">
                            <div class="col-sm-9 col-sm-offset-3">
                                <a href="{{ $position->doc2_url }}">{{ $position->doc2_url }}</a>
                            </div>
                        </div>
                        <br/>
                        @endif
                        @if ($position->doc3_title && $position->doc3_url)
                        <div class="row">
                            <div class="col-sm-9 col-sm-offset-3">
                                <a href="{{ $position->doc3_url }}">{{ $position->doc3_title }}</a>
                            </div>
                        </div>
                        <br/>
                        @endif
                        @if (! $position->doc3_title && $position->doc3_url)
                        <div class="row">
                            <div class="col-sm-9 col-sm-offset-3">
                                <a href="{{ $position->doc3_url }}">{{ $position->doc3_url }}</a>
                            </div>
                        </div>
                        <br/>
                        @endif
                        @if ($position->doc4_title && $position->doc4_url)
                        <div class="row">
                            <div class="col-sm-9 col-sm-offset-3">
                                <a href="{{ $position->doc4_url }}">{{ $position->doc4_title }}</a>
                            </div>
                        </div>
                        <br/>
                        @endif
                        @if (! $position->doc4_title && $position->doc4_url)
                        <div class="row">
                            <div class="col-sm-9 col-sm-offset-3">
                                <a href="{{ $position->doc4_url }}">{{ $position->doc4_url }}</a>
                            </div>
                        </div>
                        <br/>
                        @endif
                        @if ($position->doc5_title && $position->doc5_url)
                        <div class="row">
                            <div class="col-sm-9 col-sm-offset-3">
                                <a href="{{ $position->doc5_url }}">{{ $position->doc5_title }}</a>
                            </div>
                        </div>
                        <br/>
                        @endif
                        @if (! $position->doc5_title && $position->doc5_url)
                        <div class="row">
                            <div class="col-sm-9 col-sm-offset-3">
                                <a href="{{ $position->doc5_url }}">{{ $position->doc5_url }}</a>
                            </div>
                        </div>
                        <br/>
                        @endif
                        @if ($position->doc6_title && $position->doc6_url)
                        <div class="row">
                            <div class="col-sm-9 col-sm-offset-3">
                                <a href="{{ $position->doc6_url }}">{{ $position->doc6_title }}</a>
                            </div>
                        </div>
                        <br/>
                        @endif
                        @if (! $position->doc6_title && $position->doc6_url)
                        <div class="row">
                            <div class="col-sm-9 col-sm-offset-3">
                                <a href="{{ $position->doc6_url }}">{{ $position->doc6_url }}</a>
                            </div>
                        </div>
                        <br/>
                        @endif
                        @if ($position->apply_link)
                        <div class="row">
                            <div class="col-sm-9 col-sm-offset-3">
                                <a class="btn btn-primary" href="{{ $position->apply_link }}" target="_blank">Apply</a>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                @if ( Auth::check() )
                <position-dashboard inline-template>
                    <div>
                        <div class="panel panel-default panel-flush">
                            @if ( isset($saved) )
                            <!-- Saved -->
                            <button type="submit" class="btn btn-primary btn-block" disabled="disabled">
                                Saved <i class="fa fa-check-square-o"></i>
                            </button>
                            @else
                            <!-- Save to Dashboard -->
                            <button type="submit" class="btn btn-primary btn-block" @click="addToDashboard({{ json_encode($position->toArray()) }})">
                                Save to Dashboard <i class="fa fa-square-o"></i>
                            </button>
                            @endif
                        </div>

                        <div class="panel panel-default panel-flush">
                            @if ( isset($applied) )
                            <!-- Saved -->
                            <button type="submit" class="btn btn-primary btn-block" disabled="disabled">
                                Applied <i class="fa fa-check-square-o"></i>
                            </button>
                            @else
                            <!-- Mark as Applied -->
                            <button type="submit" class="btn btn-primary btn-block" @click="markApplied({{ json_encode($position->toArray()) }})">
                                Mark Applied <i class="fa fa-square-o"></i>
                            </button>
                            @endif
                        </div>
                    </div>
                </position-dashboard>
                @endif

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
                            <div class="col-sm-3">
                                <strong>Email:</strong>
                            </div>
                            <div class="col-sm-9">    
                                <a href="mailto:{{ $department->email }}">{{ $department->email }}</a>
                            </div>
                        </div>
                        @endif
                        @if ($department->hq_address1)
                        <div class="row">
                            <div class="col-sm-3">
                                <strong>HQ Address:</strong>
                            </div>
                            <div class="col-sm-9">
                                {{ $department->hq_address1 }}@if ($department->hq_address2 && $department->hq_address2 != $department->mail_po_box), {{ $department->hq_address2 }}@endif<br/>
                                {{ $department->hq_city }}, {{ $department->hq_state }}  {{ $department->hq_zip }}
                            </div>
                        </div>
                        @endif
                        @if ($department->county)
                        <div class="row">
                            <div class="col-sm-3">
                                <strong>County:</strong>
                            </div>
                            <div class="col-sm-9">
                                {{ $department->county }}
                            </div>
                        </div>
                        @endif
                        @if ($department->hq_phone)
                        <div class="row">
                            <div class="col-sm-3">
                                <strong>HQ Phone:</strong>
                            </div>
                            <div class="col-sm-9">
                                <a href="tel:{{ $department->hq_phone }}">{{ $department->hq_phone }}</a>
                            </div>
                        </div>
                        @endif
                        @if ($department->hq_fax)
                        <div class="row">
                            <div class="col-sm-3">
                                <strong>HQ Fax:</strong>
                            </div>
                            <div class="col-sm-9">
                                <a href="tel:{{ $department->hq_fax }}">{{ $department->hq_fax }}</a>
                            </div>
                        </div>
                        @endif
                        @if ($department->website)
                        <div class="row">
                            <div class="col-sm-3">
                                <strong>Website:</strong>
                            </div>
                            <div class="col-sm-9">
                                <a href="@if (strpos($department->website, 'http://') !== false) {{ $department->website }} @else http://{{ $department->website }} @endif" target="_blank">@if (strpos($department->website, 'http://') !== false) {{ $department->website }} @else http://{{ $department->website }} @endif</a>
                            </div>
                        </div>
                        @endif
                        @if ($department->mail_po_box)
                        <div class="row">
                            <div class="col-sm-3">
                                <strong>Mailing Address:</strong>
                            </div>
                            <div class="col-sm-9">
                                {{ $department->mail_po_box }}<br/>
                                {{ $department->mail_city }}, {{ $department->mail_state }}  {{ $department->mail_zip }}
                            </div>
                        </div>
                        @else
                            @if ($department->hq_address1 !== $department->mail_address1)
                        <div class="row">
                            <div class="col-sm-3">
                                <strong>Mailing Address:</strong>
                            </div>
                            <div class="col-sm-9">
                                {{ $department->mail_address1 }}@if ($department->mail_address2 && $department->mail_address2 != $department->mail_po_box), {{ $department->mail_address2 }}@endif<br/>
                                {{ $department->mail_city }}, {{ $department->mail_state }}  {{ $department->mail_zip }}
                            </div>
                        </div>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
@endsection