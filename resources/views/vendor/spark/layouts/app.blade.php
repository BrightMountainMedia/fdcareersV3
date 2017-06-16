<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta Information -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('meta', '')

    <title>@yield('title', config('app.name'))</title>

    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600' rel='stylesheet' type='text/css'>
    <link href='/css/font-awesome.min.css' rel='stylesheet' type='text/css'>

    <!-- CSS -->
    @yield('styles', '')
    <link href="/css/sweetalert.css" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    @yield('scripts', '')

    <!-- Start of Woopra Code -->
    <script>
        (function(){
                var t,i,e,n=window,o=document,a=arguments,s="script",r=["config","track","identify","visit","push","call","trackForm","trackClick"],c=function(){var t,i=this;for(i._e=[],t=0;r.length>t;t++)(function(t){i[t]=function(){return i._e.push([t].concat(Array.prototype.slice.call(arguments,0))),i}})(r[t])};for(n._w=n._w||{},t=0;a.length>t;t++)n._w[a[t]]=n[a[t]]=n[a[t]]||new c;i=o.createElement(s),i.async=1,i.src="//static.woopra.com/js/w.js",e=o.getElementsByTagName(s)[0],e.parentNode.insertBefore(i,e)
        })("woopra");

        woopra.config({
            domain: 'fdcareers.com'
        });
        woopra.track();
    </script>
    <!-- End of Woopra Code -->

    <!-- Google Analytics -->
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-28785440-1', 'auto');
        ga('require', 'displayfeatures');
        ga('require', 'linkid');
        ga('send', 'pageview');
    </script>
    <!-- End of Google Analytics -->

    <!-- Global Spark Object -->
    <script>
        window.Spark = <?php echo json_encode(array_merge(
            Spark::scriptVariables(), []
        )); ?>;
    </script>
</head>
<body class="with-navbar">
    <div id="spark-app" v-cloak>
        <!-- Navigation -->
        @if (Auth::check())
            @include('spark::nav.user')
        @else
            @include('spark::nav.guest')
        @endif

        <!-- Main Content -->
        @yield('content')

        <!-- Application Level Modals -->
        @if (Auth::check())
            @include('spark::modals.notifications')
            @include('spark::modals.support')
            @include('spark::modals.session-expired')
        @endif

        <div class="push"></div>
    </div>
    <footer v-cloak>
        <div>This site is owned and operated by Bright Mountain Media, Inc., a publicly owned company trading with the symbol: <strong><a href="http://ir.brightmountainmedia.com/" target="_blank">BMTM</a></strong>.</div>
        <center>
        <a href="https://www.blackhelmetapparel.com/" target="_blank"><u>blackhelmetapparel</u></a> <a href="http://www.leoaffairs.com/" target="_blank"><u>leoaffairs</u></a> <a href="http://popularmilitary.com/" target="_blank"><u>popularmilitary</u></a> <a href="http://welcomehomeblog.com/" target="_blank"><u>welcomehomeblog</u></a> <a  href="https://www.jqpublicblog.com/" target="_blank"><u>jqpublicblog</u></a> <a  href="http://warisboring.com/" target="_blank"><u>warisboring</u></a> <a href="http://gopoliceblotter.com/" target="_blank"><u>gopoliceblotter</u></a> <a href="https://www.militaryhousingrentals.com/" target="_blank"><u>militaryhousingrentals</u></a></center>
        <div class="copyright">Copyright &copy; <?php echo date('Y'); ?> FD Careers. All Rights Reserved. <a href="https://www.fdcareers.com/terms">Terms of Use</a>|<a href="https://www.fdcareers.com/privacy">Privacy Policy</a></div>
    </footer>

    <!-- JavaScript -->
    <script src="/js/app.js"></script>
    <script src="/js/sweetalert.min.js"></script>
    @yield('footerScripts', '')
</body>
</html>
