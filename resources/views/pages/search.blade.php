@extends('spark::layouts.app')

@section('styles')
    <link href="/css/reset.css" rel="stylesheet">
    <link href="/css/fonts.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/map.css" rel="stylesheet">
@endsection

@section('scripts')
    <script src="/js/jquery.js"></script>
    <script src="/js/raphael.js"></script>
    <script src="/js/scale.raphael.js"></script>
    <script src="/js/paths.js"></script>
    <script src="/js/init.js"></script>
    <script type="text/javascript">var switchTo5x=true;</script>
    <script type="text/javascript" id="st_insights_js" src="https://ws.sharethis.com/button/buttons.js?publisher=030d97a2-0ec3-484d-8e90-840d2e0c3824"></script>
    <script type="text/javascript">stLight.options({publisher: "030d97a2-0ec3-484d-8e90-840d2e0c3824", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @include('pages.featured.featured-example')
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Search for Jobs</div>
                    <div class="panel-subheading">Choose a state by clicking the map below.</div>
                    <div class="panel-body">
                        <div class="mapWrapper">
                            <div id="map"></div>
                            <div id="text"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection