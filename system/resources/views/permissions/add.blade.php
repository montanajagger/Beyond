{{-- layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Permission Add')

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
      <h5>Add Permission</h5>

      <div class="divider mb-3"></div>
      <div class="row">
        <div class="col s12" id="account">
     
          <form id="accountForm" action="{{ url('add_permission_post') }}" enctype='multipart/form-data' method="post">
            @csrf
            <div class="row">
              <div class="col s12 m12">
                <div class="row">
                  <div class="col s12 input-field">
                    <input id="name" value="{{ old('name') }}" name="name" type="text" required>
                    <label for="name">Title</label>
                  </div>

                  <div class="col s12 input-field">
                    <textarea id="description" name="description">{{ old('description') }}</textarea>
                    <label for="description" style="left: 1.5rem;">Description</label>
                  </div>
                    </div>
              </div>
              
           
              <div class="col s12 display-flex justify-content-end mt-3">
                <button type="submit" class="btn indigo">
                  Save</button>
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