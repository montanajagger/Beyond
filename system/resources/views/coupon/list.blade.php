{{-- layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Customers')

{{-- vendors styles --}}
@section('vendor-style')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/data-tables/css/jquery.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css"
  href="{{asset('vendors/data-tables/extensions/Responsive/css/responsive.dataTables.min.css')}}">
@endsection

{{-- page styles --}}
@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/page-users.css')}}">
@endsection

{{-- page content --}}
@section('content')
<!-- users list start -->
<section class="users-list-wrapper section">
   
  <div class="users-list-table">

    <div class="card">
      <div class="card-content">
        <h5>Coupons <a class="waves-effect waves-light btn mb-1 mr-1 mb-2 float-right " href="{{ url('add-coupon') }}">Add Coupon</a></h5>

        <div class="responsive-table">
          <table id="users-list-datatable" class="table">
            <thead>
              <tr>
                <th></th>
                <th>#</th>
                <th>Code</th>
                <th>Type</th>
                <th>Coupon Value</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Status</th>
                <th>edit</th>
                <th>view</th>
              </tr>
            </thead>
            <tbody>

            @if(isset($coupons) && count($coupons) > 0) 
            @foreach($coupons as $key => $coupon) 
                <tr>
                <td></td>
                <td>{{ $key+1 }}</td>
                <td>{{ $coupon->code }}</td>
                <td>{{ $coupon->type }}</td>
                <td>{{ $coupon->coupon_value }}@if($coupon->type == "Percentage")%@endif</td>
                <td>{{ $coupon->start_time }}</td>
                <td>{{ $coupon->end_time }}</td>
                <td>
                  {{-- {{route('secretary.status')}} --}}
                  {{-- $subadmin->status? --}}
                    <div class="switch">
                        <label>
                            <input type="checkbox" onclick="status('{{csrf_token()}}','{{$coupon->id}}','{{url('coupon-status')}} ')" {{ $coupon->status == 1?'checked':''}} >
                            <span class="lever"></span>
                        </label>
                    </div>
                </td>
                <td><a href="{{url('edit-coupon')}}/{{ $coupon->id }}"><i class="material-icons">edit</i></a></td>
                <td><a onclick="return confirm('Are you sure?')" href="{{url('del-coupon')}}/{{ $coupon->id }}"><i style="color: red;" class="material-icons">delete</i></a></td>
              </tr>
            @endforeach  
            @endif
            </tbody>
          </table>
        </div>
        <!-- datatable ends -->
      </div>
    </div>
  </div>
</section>
<!-- users list ends -->
@endsection

{{-- vendor scripts --}}
@section('vendor-script')
<script src="{{asset('vendors/data-tables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendors/data-tables/extensions/Responsive/js/dataTables.responsive.min.js')}}"></script>
@endsection

{{-- page script --}}
@section('page-script')
<script src="{{asset('js/scripts/page-users.js')}}"></script>
<script>
 
  function status(token, id, route) {
    $.ajax({
        url : route,
        type: "POST",
        data: {_token: token, id: id},
        success: function (response) {
            //$(".table").load(location.href + " .table>*", "");
        }
    });
}

</script>
@endsection