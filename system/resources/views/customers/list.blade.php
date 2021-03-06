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
        <h5>{{ __('locale.Customers') }} <a class="waves-effect waves-light btn mb-1 mr-1 mb-2 float-right " href="{{ url('add-customer') }}">{{ __('locale.Add Customer') }}</a></h5>

        <div class="responsive-table">
          <table id="users-list-datatable" class="table">
            <thead>
              <tr>
                <th></th>
                <th>#</th>
                <th>{{ __('locale.Name') }}</th>
                <th>{{ __('locale.Email') }}</th>
                <th>{{ __('locale.Phone') }}</th>
                <th>{{ __('locale.City') }}</th>
                <th>{{ __('locale.Work') }}</th>
                <th>{{ __('locale.Status') }}</th>
                <th>{{ __('locale.Edit') }}</th>
                <th>{{ __('locale.View') }}</th>
              </tr>
            </thead>
            <tbody>

            @if(isset($customers) && count($customers) > 0) 
            @foreach($customers as $key => $customer) 
                <tr>
                <td></td>
                <td>{{ $key+1 }}</td>
                <td>{{ $customer->secretary_title }} {{ $customer->name }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->phone }}</td>
                <td>{{  Helper::get_city_name($customer->city) }}</td>
                <td>{{ Helper::get_work_name($customer->work) }}</td>
                <td>
                  {{-- {{route('secretary.status')}} --}}
                  {{-- $subadmin->status? --}}
                    <div class="switch">
                        <label>
                            {{__('inactive')}}
                            <input type="checkbox" onclick="status('{{csrf_token()}}','{{$customer->id}}','{{url('customer-status')}} ')" {{ $customer->status == 1?'checked':''}} >
                            <span class="lever"></span>
                            {{__('active')}}
                        </label>
                    </div>
                </td>
                <td><a href="{{url('edit-customer')}}/{{ $customer->id }}"><i class="material-icons">edit</i></a></td>
                <td><a onclick="return confirm('Are you sure?')" href="{{url('del-customer')}}/{{ $customer->id }}"><i style="color: red;" class="material-icons">delete</i></a></td>
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