{{-- layout --}}
@extends('layouts.contentLayoutMaster') {{-- page title --}} 
@section('title','edit notification') {{-- vendor styles --}} 
@section('vendor-style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css"/>
<link rel="stylesheet" type="text/css" href="{{asset('vendors/select2/select2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/select2/select2-materialize.css')}}"> @endsection {{-- page style --}} @section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/page-users.css')}}"> @endsection {{-- page content --}} @section('content')
<!-- users edit start -->
<div class="section users-edit">
    <div class="card">
        <div class="card-content">
            <h5>Edit Notification  </h5>

            <div class="divider mb-3"></div>
            <div class="row">
                <div class="col s12" id="account">

                    <form id="accountForm" action="{{ url('update-notification') }}" enctype='multipart/form-data' method="post">
                        @csrf
                        <div class="row">
                            <div class="col s12 m12">
                                <div class="row">
                                    <div class="col s4 input-field">
                                        <label>
                                            <input type="checkbox" class="filled-in checkbox_select_feature" name="all_users" value="all_users" @if($notifications->notification_type == 'all_users') checked="checked" @endif>
                                            <span>All User</span>
                                        </label>
                                    </div>

                                    <div class="col s4 input-field">
                                        <label>
                                            <input type="checkbox" class="filled-in checkbox_select_feature" name="all_active" value="all_active" @if($notifications->notification_type == 'all_active') checked="checked" @endif>
                                            <span>All, Active Users</span>
                                        </label>
                                    </div>

                                    <div class="col s4 input-field">
                                        <label>
                                            <input type="checkbox" class="filled-in checkbox_select_feature" name="all_secretary" value="all_secretary" @if($notifications->notification_type == 'all_secretary') checked="checked" @endif>
                                            <span>All, Active Secretary</span>
                                        </label>
                                    </div>

                                    <div class="col s12 input-field">

                                    </div>
                                    <div class="col s12">
                                      <div class="row">  

                                        <div class="col s6 input-field">
                                          <input type="hidden" name="update_notification" value="{{ $notifications->id }}">
                                          <input id="title" name="title" type="text" required="" value="{{ $notifications->title }}">
                                         <label for="Phone">Title</label>
                                        </div>

                                        <div class="col s6 input-field">
                                          <input id="start_date" type="text" name="schedule_date" class="datetimepicker" autocomplete="off" value="{{ $notifications->schedule }}">
                                          <label for="Phone">Schedule Notification</label>
                                        </div>
                                      </div>
                                        
                                    </div>
                                      
                                    <div class="col s12 input-field">
                                       <label for="">Message</label><br>
                                       <textarea name="editor1">{{ $notifications->message }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                <div class="col s12 display-flex justify-content-end mt-3">
                    <button type="submit" class="btn indigo">
                        Update</button>
                    <a href="{{ url()->previous() }}" class="btn btn-light">Back</a>
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
{{--
<script src="{{asset('vendors/jquery-validation/jquery.validate.min.js')}}"></script> --}}
@endsection {{-- page scripts --}} 
@section('page-script')
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
 <script>
  CKEDITOR.replace( 'editor1' );
</script>

<script src="https://webhosting-devhere.com/js/jquery.datetimepicker.js"></script>
<script>
  $('.datetimepicker').datetimepicker({
    format:'Y-m-d H:i'
});
</script>

@endsection