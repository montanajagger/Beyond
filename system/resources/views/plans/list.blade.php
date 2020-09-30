{{-- layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title', 'All Package Plans')

{{-- vendors styles --}}
@section('vendor-style')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/data-tables/css/jquery.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css"
  href="{{asset('vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css')}}">
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
        <h5>@lang('locale.All Package Plans')
 <a class="waves-effect waves-light btn mb-1 mr-1 mb-2 float-right " href="{{ url('add-package-plans') }}">@lang('locale.Add Package Plan')</a></h5>

        <div class="responsive-table">
          <table id="users-list-datatable" class="table">
            <thead>
              <tr>
                <th></th>
                <th>#</th>
                <th>Name English</th>
                <th>Name Arabic</th>
                <th>Amount</th>
                <th>Duration</th>
                <th>Status</th>
                <th style="text-align: center;">View/Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>

            @if(isset($package_plans) && count($package_plans) > 0) 
            @foreach($package_plans as $key => $plans) 
                <tr>
                <td></td>
                <td>{{ $key+1 }}</td>
                <td>{{ $plans->name_en }}</td>
                <td>{{ $plans->name_ar }}</td>
                <td>{{ $plans->amount }}</td>
                 <td>
                     
                    {{ DB::table('package_durations')->where('id',$plans->duration)->first()->title_en }}
                </td> 
                <td>
                  <div class="switch">
                        <label>
                             <input type="checkbox" onclick="status('{{csrf_token()}}','{{$plans->id}}','{{url('plans-status')}} ')" {{ $plans->status == 1?'checked':''}} >
                            <span class="lever"></span>
                         </label>
                    </div>
                </td>
                        
                <td style="text-align: center;"><a href="{{url('edit-package-plans')}}/{{ $plans->id }}"><i class="material-icons">edit</i></a></td>
                <td><a onclick="return confirm('Are you sure?')" href="{{url('del-package-plans')}}/{{ $plans->id }}"><i style="color: red;" class="material-icons">delete</i></a></td>
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
<script src="{{asset('vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js')}}"></script>
@endsection

{{-- page script --}}
@section('page-script')
<script>
 
  function status(token, id, route) {
    $.ajax({
        url : route,
        type: "POST",
        data: {_token: token, id: id},
        success: function (response) {

          var toastHTML = 'Status Updated';
          M.toast({html: toastHTML});
  
        }
    });
}

</script>
@endsection