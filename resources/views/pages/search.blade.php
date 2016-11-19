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
@endsection

@section('content')
<search-page inline-template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Featured Position
                        <div class="pull-right">
                            <div class="addthis_inline_share_toolbox" :data-url="href" :data-title="title"></div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <p class="featured-title">@{{ title }}</p>

                        <p><span v-html="details"></span> <a class="featured-url" :href="href">learn more</a></p>
                    </div>
                </div>
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
</search-page>
@endsection

@section('footerScripts')
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5820bcba4f82a184"></script> 
@endsection