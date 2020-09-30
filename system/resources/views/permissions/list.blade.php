{{-- layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Permissions')

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
        <h5>{{ __('locale.Permissions') }} {{-- <a class="waves-effect waves-light btn mb-1 mr-1 mb-2 float-right " href="{{ url('add-permission') }}">Add Permission</a> --}}</h5>

        <div class="responsive-table">
          <table id="users-list-datatable" class="table">
            <thead>
              <tr>
                <th></th>
                <th>#</th>
                <th>{{ __('locale.Name') }}</th>
                <th>{{ __('locale.Description') }}</th> 
                <th>{{ __('locale.Edit') }}</th>
                {{-- <th>Delete</th> --}}
              </tr>
            </thead>
            <tbody>

            @if(isset($permissions) && count($permissions) > 0) 
            @foreach($permissions as $key => $permissions) 
                <tr>
                <td></td>
                <td>{{ $key+1 }}</td>
                <td>{{ $permissions->name }}</td>
                <td>{{ $permissions->description }}</td>
                <td><a href="{{url('edit-permission')}}/{{ $permissions->id }}"><i class="material-icons">edit</i></a></td>
                {{-- <td><a onclick="return confirm('Are you sure?')" href="{{url('del-permission')}}/{{ $permissions->id }}"><i style="color: red;" class="material-icons">delete</i></a></td> --}}
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
<script src="{{asset('js/scripts/page-users.js')}}"></script>
@endsection