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
<style>
  .propic {
    position: absolute;
    top: 17px;
    right: 50px;
    border: 5px solid #6c26a1;
    }
</style>
@endsection

{{-- page content --}}
@section('content')
<!-- users edit start -->
<div class="section users-edit">
  <div class="card">
    <div class="card-content">
      <h5>{{ __('locale.Edit Sub Admin') }}  </h5>

      <div class="divider mb-3"></div>
      <div class="row">

        <img class="circle propic" width="100" height="100" src="{{ url('uploads') }}/{{ $subadmin->picture }}" alt="">
        <div class="col s12" id="account">
        
          <form id="accountForm" action="{{ url('update-sub-admin') }}" enctype='multipart/form-data' method="post">
            @csrf
            <input type="hidden" name="user_id" value="{{ $subadmin->id }}">
            <div class="row">


              <div class="col s12 m6">
                <div class="row">
                  
                  <div class="col s12 input-field">
                    <input id="firstname" value="{{ (isset(explode(' ', $subadmin->name)[0]) ? explode(' ', $subadmin->name)[0] : '') }}" name="firstname" pattern="[a-zA-Z]*" type="text" required>
                    <label for="firstname">{{ __('locale.Firstname') }}</label>
                  </div>

                  <div class="col s12 input-field">
                    <input id="Username" name="username" disabled="" value="{{ $subadmin->username }}"  type="text"  required>
                    <label for="Username">{{ __('locale.Username') }}</label>
                   </div>                  
                  <div class="col s12 input-field">
                    <input id="Phone" name="phone" pattern="[0-9]*" value="{{ $subadmin->phone }}" type="text"  required="">
                    <label for="Phone">{{ __('locale.Phone') }}</label>
                   </div>

                  <div class="col s12 input-field">
                    <input id="password" name="password" type="password" >
                    <label for="password">{{ __('locale.Change Password') }}</label>
                   </div>

                    
                    </div>
              </div>
              <div class="col s12 m6">
                <div class="row">
                  <div class="col s12 input-field">
                
                    <input id="Lastname" name="lastname" value="{{ (isset(explode(' ', $subadmin->name)[1]) ? explode(' ', $subadmin->name)[1] : '') }}" pattern="[a-zA-Z]*" type="text"  required>
                    <label for="Lastname">{{ __('locale.Lastname') }}</label>
                   </div>

                      <div class="col s12 input-field">
                    <input id="email" name="email" type="email" disabled="" value="{{ $subadmin->email }}" required>
                    <label for="email">{{ __('locale.E-mail') }}</label>
                   </div>

                  <div class="col s12 input-field">       
                      <select name="permission" required="">
                      <option value="">Select</option>
                      @if(isset($groups) && count($groups) > 0) 
                      @foreach($groups as $key => $groups) 
                      <option value="{{ $groups->id }}" @if(!is_null($group_id) && $group_id->group_id == $groups->id) selected @endif >{{ $groups->name }}</option>
                      @endforeach   
                      @endif
                      </select>
                    <label>{{ __('locale.Permissions') }}</label>
                    </div>
                 
                  <div class="col s12 input-field">
                     <form action="#">
                      <div class="file-field input-field">
                        <div class="btn">
                          <span>{{ __('locale.Change Profile Image') }}</span>
                          <input type="file" name="picture">
                        </div>
                        <div class="file-path-wrapper">
                          <input class="file-path validate" type="text">
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
           
              <div class="col s12 display-flex justify-content-end mt-3">
                <button type="submit" class="btn indigo">
                  {{ __('locale.Save') }}</button>
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