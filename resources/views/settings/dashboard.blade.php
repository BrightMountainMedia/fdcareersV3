@extends('spark::layouts.app')

@section('content')
<dashboard :user="user" inline-template>
    <div class="container">
        <!-- Application Dashboard -->
        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">Saved Positions</div>

                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    @foreach ( $saved_positions as $position )
                                    <tr>
                                        <td class="vertical-align-middle dashboard" width="90%" @click="goToPosition({{ json_encode($position->toArray()) }})">
                                            {{ $position->title }}
                                        </td>
                                        <td class="vertical-align-middle dashboard remove" width="10%" @click="removeSaved({{ json_encode($position->toArray()) }})">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">Applied Positions</div>

                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    @foreach ( $applied_positions as $position )
                                    <tr>
                                        <td class="vertical-align-middle dashboard" width="90%" @click="goToPosition({{ json_encode($position->toArray()) }})">
                                            {{ $position->title }}
                                        </td>
                                        <td class="vertical-align-middle dashboard remove" width="10%" @click="removeApplied({{ json_encode($position->toArray()) }})">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Recent Positions in Your Notification States</div>

                    <div class="panel-body">
                        @if ( isset($alabama) )
                        <div class="col-md-4">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Alabama</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $alabama as $position )
                                        <tr>
                                            <td class="vertical-align-middle dashboard" @click="goToPosition({{ json_encode($position->toArray()) }})">
                                                {{ $position->title }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif

                        @if ( isset($alaska) )
                        <div class="col-md-4">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Alaska</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $alaska as $position )
                                        <tr>
                                            <td class="vertical-align-middle dashboard" @click="goToPosition({{ json_encode($position->toArray()) }})">
                                                {{ $position->title }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif

                        @if ( isset($arizona) )
                        <div class="col-md-4">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Arizona</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $arizona as $position )
                                        <tr>
                                            <td class="vertical-align-middle dashboard" @click="goToPosition({{ json_encode($position->toArray()) }})">
                                                {{ $position->title }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif

                        @if ( isset($arkansas) )
                        <div class="col-md-4">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Arkansas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $arkansas as $position )
                                        <tr>
                                            <td class="vertical-align-middle dashboard" @click="goToPosition({{ json_encode($position->toArray()) }})">
                                                {{ $position->title }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif

                        @if ( isset($california) )
                        <div class="col-md-4">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>California</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $california as $position )
                                        <tr>
                                            <td class="vertical-align-middle dashboard" @click="goToPosition({{ json_encode($position->toArray()) }})">
                                                {{ $position->title }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif

                        @if ( isset($colorado) )
                        <div class="col-md-4">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Colorado</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $colorado as $position )
                                        <tr>
                                            <td class="vertical-align-middle dashboard" @click="goToPosition({{ json_encode($position->toArray()) }})">
                                                {{ $position->title }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif

                        @if ( isset($connecticut) )
                        <div class="col-md-4">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Connecticut</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $connecticut as $position )
                                        <tr>
                                            <td class="vertical-align-middle dashboard" @click="goToPosition({{ json_encode($position->toArray()) }})">
                                                {{ $position->title }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif

                        @if ( isset($delaware) )
                        <div class="col-md-4">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Delaware</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $delaware as $position )
                                        <tr>
                                            <td class="vertical-align-middle dashboard" @click="goToPosition({{ json_encode($position->toArray()) }})">
                                                {{ $position->title }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif

                        @if ( isset($district_of_columbia) )
                        <div class="col-md-4">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>District of Columbia</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $district_of_columbia as $position )
                                        <tr>
                                            <td class="vertical-align-middle dashboard" @click="goToPosition({{ json_encode($position->toArray()) }})">
                                                {{ $position->title }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif

                        @if ( isset($florida) )
                        <div class="col-md-4">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Florida</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $florida as $position )
                                        <tr>
                                            <td class="vertical-align-middle dashboard" @click="goToPosition({{ json_encode($position->toArray()) }})">
                                                {{ $position->title }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif

                        @if ( isset($georgia) )
                        <div class="col-md-4">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Georgia</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $georgia as $position )
                                        <tr>
                                            <td class="vertical-align-middle dashboard" @click="goToPosition({{ json_encode($position->toArray()) }})">
                                                {{ $position->title }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif

                        @if ( isset($hawaii) )
                        <div class="col-md-4">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Hawaii</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $hawaii as $position )
                                        <tr>
                                            <td class="vertical-align-middle dashboard" @click="goToPosition({{ json_encode($position->toArray()) }})">
                                                {{ $position->title }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif

                        @if ( isset($idaho) )
                        <div class="col-md-4">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Idaho</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $idaho as $position )
                                        <tr>
                                            <td class="vertical-align-middle dashboard" @click="goToPosition({{ json_encode($position->toArray()) }})">
                                                {{ $position->title }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif

                        @if ( isset($illinois) )
                        <div class="col-md-4">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Illinois</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $illinois as $position )
                                        <tr>
                                            <td class="vertical-align-middle dashboard" @click="goToPosition({{ json_encode($position->toArray()) }})">
                                                {{ $position->title }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif

                        @if ( isset($indiana) )
                        <div class="col-md-4">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Indiana</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $indiana as $position )
                                        <tr>
                                            <td class="vertical-align-middle dashboard" @click="goToPosition({{ json_encode($position->toArray()) }})">
                                                {{ $position->title }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif

                        @if ( isset($iowa) )
                        <div class="col-md-4">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Iowa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $iowa as $position )
                                        <tr>
                                            <td class="vertical-align-middle dashboard" @click="goToPosition({{ json_encode($position->toArray()) }})">
                                                {{ $position->title }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif

                        @if ( isset($kansas) )
                        <div class="col-md-4">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Kansas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $kansas as $position )
                                        <tr>
                                            <td class="vertical-align-middle dashboard" @click="goToPosition({{ json_encode($position->toArray()) }})">
                                                {{ $position->title }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif

                        @if ( isset($kentucky) )
                        <div class="col-md-4">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Kentucky</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $kentucky as $position )
                                        <tr>
                                            <td class="vertical-align-middle dashboard" @click="goToPosition({{ json_encode($position->toArray()) }})">
                                                {{ $position->title }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif

                        @if ( isset($louisiana) )
                        <div class="col-md-4">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Louisiana</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $louisiana as $position )
                                        <tr>
                                            <td class="vertical-align-middle dashboard" @click="goToPosition({{ json_encode($position->toArray()) }})">
                                                {{ $position->title }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif

                        @if ( isset($maine) )
                        <div class="col-md-4">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Maine</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $maine as $position )
                                        <tr>
                                            <td class="vertical-align-middle dashboard" @click="goToPosition({{ json_encode($position->toArray()) }})">
                                                {{ $position->title }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif

                        @if ( isset($maryland) )
                        <div class="col-md-4">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Maryland</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $maryland as $position )
                                        <tr>
                                            <td class="vertical-align-middle dashboard" @click="goToPosition({{ json_encode($position->toArray()) }})">
                                                {{ $position->title }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif

                        @if ( isset($massachusetts) )
                        <div class="col-md-4">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Massachusetts</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $massachusetts as $position )
                                        <tr>
                                            <td class="vertical-align-middle dashboard" @click="goToPosition({{ json_encode($position->toArray()) }})">
                                                {{ $position->title }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif

                        @if ( isset($michigan) )
                        <div class="col-md-4">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Michigan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $michigan as $position )
                                        <tr>
                                            <td class="vertical-align-middle dashboard" @click="goToPosition({{ json_encode($position->toArray()) }})">
                                                {{ $position->title }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif

                        @if ( isset($minnesota) )
                        <div class="col-md-4">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Minnesota</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $minnesota as $position )
                                        <tr>
                                            <td class="vertical-align-middle dashboard" @click="goToPosition({{ json_encode($position->toArray()) }})">
                                                {{ $position->title }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif

                        @if ( isset($mississippi) )
                        <div class="col-md-4">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Mississippi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $mississippi as $position )
                                        <tr>
                                            <td class="vertical-align-middle dashboard" @click="goToPosition({{ json_encode($position->toArray()) }})">
                                                {{ $position->title }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif

                        @if ( isset($missouri) )
                        <div class="col-md-4">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Missouri</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $missouri as $position )
                                        <tr>
                                            <td class="vertical-align-middle dashboard" @click="goToPosition({{ json_encode($position->toArray()) }})">
                                                {{ $position->title }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif

                        @if ( isset($montana) )
                        <div class="col-md-4">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Montana</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $montana as $position )
                                        <tr>
                                            <td class="vertical-align-middle dashboard" @click="goToPosition({{ json_encode($position->toArray()) }})">
                                                {{ $position->title }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif

                        @if ( isset($nebraska) )
                        <div class="col-md-4">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nebraska</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $nebraska as $position )
                                        <tr>
                                            <td class="vertical-align-middle dashboard" @click="goToPosition({{ json_encode($position->toArray()) }})">
                                                {{ $position->title }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif

                        @if ( isset($nevada) )
                        <div class="col-md-4">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nevada</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $nevada as $position )
                                        <tr>
                                            <td class="vertical-align-middle dashboard" @click="goToPosition({{ json_encode($position->toArray()) }})">
                                                {{ $position->title }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif

                        @if ( isset($new_hampshire) )
                        <div class="col-md-4">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>New Hampshire</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $new_hampshire as $position )
                                        <tr>
                                            <td class="vertical-align-middle dashboard" @click="goToPosition({{ json_encode($position->toArray()) }})">
                                                {{ $position->title }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif

                        @if ( isset($new_jersey) )
                        <div class="col-md-4">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>New Jersey</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $new_jersey as $position )
                                        <tr>
                                            <td class="vertical-align-middle dashboard" @click="goToPosition({{ json_encode($position->toArray()) }})">
                                                {{ $position->title }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif

                        @if ( isset($new_mexico) )
                        <div class="col-md-4">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>New Mexico</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $new_mexico as $position )
                                        <tr>
                                            <td class="vertical-align-middle dashboard" @click="goToPosition({{ json_encode($position->toArray()) }})">
                                                {{ $position->title }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif

                        @if ( isset($new_york) )
                        <div class="col-md-4">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>New York</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $new_york as $position )
                                        <tr>
                                            <td class="vertical-align-middle dashboard" @click="goToPosition({{ json_encode($position->toArray()) }})">
                                                {{ $position->title }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif

                        @if ( isset($north_carolina) )
                        <div class="col-md-4">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>North Carolina</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $north_carolina as $position )
                                        <tr>
                                            <td class="vertical-align-middle dashboard" @click="goToPosition({{ json_encode($position->toArray()) }})">
                                                {{ $position->title }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif

                        @if ( isset($north_dakota) )
                        <div class="col-md-4">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>North Dakota</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $north_dakota as $position )
                                        <tr>
                                            <td class="vertical-align-middle dashboard" @click="goToPosition({{ json_encode($position->toArray()) }})">
                                                {{ $position->title }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif

                        @if ( isset($ohio) )
                        <div class="col-md-4">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Ohio</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $ohio as $position )
                                        <tr>
                                            <td class="vertical-align-middle dashboard" @click="goToPosition({{ json_encode($position->toArray()) }})">
                                                {{ $position->title }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif

                        @if ( isset($oklahoma) )
                        <div class="col-md-4">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Oklahoma</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $oklahoma as $position )
                                        <tr>
                                            <td class="vertical-align-middle dashboard" @click="goToPosition({{ json_encode($position->toArray()) }})">
                                                {{ $position->title }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif

                        @if ( isset($oregon) )
                        <div class="col-md-4">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Oregon</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $oregon as $position )
                                        <tr>
                                            <td class="vertical-align-middle dashboard" @click="goToPosition({{ json_encode($position->toArray()) }})">
                                                {{ $position->title }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif

                        @if ( isset($pennsylvania) )
                        <div class="col-md-4">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Pennsylvania</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $pennsylvania as $position )
                                        <tr>
                                            <td class="vertical-align-middle dashboard" @click="goToPosition({{ json_encode($position->toArray()) }})">
                                                {{ $position->title }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif

                        @if ( isset($rhode_island) )
                        <div class="col-md-4">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Rhode Island</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $rhode_island as $position )
                                        <tr>
                                            <td class="vertical-align-middle dashboard" @click="goToPosition({{ json_encode($position->toArray()) }})">
                                                {{ $position->title }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif

                        @if ( isset($south_carolina) )
                        <div class="col-md-4">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>South Carolina</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $south_carolina as $position )
                                        <tr>
                                            <td class="vertical-align-middle dashboard" @click="goToPosition({{ json_encode($position->toArray()) }})">
                                                {{ $position->title }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif

                        @if ( isset($south_dakota) )
                        <div class="col-md-4">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>South Dakota</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $south_dakota as $position )
                                        <tr>
                                            <td class="vertical-align-middle dashboard" @click="goToPosition({{ json_encode($position->toArray()) }})">
                                                {{ $position->title }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif

                        @if ( isset($tennessee) )
                        <div class="col-md-4">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Tennessee</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $tennessee as $position )
                                        <tr>
                                            <td class="vertical-align-middle dashboard" @click="goToPosition({{ json_encode($position->toArray()) }})">
                                                {{ $position->title }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif

                        @if ( isset($texas) )
                        <div class="col-md-4">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Texas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $texas as $position )
                                        <tr>
                                            <td class="vertical-align-middle dashboard" @click="goToPosition({{ json_encode($position->toArray()) }})">
                                                {{ $position->title }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif

                        @if ( isset($utah) )
                        <div class="col-md-4">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Utah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $utah as $position )
                                        <tr>
                                            <td class="vertical-align-middle dashboard" @click="goToPosition({{ json_encode($position->toArray()) }})">
                                                {{ $position->title }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif

                        @if ( isset($vermont) )
                        <div class="col-md-4">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Vermont</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $vermont as $position )
                                        <tr>
                                            <td class="vertical-align-middle dashboard" @click="goToPosition({{ json_encode($position->toArray()) }})">
                                                {{ $position->title }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif

                        @if ( isset($virginia) )
                        <div class="col-md-4">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Virginia</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $virginia as $position )
                                        <tr>
                                            <td class="vertical-align-middle dashboard" @click="goToPosition({{ json_encode($position->toArray()) }})">
                                                {{ $position->title }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif

                        @if ( isset($washington) )
                        <div class="col-md-4">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Washington</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $washington as $position )
                                        <tr>
                                            <td class="vertical-align-middle dashboard" @click="goToPosition({{ json_encode($position->toArray()) }})">
                                                {{ $position->title }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif

                        @if ( isset($west_virginia) )
                        <div class="col-md-4">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>West Virginia</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $west_virginia as $position )
                                        <tr>
                                            <td class="vertical-align-middle dashboard" @click="goToPosition({{ json_encode($position->toArray()) }})">
                                                {{ $position->title }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif

                        @if ( isset($wisconsin) )
                        <div class="col-md-4">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Wisconsin</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $wisconsin as $position )
                                        <tr>
                                            <td class="vertical-align-middle dashboard" @click="goToPosition({{ json_encode($position->toArray()) }})">
                                                {{ $position->title }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif

                        @if ( isset($wyoming) )
                        <div class="col-md-4">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Wyoming</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $wyoming as $position )
                                        <tr>
                                            <td class="vertical-align-middle dashboard" @click="goToPosition({{ json_encode($position->toArray()) }})">
                                                {{ $position->title }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</dashboard>
@endsection
