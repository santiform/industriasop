@extends('adminlte::page')

{{-- Extend and customize the browser title --}}

@section('title')
    {{ config('adminlte.title') }}
    @hasSection('subtitle') | @yield('subtitle') @endif
@stop

{{-- Extend and customize the page content header --}}

@section('content_header')
    @hasSection('content_header_title')
        <h1 class="text-muted">
            @yield('content_header_title')

            @hasSection('content_header_subtitle')
                <small class="text-dark">
                    <i class="fas fa-xs fa-angle-right text-muted"></i>
                    @yield('content_header_subtitle')
                </small>
            @endif
        </h1>
    @endif
@stop

{{-- Rename section content to content_body --}}

@section('content')
    @yield('content_body')
@stop

{{-- Create a common footer --}}

@section('footer')
    <div class="float-right">
        Version: {{ config('app.version', '0.0.5') }}
    </div>

    <strong>
        <a href="{{ config('app.company_url', '#') }}">
            {{ config('app.company_name', 'Industrias OP Software') }}
        </a>
    </strong>
@stop

{{-- Add common Javascript/Jquery code --}}

@push('js')
<script>

    $(document).ready(function() {
        // Add your common script logic here...
    });

</script>

@endpush

{{-- Add common CSS customizations --}}

@push('css')


<style type="text/css">

    {{-- You can add AdminLTE customizations here --}}
    /*
    .card-header {
        border-bottom: none;
    }
    .card-title {
        font-weight: 600;
    }
    */

    .card {
        margin: 0 auto; /* Establece márgenes automáticos */
        margin-top: 1rem!important;
        margin-bottom: 6.8rem!important;
    }

    .card-header {
        background-color: #313131;
        font-weight: 700;
        font-size: 24px!important;
    }

    .card-body {
        padding: 2rem!important;
    }

    .form-group {
        margin-bottom: 2rem!important;
    }

    .form-group input {
        margin-top: -0.3rem!important;
        background-color: #454B50!important;
    }

    .form-group input:focus {
        border-color: #C7C7C7!important;
        outline: 0!important;
    }

    /* Estilos para campos de entrada autocompletados */
    .form-group input:-webkit-autofill,
    .form-group input:-webkit-autofill:hover,
    .form-group input:-webkit-autofill:focus {
        -webkit-box-shadow: 0 0 0 30px #454B50 inset !important;
        -webkit-text-fill-color: #fff !important;
    }

    .form-group select:focus {
        border-color: #C7C7C7!important;
        outline: 0!important;
    }
        
    .bg-white {
        background-color: #343a40!important;
        color: #D6D6D6!important;
    }

    .table-responsive {
        margin-bottom: -1rem!important;
    }

    .table-responsive th {
        background-color: #2C3033;
        border-bottom: none;
        text-align: center;
        border-bottom: none!important;
        color: #ebebeb!important;
        font-size: 20px!important;
    }

    .table-responsive td {
        background-color: #4a4f4f;
        color: #dadada!important;
        padding-bottom: 0.85rem!important;
        vertical-align: middle;
        text-align: center;
        font-size: 18px!important;
    }

    .table-responsive td a {
        margin-top: 1rem!important;
    }

    .table-responsive td button {
        margin-top: 1rem!important;
    }
    
    .user-menu {
        margin-top: -0.3rem!important;
    }

    .main-header {
        padding-top: 1rem!important;
    }

    .main-sidebar {
        padding-block: 0.45rem!important;
        align-content: center!important;
        align-items: center!important;
    }

    .main-sidebar a:hover {
        color: #d2d4d5!important;
    }

    .form-control-navbar, .input-group-append {
        margin-top: 1rem!important;
    }

    .dropdown-menu {
        margin-top: 0.45rem!important;
    }

    .btn-sidebar {
        margin-top: -1rem!important;
    }

    .form-control-navbar {
        width: 45px!important;
    }

    .main-footer a {
        color: #f4f4f4!important;
    }

}

</style>
@endpush



<link rel="stylesheet" type="text/css" href="../../resources/css/custom.css">



<link rel="shortcut icon" href="{{ asset('favicons/favicon.ico') }}"/>
<link rel="apple-touch-icon" sizes="57x57" href="{{ asset('favicons/apple-icon-57x57.png') }}">
<link rel="apple-touch-icon" sizes="60x60" href="{{ asset('favicons/apple-icon-60x60.png') }}">
<link rel="apple-touch-icon" sizes="72x72" href="{{ asset('favicons/apple-icon-72x72.png') }}">
<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicons/apple-icon-76x76.png') }}">
<link rel="apple-touch-icon" sizes="114x114" href="{{ asset('favicons/apple-icon-114x114.png') }}">
<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('favicons/apple-icon-120x120.png') }}">
<link rel="apple-touch-icon" sizes="144x144" href="{{ asset('favicons/apple-icon-144x144.png') }}">
<link rel="apple-touch-icon" sizes="152x152" href="{{ asset('favicons/apple-icon-152x152.png') }}">
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicons/apple-icon-180x180.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicons/favicon-16x16.png') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicons/favicon-32x32.png') }}">
<link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicons/favicon-96x96.png') }}">
<link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('favicons/android-icon-192x192.png') }}">
<link rel="manifest" href="{{ asset('favicons/manifest.json') }}">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="{{ asset('favicons/ms-icon-144x144.png') }}">
