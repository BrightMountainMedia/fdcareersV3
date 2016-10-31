@extends('spark::layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">About FD Careers</div>
                    <div class="panel-body">
                        <p>At FD Careers, we know what it takes to become a firefighter, because we've gone through the hiring process ourselves.</p>
                        <p>We started back in 1992 by sending out postcards for fire tests in Illinois. We've changed quite a bit over the last twenty years, but our #1 goal has always been to help you become a firefighter.</p>
                        <p>We are always looking for new ways to help you achieve your goals, as well as ways to improve our service. If you have a suggestion or idea, please let us know!</p>
                        <p>Just shoot us an email at <a href="mailto:info@fdcareers.com">info@fdcareers.com</a> and we'll try to make it happen.</p>
                        <p><img src="{{ URL::to('/') }}/img/fire_station.jpg" alt="" width="" height=""></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection