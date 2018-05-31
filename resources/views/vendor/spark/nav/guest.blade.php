<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <!-- Collapsed Hamburger -->
            <div class="hamburger">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#spark-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <!-- Branding Image -->
            @include('spark::nav.brand')
        </div>

        <div class="collapse navbar-collapse" id="spark-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li><a href="{{ url('/search') }}">Search Jobs</a></li>
                <li><a href="{{ url('/about') }}">About Us</a></li>
                <li><a href="{{ url('/faq') }}">FAQ</a></li>
                <li><a href="{{ url('/contact') }}">Contact Us</a></li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <li><a href="https://www.facebook.com/fdcareers" target="_blank" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="/login" class="navbar-link">Login</a></li>
                <!-- <li><a href="/register" class="navbar-link">Subscribe</a></li>-->
            </ul>
        </div>
    </div>
</nav>
