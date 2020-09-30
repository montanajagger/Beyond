{{-- layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title', 'Hotel')

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
                    <h5>{{ __('locale.Hotel') }}
                        {{--          <a class="waves-effect waves-light btn mb-1 mr-1 mb-2 float-right modal-trigger" href="#modal-add">{{ __('locale.Add Title') }}</a>--}}
                    </h5>
                    <div class="responsive-table">
                        <table id="users-list-datatable" class="table">
                            <thead>
                            <tr>
                                <th></th>
                                <th>#</th>
                                <th>{{ __('locale.Client Name') }}</th>
                                <th>{{ __('locale.Name') }}</th>
                                <th>{{ __('locale.City') }}</th>
                                <th>{{ __('locale.Note') }}</th>
                                <th>{{ __('locale.Status') }}</th>
                                <th>{{ __('locale.Check In Date') }}</th>
                                <th>{{ __('locale.Check Out Date') }}</th>
                                <th>{{ __('locale.Created At') }}</th>
                                <th>Accept</th>
                                <th>Reject</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($hotels) && count($hotels) > 0)
                                @foreach($hotels as $key => $hotel)
                                    <tr>
                                        <td></td>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $hotel->sender_name }}</td>
                                        <td>{{ $hotel->name }}</td>
                                        <td>{{ $hotel->city }}</td>
                                        <td>{{ $hotel->note }}</td>
                                        <td>{{ $hotel->status }}</td>
                                        <td>{{ $hotel->check_in_date }}</td>
                                        <td>{{ $hotel->check_out_date }}</td>
                                        <td>{{ $hotel->created_at }}</td>
                                        <td style="text-align: center;"><a onclick="return confirm('Are you sure?')" href="{{url('accept-hotel')}}/{{ $hotel->id }}"><i class="material-icons">edit</i></a></td>
                                        <td><a onclick="return confirm('Are you sure?')" href="{{url('reject-hotel')}}/{{ $hotel->id }}"><i style="color: red;" class="material-icons">delete</i></a></td>
                                    </tr>
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
        <form action="{{ url('add_title') }}" method="post">
            @csrf
            <div class="modal-content">
                <h4>{{ __('locale.Add New Title') }}</h4>
                <div class="row">
                    <div class="col s12" id="account">

                        <div class="row">
                            <div class="col s12">
                                <div class="row">
                                    <div class="col s12 input-field">
                                        <input name="name" type="text" required>
                                        <label>{{ __('locale.English Title') }}</label>
                                    </div>
                                    <div class="col s12 input-field">
                                        <input name="ar_name" type="text" required>
                                        <label>{{ __('locale.Arabic Title') }}</label>
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
