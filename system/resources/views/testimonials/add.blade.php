{{-- layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Users edit')

{{-- vendor styles --}}
@section('vendor-style')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/select2/select2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/select2/select2-materialize.css')}}">
@endsection

{{-- page style --}}
@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/page-users.css')}}">
@endsection

{{-- page content --}}
@section('content')
<!-- users edit start -->
<div class="section users-edit">
  <div class="card">
    <div class="card-content">
      <h5>Add Testimonial </h5>

      <div class="divider mb-3"></div>
      <div class="row">
        <div class="col s12" id="account">
     
          <form id="accountForm" action="{{ url('add-testimonials') }}" enctype='multipart/form-data' method="post">
            @csrf
            <div class="row">
              <div class="col s12 m6">
                <div class="row">
                  <div class="col s12 input-field">
                    <input id="firstname" value="{{ old('firstname') }}" name="firstname"  type="text" required>
                    <label for="firstname">Name</label>
                  </div>

                  <div class="col s12 input-field">
                    <input id="Username" name="job" value="{{ old('username') }}"  type="text"  required>
                    <label for="Username">Job Title</label>
                   </div>                  
                  

                 
                    </div>
              </div>
              <div class="col s12 m6">
                <div class="row">
                  
                   
                  <div class="col s12 input-field">
                     <form action="#">
                      <div class="file-field input-field">
                        <div class="btn">
                          <span>Image</span>
                          <input type="file" name="picture" required="">
                        </div>
                        <div class="file-path-wrapper">
                          <input class="file-path validate" type="text">
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

              <div class="col s12 input-field">
                
                    <textarea id="description" name="description" class="materialize-textarea" placeholder="Description" spellcheck="false"></textarea>
                    
                  </div>
            
              <div class="col s12 display-flex justify-content-end mt-3">
                <button type="submit" class="btn indigo">
                  {{ __('locale.Save') }}</button>
                <button type="reset" class="btn btn-light">{{ __('locale.Cancel') }}</button>
              </div>
            </div>
          </form>
          <!-- users edit account form ends -->
        </div>
        
      </div>
      <!-- </div> -->
    </div>
  </div>
</div>
<!-- users edit ends -->
@endsection

{{-- vendor scripts --}}
@section('vendor-script')
<script src="{{asset('vendors/select2/select2.full.min.js')}}"></script>
{{-- <script src="{{asset('vendors/jquery-validation/jquery.validate.min.js')}}"></script> --}}
@endsection

{{-- page scripts --}}
@section('page-script')
<script src="{{asset('js/scripts/page-users.js')}}"></script>
@endsection