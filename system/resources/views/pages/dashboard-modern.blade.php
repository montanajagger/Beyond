{{-- layout extend --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Dashboard Modern')

{{-- vendor styles --}}
@section('vendor-style')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/animate-css/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/chartist-js/chartist.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/chartist-js/chartist-plugin-tooltip.css')}}">
@endsection

{{-- page styles --}}
@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-modern.css')}}">
 @endsection

{{-- page content --}}
@section('content')
<div class="section">
   <!-- Current balance & total transactions cards-->
      <!-- Current balance & total transactions cards-->
   <div class="row vertical-modern-dashboard">
      <div class="col s12 m3 l3">
         <div class="card animate fadeLeft">
            <div class="card-content">
               <h6 class="mb-0 mt-0 display-flex justify-content-between">
                  Total clients
               </h6>
               <h5 class="center-align">{{ $total_clients }}</h5>
            </div>
         </div>
      </div>
      <div class="col s12 m3 l3">
         <div class="card animate fadeLeft">
            <div class="card-content">
               <h6 class="mb-0 mt-0 display-flex justify-content-between">
                  Total active clients
               </h6>
               <h5 class="center-align">{{ $total_active_clients }}</h5>
            </div>
         </div>
      </div>
      <div class="col s12 m3 l3">
         <div class="card animate fadeLeft">
            <div class="card-content">
               <h6 class="mb-0 mt-0 display-flex justify-content-between">
                  Total secretaries
               </h6>
               <h5 class="center-align">{{ $total_secretaries }}</h5>
            </div>
         </div>
      </div>
      <div class="col s12 m3 l3">
         <div class="card animate fadeLeft">
            <div class="card-content">
               <h6 class="mb-0 mt-0 display-flex justify-content-between">
                  Total income
               </h6>
               <h5 class="center-align">{{ $total_income }}</h5>
            </div>
         </div>
      </div>
      <div class="col s12 m12 l12">
        <div class="card user-statistics-card animate fadeLeft">
            <div class="card-content">
               <h4 class="card-title mb-0">User Subscriptions</h4>
               <div class="row">
                  <div class="col s12 m6">
                  @foreach(DB::table('user_subscriptions')->orderBy('created_at', 'desc')->limit(5)->get() as $subscription)
                     <ul class="collection border-none mb-0">
                        <li class="collection-item avatar">
                           <i class="material-icons circle pink accent-2">subscriptions</i>
                           <p class="medium-small">{{DB::table('package_plans')->where('id', $subscription->plan_id)->first()->name_en}}</p>
                           <p class="medium-small">Amount: {{$subscription->payment}}</p>
                        </li>
                     </ul>
                  @endforeach
                  </div>
               </div>
               <div class="user-statistics-container">
                  <div id="user-statistics-bar-chart" class="user-statistics-shadow">
                     <a href="{{ route('subscriptions.list') }}">Click here to see all subscriptions</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--<div class="col s12 m8 l8 animate fadeRight">-->
         <!-- Total Transaction -->
      <!--   <div class="card">-->
      <!--      <div class="card-content">-->
      <!--         <h4 class="card-title mb-0">Total Transaction <i class="material-icons float-right">more_vert</i></h4>-->
      <!--         <p class="medium-small">This month transaction</p>-->
      <!--         <div class="total-transaction-container">-->
      <!--            <div id="total-transaction-line-chart" class="total-transaction-shadow"></div>-->
      <!--         </div>-->
      <!--      </div>-->
      <!--   </div>-->
      <!--</div>-->

   </div>
</div>
 @endsection

{{-- vendor scripts --}}
@section('vendor-script')
<script src="{{asset('vendors/chartjs/chart.min.js')}}"></script>
<script src="{{asset('vendors/chartist-js/chartist.min.js')}}"></script>
<script src="{{asset('vendors/chartist-js/chartist-plugin-tooltip.js')}}"></script>
<script src="{{asset('vendors/chartist-js/chartist-plugin-fill-donut.min.js')}}"></script>
@endsection

{{-- page scripts --}}
@section('page-script')
<script src="{{asset('js/scripts/dashboard-modern.js')}}"></script>
 @endsection
