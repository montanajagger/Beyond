{{-- layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Secretary')

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
        <h5>{{ __('locale.Secretary') }} <a class="waves-effect waves-light btn mb-1 mr-1 mb-2 float-right " href="{{ url('add-secretary') }}">{{ __('locale.Add Secretary') }}</a></h5>

        <div class="responsive-table">
          <table id="users-list-datatable" class="table">
            <thead>
              <tr>
                 <th>#</th>
                <th>{{ __('locale.Name') }}</th>
                <th>{{ __('locale.E-mail') }}</th>
                <th>{{ __('locale.Phone') }}</th>
                <th>{{ __('locale.Status') }}</th>
                <th>{{ __('locale.Edit') }}</th>
                <th>{{ __('locale.View') }}</th>  

              </tr>
            </thead>
            <tbody>

            @if(isset($subadmins) && count($subadmins) > 0) 
            @foreach($subadmins as $key => $subadmin) 
                <tr>
                 <td>{{ $key+1 }}</td>
                <td>{{ $subadmin->name }}</td>
                <td>{{ $subadmin->email }}</td>
                <td>{{ $subadmin->phone }}</td>
                <td>
                  
                    <div class="switch">
                        <label>
                            {{__('inactive')}}
                            <input type="checkbox" onclick="status('{{csrf_token()}}','{{$subadmin->id}}','{{url('secretary-status')}} ')" {{ $subadmin->status == 1?'checked':''}} >
                            <span class="lever"></span>
                            {{__('active')}}
                        </label>
                    </div>
                </td>
                <td><a href="{{url('edit-secretary')}}/{{ $subadmin->id }}"><i class="material-icons">edit</i></a></td>
                <td><a onclick="return confirm('Are you sure?')" href="{{url('del-secretary')}}/{{ $subadmin->id }}"><i style="color: red;" class="material-icons">delete</i></a></td>
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
<script>
   function status(token, id, route) {
    $.ajax({
        url : route,
        type: "POST",
        data: {_token: token, id: id},
        success: function (response) {
            // $(".table").load(location.href + " .table>*", "");
        }
    });
}

$(document).ready(function () {
 
  // datatable initialization
  if ($("#users-list-datatable").length > 0) {
      $("#users-list-datatable").DataTable({
      responsive: true,
      'columnDefs': [{
        "orderable": true,
      }]
    });
  };
  
});
</script>
@endsection