{{-- layout --}} @extends('layouts.contentLayoutMaster') {{-- page title --}} @section('title','Users edit') {{-- vendor styles --}} 
@section('vendor-style')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/select2/select2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/select2/select2-materialize.css')}}"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css"/>
@endsection {{-- page style --}} 
@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/page-users.css')}}"> @endsection {{-- page content --}} @section('content')
<!-- users edit start -->
<div class="section users-edit">
    <div class="card">
        <div class="card-content">
            <h5>Edit Coupon  </h5>

            <div class="divider mb-3"></div>
            <div class="row">
                <div class="col s12" id="account">

                    <form id="accountForm" action="{{ url('update-coupon') }}" enctype='multipart/form-data' method="post">
                        @csrf
                        <input type="hidden" name="coupon_id" value="{{ $coupons->id }}">
                        <div class="row">
                            <div class="col s12">
                                <div class="row">
                                    <div class="col s6 input-field">
                                        <input id="code" @if(isset($coupons->code)) value="{{ $coupons->code }}"@endif name="code"  type="text" required>
                                        <label for="code">Coupon Code</label>
                                    </div>

                                      <div class="col s6 input-field">
                                        <select name="type" id="type" required>
                                          <option value="">--- Select---</option>
                                          <option value="Free" @if(isset($coupons->type) && $coupons->type == "Free") selected @endif>Free</option>
                                          <option value="Percentage" @if(isset($coupons->type) && $coupons->type == "Percentage") selected @endif>Percentage</option>
                                          <option value="Flat" @if(isset($coupons->type) && $coupons->type == "Flat") selected @endif>Flat</option>
                                        </select>
                                        <label for="type">Type</label>
                                       </div>

                                       <div class="col s6 input-field">
                                        <input id="ammount" name="coupon_value" type="number" @if(isset($coupons->coupon_value)) value="{{ $coupons->coupon_value }}" @endif required pattern="[0-9]*">
                                        <label for="ammount">Value</label>
                                      </div>

                                     <div class="col s6 input-field">
                                      <select name="status" id="status" required>
                                        <option value="">--- Select---</option>
                                        <option value="1" @if(isset($coupons->status) && $coupons->status == "1") selected @endif>Active</option>
                                        <option value="0" @if(isset($coupons->status) && $coupons->status == "0") selected @endif>Hold</option>
                                      </select>
                                      <label for="status">Status</label>
                                     </div>

                                     <div class="col s6 input-field">
                                      <input id="start_date" name="start_date" type="text" @if(isset($coupons->start_time)) value="{{ $coupons->start_time }}"@endif class="datetimepicker" autocomplete="off">
                                      <label for="start_date">Start Date</label>
                                    </div>

                                    <div class="col s6 input-field">
                                      <input id="end_date" name="end_date" type="text" @if(isset($coupons->end_time)) value="{{ $coupons->end_time }}"@endif class="datetimepicker" autocomplete="off">
                                      <label for="end_date">End Date</label>
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
@endsection {{-- vendor scripts --}} @section('vendor-script')
<script src="{{asset('vendors/select2/select2.full.min.js')}}"></script>
{{--
<script src="{{asset('vendors/jquery-validation/jquery.validate.min.js')}}"></script> --}} @endsection {{-- page scripts --}} @section('page-script')
<script src="{{asset('js/scripts/page-users.js')}}"></script>
<script src="{{asset('js/jquery.datetimepicker.js')}}"></script>
<script>
  $('.datetimepicker').datetimepicker({
    format:'Y-m-d H:i:s'
});
</script>

@endsection