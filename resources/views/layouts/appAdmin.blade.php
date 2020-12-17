<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">

    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{ asset('js/jquery-1.7.2.min.js') }}"></script>
    <script src="{{ asset('js/excanvas.min.js') }}"></script>
    <script src="{{ asset('js/chart.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script language="javascript" type="text/javascript" src="{{ asset('js/full-calendar/fullcalendar.min.js') }}"></script>

    <script src="{{ asset('js/base.js') }}"></script>


    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-responsive.min.css') }}" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pages/dashboard.css') }}" rel="stylesheet">


    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
</head>
<body>
    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                            class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="index.html">Allô<span class="text-danger">Nounou</span> </a>
                <div class="nav-collapse">
                    <ul class="nav pull-right">

                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog"></i> Account <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                            <li><a href="javascript:;">Settings</a></li>
                            <li><a href="javascript:;">Help</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user"></i> {{ Auth::user()->prenom }}  <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="javascript:;">Profil</a></li>
                                <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                        <i class="icon-signout"></i> {{ __('Se déconnecter') }}</a></li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                            </ul>
                        </li>
                    </ul>
                    <form class="navbar-search pull-right">
                    <input type="text" class="search-query" placeholder="Search">
                    </form>
                </div>
                <!--/.nav-collapse -->
            </div>
            <!-- /container -->
        </div>
        <!-- /navbar-inner -->
    </div>
    <!-- /navbar -->

    <div class="subnavbar">
        <div class="subnavbar-inner">
            <div class="container">
                <ul class="mainnav">
                    <li class="{{ request()->is('Admin') ? 'active' : '' }}"><a href="{{route('dashboard')}}"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
                    <li><a href="reports.html"><i class="icon-list-alt"></i><span>Reports</span> </a> </li>
                    <li><a href="guidely.html"><i class="icon-facetime-video"></i><span>App Tour</span> </a></li>
                    <li><a href="charts.html"><i class="icon-bar-chart"></i><span>Charts</span> </a> </li>
                    <li><a href="shortcodes.html"><i class="icon-code"></i><span>Shortcodes</span> </a> </li>
                    <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-long-arrow-down"></i><span>Drops</span> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="icons.html">Icons</a></li>
                        <li><a href="faq.html">FAQ</a></li>
                        <li><a href="pricing.html">Pricing Plans</a></li>
                        <li><a href="login.html">Login</a></li>
                        <li><a href="signup.html">Signup</a></li>
                        <li><a href="error.html">404</a></li>
                    </ul>
                    </li>
                    <!-- compte -->
                    <li class="dropdown {{ request()->is('compte/list') ? 'active' : '' }}"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i><span>Gestion des comptes</span> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="icons.html">Administrateurs</a></li>
                        <li><a href="{{ route('compte_demandeur') }}">Demandes de profil</a></li>
                        <li><a href="{{ route('profil.index') }}">Liste des profils</a></li>
                        <li><a href="pricing.html">Recruteur</a></li>
                    </ul>
                    </li>
                </ul>
            </div>
            <!-- /container -->
        </div>
        <!-- /subnavbar-inner -->
    </div>
    <!-- /subnavbar -->

    <div class="main">

        <div class="main-inner">

            <div class="container">

            <div class="row">

                @yield('contenu')


            </div> <!-- /row -->

            </div> <!-- /container -->

        </div> <!-- /main-inner -->

    </div> <!-- /main -->



    <div class="extra">

        <div class="extra-inner">

            <div class="container">

                <div class="row">
                        <div class="span3">
                            <h4>
                                About Free Admin Template</h4>
                            <ul>
                                <li><a href="javascript:;">EGrappler.com</a></li>
                                <li><a href="javascript:;">Web Development Resources</a></li>
                                <li><a href="javascript:;">Responsive HTML5 Portfolio Templates</a></li>
                                <li><a href="javascript:;">Free Resources and Scripts</a></li>
                            </ul>
                        </div>
                        <!-- /span3 -->
                        <div class="span3">
                            <h4>
                                Support</h4>
                            <ul>
                                <li><a href="javascript:;">Frequently Asked Questions</a></li>
                                <li><a href="javascript:;">Ask a Question</a></li>
                                <li><a href="javascript:;">Video Tutorial</a></li>
                                <li><a href="javascript:;">Feedback</a></li>
                            </ul>
                        </div>
                        <!-- /span3 -->
                        <div class="span3">
                            <h4>
                                Something Legal</h4>
                            <ul>
                                <li><a href="javascript:;">Read License</a></li>
                                <li><a href="javascript:;">Terms of Use</a></li>
                                <li><a href="javascript:;">Privacy Policy</a></li>
                            </ul>
                        </div>
                        <!-- /span3 -->
                        <div class="span3">
                            <h4>
                                Open Source jQuery Plugins</h4>
                            <ul>
                                <li><a href="">Open Source jQuery Plugins</a></li>
                                <li><a href="">HTML5 Responsive Tempaltes</a></li>
                                <li><a href="">Free Contact Form Plugin</a></li>
                                <li><a href="">Flat UI PSD</a></li>
                            </ul>
                        </div>
                        <!-- /span3 -->
                    </div> <!-- /row -->

            </div> <!-- /container -->

        </div> <!-- /extra-inner -->

    </div> <!-- /extra -->




    <div class="footer">

        <div class="footer-inner">

            <div class="container">

                <div class="row">

                    <div class="span12">
                        &copy; 2013 <a href="#">Bootstrap Responsive Admin Template</a>.
                    </div> <!-- /span12 -->

                </div> <!-- /row -->

            </div> <!-- /container -->

        </div> <!-- /footer-inner -->

    </div> <!-- /footer -->


<!-- Le javascript
================================================== -->

</body>

</html>

