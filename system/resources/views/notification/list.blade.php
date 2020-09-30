{{-- layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Notification')

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
        <h5>Notification <a class="waves-effect waves-light btn mb-1 mr-1 mb-2 float-right " href="{{ url('add-notification') }}">Add Notification</a></h5>

        <div class="responsive-table">
          <table id="users-list-datatable" class="table">
            <thead>
              <tr>
                <th></th>
                <th>#</th>
                <th>Title</th>
                <th>Sent To</th>
                <th>Schedule</th>
                <th>Edit</th>
                <th>Delete</th>
                
              </tr>
            </thead>
            <tbody>

            @if(isset($notifications) && count($notifications) > 0) 
            @foreach($notifications as $key => $subadmin) 
                <tr>
                <td></td>
                <td>{{ $key+1 }}</td>
                <td>{{ $subadmin->title }}</td>
                <td>
                  @if($subadmin->notification_type == 'all_users') 
                  {{ "All Users" }} 
                  @elseif($subadmin->notification_type == 'all_active') 
                  {{ "All Active Users"  }} 
                  @elseif($subadmin->notification_type == 'all_secretary') {{ "All Active Secretary" }} 
                  @endif
                </td>
                <td>@if(!is_null($subadmin->schedule)){{ $subadmin->schedule  }} @else {{ "Notification Sent" }}@endif</td>
                <td>
                  @if($subadmin->status != 1)  
                    <a href="{{url('edit-notification')}}/{{ $subadmin->id }}"><i class="material-icons">edit</i></a>
                  @else 
                    <p>Sent</p>
                  @endif
                  </td>

                <td><a onclick="return confirm('Are you sure?')" href="{{url('del-notification')}}/{{ $subadmin->id }}"><i style="color: red;" class="material-icons">delete</i></a></td>
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