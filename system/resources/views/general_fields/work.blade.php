{{-- layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title', 'Cities')

{{-- vendors styles --}}
@section('vendor-style')
<style>
  .modal.modal-fixed-footer {
     height: 40%;
}
</style>
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
        <h5>Work List
          <a class="waves-effect waves-light btn mb-1 mr-1 mb-2 float-right modal-trigger" href="#modal-add">Add New Work</a></h5>
 
        <div class="responsive-table">
          <table id="users-list-datatable" class="table">
            <thead>
              <tr>
                <th></th>
                <th>#</th>
                <th>Work Title</th>
                 <th style="text-align: center;">View/Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
             @if(isset($work) && count($work) > 0) 
            @foreach($work as $key => $wrk) 
                <tr>
                <td></td>
                <td>{{ $key+1 }}</td>
                <td>{{ $wrk->name }}</td>
                <td style="text-align: center;"><a class="modal-trigger" href="#modal{{ $wrk->id }}"><i class="material-icons">edit</i></a></td>
                <td><a onclick="return confirm('Are you sure?')" href="{{url('del-work')}}/{{ $wrk->id }}"><i style="color: red;" class="material-icons">delete</i></a></td>
              </tr>  
 
              <div id="modal{{ $wrk->id }}" class="modal modal-fixed-footer">
              <div class="modal-content">
                <h4>Update Work</h4>
                <div class="row">
                   <div class="col s12" id="account">
                    <form action="{{ url('edit_work') }}" method="post">
                      @csrf
                      <input type="hidden" name="id" value="{{ $wrk->id }}">
                       <div class="row">
                        <div class="col s12">
                          <div class="row">
                            <div class="col s12 input-field">
                              <input name="name" type="text" value="{{ $wrk->name }}" required>
                              <label>Work Title</label>
                            </div>
                        </div>
                      </div>
                    <!-- users edit account form ends -->
                  </div>
                </div>
                <!-- </div> -->
              </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn indigo">Update</button>
                <a href="#" class="modal-action modal-close waves-effect waves-green btn-flat ">Cancel</a>
              </div>
              </form>
            </div>
            @endforeach  
            @endif
            </tbody>
          </table>
        </div>
       </div>
    </div>
  </div>
</section>
 
<div id="modal-add" class="modal modal-fixed-footer">
  <form action="{{ url('add_work') }}" method="post">
          @csrf
  <div class="modal-content">
    <h4>Add New Work</h4>
    <div class="row">
       <div class="col s12" id="account">
        
            <div class="row">
            <div class="col s12">
              <div class="row">
                <div class="col s12 input-field">
                  <input name="name" type="text" required>
                  <label>Work Title</label>
                </div>
            </div>
          </div>
       </div>
    </div>
   </div>
  </div>
  <div class="modal-footer">
    <button type="submit" class="btn indigo">Save</button>
    <a href="#" class="modal-action modal-close waves-effect waves-green btn-flat ">Cancel</a>
  </div>
  </form>
</div>

@endsection

{{-- vendor scripts --}}
@section('vendor-script')
@endsection

{{-- page script --}}
@section('page-script')
    <script src="{{ url('js/scripts/advance-ui-modals.js') }}"></script>
@endsection