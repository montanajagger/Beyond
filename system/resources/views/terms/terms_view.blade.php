@extends('layouts.mainLayoutMaster')
@section('title', 'Terms')
@section('content')
    
    <main>
        <div id="hero" class="hero-area" style="margin-bottom: -20%;">
			<div class="section-title text-center mb-120">
			    @if(app()->getLocale() == 'en')
			    <h2 style="margin-bottom: 50px; margin-top: 50px;"> Terms & Conditions </h2> 
			    @else
			    <h2 style="margin-bottom: 50px; margin-top: 50px;"> الشروط والأحكام </h2> 
			    @endif
			    
				@if(app()->getLocale() == 'en')
					{!! $page_terms->page_body !!}
				@else
					{!! $page_terms->page_body_arabic !!}
				@endif
				
			</div>
        </div> <!-- ./hero-area -->
		
@endsection