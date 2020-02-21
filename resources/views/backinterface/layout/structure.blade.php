<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <meta name="branch_id" content="{{ auth()->user()->user_branch }}">
    <meta name="user_id" content="{{ auth()->user()->user_id }}">
    <title>@yield('title')</title>

    @include('backinterface.partials.header_addons')
    @yield('header_addons')
</head>
<body>
<!-- BEGIN LOADER -->
    @include('backinterface.partials.loader')
<!--  END LOADER -->

<!--  BEGIN NAVBAR  -->
    @include('backinterface.partials.header')
<!--  END NAVBAR  -->

<!--  BEGIN NAVBAR  -->
    @include('backinterface.partials.header_info')
<!--  END NAVBAR  -->

<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container" id="container">

    <div class="overlay"></div>
    <div class="search-overlay"></div>

    <!--  BEGIN SIDEBAR  -->
        @include('backinterface.partials.menu')
    <!--  END SIDEBAR  -->

    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">

        @yield('content')

        @include('backinterface.partials.footer')
    </div>
    <!--  END CONTENT AREA  -->

</div>
<!-- END MAIN CONTAINER -->

@include('backinterface.partials.footer_addons')

@yield('footer_addons')

</body>
</html>
