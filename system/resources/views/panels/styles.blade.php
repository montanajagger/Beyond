<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/vendors/vendors.min.css') }}">
<!-- BEGIN: VENDOR CSS-->
@yield('vendor-style')
<!-- END: VENDOR CSS-->
<!-- BEGIN: Page Level CSS-->
@if(!empty($configData['mainLayoutType']) && isset($configData['mainLayoutType']))

{{-- <link rel="stylesheet" type="text/css" href="{{asset('assets/backend/css/themes/'.$configData['mainLayoutType'].'-template/materialize.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/backend/css/themes/'.$configData['mainLayoutType'].'-template/style.css')}}"> --}}
<link rel="stylesheet" type="text/css" href="{{asset('assets/backend/css/backend/custom.css')}}">
 <link rel="stylesheet" type="text/css" href="{{asset('assets/backend/css/backend/style.css')}}">
  

@if($configData['mainLayoutType'] === 'horizontal-menu')
{{-- horizontal style file only for horizontal layout --}}
<link rel="stylesheet" type="text/css" href="{{asset('assets/backend/css/layouts/style-horizontal.css')}}">
@endif
@else
<h1>mainLayoutType option is either empty or not set in config custom.php file.</h1>
@endif

@yield('page-style')

@if($configData['direction'] === 'rtl')
{{-- rtl style file for rtl version --}}
<link rel="stylesheet" type="text/css" href="{{asset('assets/backend/css/style-rtl.css')}}">
@endif
<!-- END: Page Level CSS-->
<!-- BEGIN: Custom CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/backend/css/laravel-custom.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/backend/css/custom/custom.css')}}">
<!-- END: Custom CSS-->