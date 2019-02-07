<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'FLASH') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/core/jquery.min.js') }}" ></script>
    <script src="{{ asset('js/core/popper.min.js') }}" ></script>
    <script src="{{ asset('js/core/bootstrap-material-design.min.js') }}" ></script>
    <script src="{{ asset('js/plugins/moment.min.js') }}" ></script>
    <script src="{{ asset('js/plugins/bootstrap-datetimepicker.js') }}" ></script>
    <script src="{{ asset('js/plugins/nouislider.min.js') }}" ></script>

    <!-- {{-- plugin for google maps
        <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE" ></script> 
        --}} -->
      <script src="https://buttons.github.io/buttons.js" async defer></script>    
    <script src="{{ asset('js/material-kit.js') }}" ></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/material-kit.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
  <!--  {{--  <div id="app"> --}} -->
        @include('includes.navbar')
     <!--  {{--   <main class="py-4" > --}} -->
      <div class="container" style="margin-top: 70px">
        <div class="row">
         <!--  <div class="col-md-2 col-lg-2 ml-auto" style="margin-left: -20px">
           {{--  @include('includes.leftsidebar') --}}
          </div> -->
          <div class="col-md-8 col-lg-8 mx-auto">
            @include('includes.messages')
            <div class="card">
              <div class="card-header card-header-text card-header-primary">Jobs</div>
              <div class="card-body">
                @yield('content')
              </div>
            </div>
          </div>
         <!--  <div class="col-md-2 col-lg-2 ml-auto">
          {{--   @include('includes.sidebar') --}}
          </div> -->
        </div>
      </div>     
      <!--   {{-- @yield('content') --}}
        {{-- </main>
 --}}    -->
</body>
</html>
