{{-- layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Edit Package Plan')

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
      <h5>Edit Package Plan</h5>

      <div class="divider mb-3"></div>
      <div class="row">
        <div class="col s12" id="account">
          <form action="{{ url('edit_package_post') }}" method="post">
            @csrf
            <input type="hidden" name="plan_id" value="{{ $package_plan->id }}">

            <div class="row">
              <div class="col s12">
                <div class="row">
                  <div class="col s12 m6 input-field">
                    <input name="name_en" type="text" value="{{ $package_plan->name_en }}" required>
                    <label>Name in English</label>
                  </div>

                  <div class="col s12 m6 input-field">
                    <input name="name_ar" type="text" value="{{ $package_plan->name_ar }}" required>
                    <label>Name in Arabic</label>
                  </div>

                  <div class="col s12 m6 input-field">
                    <input name="amount" type="text" value="{{ $package_plan->amount }}" required>
                    <label>Amount</label>
                  </div>

                   <div class="col s12 m6 input-field">
                      <select name="duration" required="">
                      <option value="">Select</option>
                       @if(isset($package_durations) && count($package_durations) > 0)
                          @foreach($package_durations as $key => $duration)
                            <option value="{{ $duration->id }}" @if($package_plan->duration == $duration->id) selected @endif>{{ $duration->title_en }}-{{ $duration->title_ar }}</option>
                          @endforeach
                       @endif
                      </select>
                  <label>Duration</label>
                  </div>

                  <div class="col s12 m6 input-field">
                    @php
                    $all_features = explode('|', $package_plan->features);
                    $features_included = explode('|', $package_plan->features_included);
                    $cont = 0;
                    @endphp
                     @for($i = 1; $i <= 9; $i++)
                    <div class="col s9 m9 input-field">
                      <select name="features[]" required="">
                      <option value="">Select</option>
                        @if(isset($package_features) && count($package_features) > 0)
                          @foreach($package_features as $key => $feature)
                            <option value="{{ $feature->id }}" @if(isset($all_features[$cont]) && $all_features[$cont] == $feature->id) selected @endif >@if(Lang::locale() == 'ar'){{ $feature->name_ar }} @else {{ $feature->name_en }} @endif </option>
                          @endforeach
                        @endif
                      </select>
                  <label>Feature {{ $i }}</label>
                    </div>
                   <div class="col s3 m3 input-field">
                  <label>
                      <input type="hidden" name="features_included[]"  @if(isset($features_included[$cont]) && $features_included[$cont] == 1) value="1" @else value="0" @endif class="package_features{{ $i }}"  >
                      <input type="checkbox" class="filled-in checkbox_select_feature" id="package_features{{ $i }}" @if(isset($features_included[$cont]) && $features_included[$cont] == 1) checked  @endif >
                      <span>Included</span>
                  </label>
                  </div>
                    @php
                      $cont++;
                    @endphp
                    @endfor

                 </div>

              </div>

              <div class="col s12 display-flex justify-content-end mt-3">
                <button type="submit" class="btn indigo">
                  Update</button>

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
 <script>
   $('.checkbox_select_feature').on('change',function(){

      var attr_feature = $(this).attr('id');
       if($(this).prop("checked") == true){
             $('.'+attr_feature).attr('value',1);
      }
      else if($(this).prop("checked") == false){
           $('.'+attr_feature).attr('value',0);
      }

   });
 </script>
@endsection
