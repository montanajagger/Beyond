{{-- layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Sub Admins')

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
        <h5>Testimonials <a class="waves-effect waves-light btn mb-1 mr-1 mb-2 float-right " href="{{ url('add-testimonials') }}">Add Testimonials</a></h5>

        <div class="responsive-table">
          <table id="users-list-datatable" class="table">
            <thead>
              <tr>
                
                <th>#</th>
                <th>{{ __('locale.name') }}</th>
                <th>Job Title</th>
                <th>Description</th>
                <th>Image</th>
                <th>{{ __('locale.Delete') }}</th>
              </tr>
            </thead>
            <tbody>

            @if(isset($subadmins) && count($subadmins) > 0) 
            @foreach($subadmins as $key => $subadmin) 
                <tr>
                
                <td>{{ $key+1 }}</td>
                <td>{{ $subadmin->name }}</td>
                <td>{{ $subadmin->job_title }}</td>
                <td>{{ $subadmin->description }}</td>
                <td><img width="100" height="100" style="object-fit: cover;" src="{{ url('') }}/uploads/testimonials/{{ $subadmin->img }}" alt=""></td>
                
                <td><a onclick="return confirm('Are you sure?')" href="{{url('del-testimonials')}}/{{ $subadmin->id }}"><i style="color: red;" class="material-icons">delete</i></a></td>
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