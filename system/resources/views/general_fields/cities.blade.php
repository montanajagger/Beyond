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
        <h5>{{ __('locale.City List') }}
          <a class="waves-effect waves-light btn mb-1 mr-1 mb-2 float-right modal-trigger" href="#modal-add">{{ __('locale.Add New City') }}</a></h5>
 
        <div class="responsive-table">
          <table id="users-list-datatable" class="table">
            <thead>
              <tr>
                <th></th>
                <th>#</th>
                <th>{{ __('locale.English City Name') }}</th>
                <th>{{ __('locale.Arabic City Name') }}</th>
                 <th style="text-align: center;">{{ __('locale.View/Edit') }}</th>
                <th>{{ __('locale.Delete') }}</th>
              </tr>
            </thead>
            <tbody>
             @if(isset($cities) && count($cities) > 0) 
            @foreach($cities as $key => $city) 
                <tr>
                <td></td>
                <td>{{ $key+1 }}</td>
                <td>{{ $city->name }}</td>
                <td>{{ $city->ar_name }}</td>
                <td style="text-align: center;"><a class="modal-trigger" href="#modal{{ $city->id }}"><i class="material-icons">edit</i></a></td>
                <td><a onclick="return confirm('Are you sure?')" href="{{url('del-cities')}}/{{ $city->id }}"><i style="color: red;" class="material-icons">delete</i></a></td>
              </tr>  
 
              <div id="modal{{ $city->id }}" class="modal modal-fixed-footer">
              <div class="modal-content">
                <h4>{{ __('locale.Update City') }}</h4>
                <div class="row">
                   <div class="col s12" id="account">
                    <form action="{{ url('edit_cities') }}" method="post">
                      @csrf
                      <input type="hidden" name="id" value="{{ $city->id }}">
                       <div class="row">
                        <div class="col s12">
                          <div class="row">
                            <div class="col s12 input-field">
                              <input name="name" type="text" value="{{ $city->name }}" required>
                              <label>{{ __('locale.English City Name') }}</label>
                            </div>
                             <div class="col s12 input-field">
                              <input name="ar_name" type="text" value="{{ $city->ar_name }}" required>
                              <label>{{ __('locale.Arabic City Name') }}</label>
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
                <button type="submit" class="btn indigo">{{ __('locale.Update') }}</button>
                <a href="#" class="modal-action modal-close waves-effect waves-green btn-flat ">{{ __('locale.Cancel') }}</a>
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
  <form action="{{ url('add_cities') }}" method="post">
          @csrf
  <div class="modal-content">
    <h4>{{ __('locale.Add New City') }}</h4>
    <div class="row">
       <div class="col s12" id="account">
        
            <div class="row">
            <div class="col s12">
              <div class="row">
                <div class="col s12 input-field">
                  <input name="name" type="text" required>
                  <label>{{ __('locale.English City Name') }}</label>
                </div>
                <div class="col s12 input-field">
                  <input name="ar_name" type="text" required>
                  <label>{{ __('locale.Arabic City Name') }}</label>
                </div>
            </div>
          </div>
       </div>
    </div>
   </div>
  </div>
  <div class="modal-footer">
    <button type="submit" class="btn indigo">{{ __('locale.Save') }}</button>
    <a href="#" class="modal-action modal-close waves-effect waves-green btn-flat ">{{ __('locale.Cancel') }}</a>
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