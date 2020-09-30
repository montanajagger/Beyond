{{-- layout --}} @extends('layouts.contentLayoutMaster') {{-- page title --}} @section('title','Users edit') {{-- vendor styles --}} @section('vendor-style')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/select2/select2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/select2/select2-materialize.css')}}"> @endsection {{-- page style --}} @section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/page-users.css')}}"> @endsection {{-- page content --}} @section('content')
<!-- users edit start -->
<div class="section users-edit">
    <div class="card">
        <div class="card-content">
            <h5>{{ __('locale.Edit Customer') }}  </h5>

            <div class="divider mb-3"></div>
            <div class="row">
                <div class="col s12" id="account">

                    <form id="accountForm" action="{{ url('update-customer') }}" enctype='multipart/form-data' method="post">
                        @csrf
                        <input type="hidden" name="customer_id" value="{{ $customer->id }}">
                        <div class="row">
                            <div class="col s12 m6">
                                <div class="row">
                                    <div class="col s12 input-field">
                                        <input id="firstname" value="{{ $customer->name }}" name="name" pattern="[a-zA-Z ]*" type="text" required>
                                        <label for="firstname">{{ __('locale.Customer Name') }}</label>
                                    </div>
 
                                    <div class="col s6 input-field">
                                        <input id="email" name="email" type="email" disabled="" value="{{ $customer->email }}" required>
                                        <label for="email">{{ __('locale.E-mail') }}</label>
                                    </div>

                                    <div class="col s6 input-field">
                                      <input id="password" name="password" type="password" >
                                      <label for="password">{{ __('locale.Change Password') }}</label>
                                    </div> 

                                    <div class="col s12 input-field">
                                        <select name="city" id="city">
                                          <option value="">---Select---</option>

                                            @if(isset($cities) && count($cities)>0)
                                              @foreach($cities as $city)
                                                <option value="{{ $city->id }}" @if($customer->city == $city->id) selected="selected"  @endif >{{ $city->name }}</option>
                                              @endforeach
                                            @endif 
                                        </select>
                                         <label for="profile_discription">{{ __('locale.City') }}</label>
                                       </div>
                                    

                                </div>
                            </div>
                            <div class="col s12 m6">
                                <div class="row">


                                  <div class="col s12 input-field">
                
                                      <select name="title" id="title" >
                                        <option value="Mr" @if($customer->secretary_title == 'Mr') selected="selected"  @endif>Mr</option>
                                        <option value="Miss" @if($customer->secretary_title == 'Miss') selected="selected" @endif>Miss</option>
                                      </select>
                                      <label for="title">{{ __('locale.Customer Title') }}</label>
                                     </div>
                                    
                                    <div class="col s12 input-field">
                                        <input id="Phone" name="phone" pattern="[0-9]*" value="{{ $customer->phone }}" type="text" required="">
  
                                        <label for="Phone">{{ __('locale.Phone') }}</label>
                                    </div>

                                <div class="col s12 input-field">
                                    <select name="work" id="work" value="{{ old('work') }}">
                                      <option value="">---Select---</option>
                                      @if(isset($work) && count($work)>0)
                                        @foreach($work as $wrk)
                                          <option value="{{ $wrk->id }}" @if($customer->work == $wrk->id) selected="selected"  @endif>{{ $wrk->name }}</option>
                                        @endforeach
                                      @endif
                                    </select>
                                      <label for="profile_discription">{{ __('locale.Work') }}</label>
                                   </div>
                                </div>
                            </div>

                            <div class="col s12 m12">
                                <div class="row">

                                  <div class="col s12 input-field">
                                          <textarea name="note" id="note" class="materialize-textarea" spellcheck="false">{{ $customer->discription }}</textarea>
                                          <label for="profile_discription">{{ __('locale.Note') }}</label>
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
@endsection {{-- vendor scripts --}} @section('vendor-script')
<script src="{{asset('vendors/select2/select2.full.min.js')}}"></script>
{{--
<script src="{{asset('vendors/jquery-validation/jquery.validate.min.js')}}"></script> --}} @endsection {{-- page scripts --}} @section('page-script')
<script src="{{asset('js/scripts/page-users.js')}}"></script>
@endsection