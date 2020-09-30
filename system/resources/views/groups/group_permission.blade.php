{{-- layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Group Permissions')

{{-- vendor styles --}}
@section('vendor-style')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/select2/select2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/select2/select2-materialize.css')}}">
@endsection

{{-- page style --}}
@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/page-users.css')}}">
<style>
#accountForm label span{font-size: 12px;}
</style>
@endsection

{{-- page content --}}
@section('content')
<!-- users edit start -->
<div class="section users-edit">
  <div class="card">
    <div class="card-content">
      <h5>{{ __('locale.Add Permissions') }} @if(isset($group->name))({{ $group->name }})@endif</h5>

      <div class="divider mb-3"></div>
      <div class="row">
        <div class="col s12" id="account">
     
          <form id="accountForm" action="{{ url('add_group_post') }}" enctype='multipart/form-data' method="post">
            @csrf
            <div class="row">
              @if(isset($permissions) && count($permissions))
              @foreach($permissions as $perm)
              <div class="col s12">
                <p class="mb-1">
              <label>
                @php
                  $has_perm = \App\Helpers\Helper::check_permissions($group->id, $perm->id);
                @endphp
                <input type="checkbox" class="add_per" value="{{ $perm->id }}" group="{{ $group->id }}" @if($has_perm == 'true') checked="" @endif>
                <span>{{ $perm->name }}</span>
              </label>
              </p>
              </div>
              @endforeach
              @endif
              
              
              
           
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
     $(document).ready(function(){

    $('.add_per').on('change', function(e) {
      var perm = $(this).val();
      var group = $(this).attr('group');
      var status = 'off';
      if ($(this).prop('checked')) {
        status = 'on';
      }

      $.ajax({
        url: "{{ url('/update_permission') }}",
        type: "POST",
        data: {perm:perm, group:group, status:status, _token:"{{ csrf_token() }}"},
         success: function(result){
           
       }
     });
     
    });

  });
</script>


@endsection