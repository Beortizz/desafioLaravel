<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name') }}</title>
        <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}"/>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        @stack('styles')
    </head>

    <body class="hold-transition sidebar-mini layout-fixed">
        {{-- @include('layouts.includes.preeloader') --}}
        <div class="wrapper">
            @include('admin.includes.navbar')
            @include('admin.includes.sidebar')
            <div class="content-wrapper">
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-12 text-center">
                                <h1>
                                    @yield('title')
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content">
                    <div id="app" class="container-fluid">
                        @yield('content')
                    </div>
                </div>
            </div>
            @include('admin.includes.footer')
        </div>
    </body>
</html>
