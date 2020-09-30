{{-- layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title', 'All Subscriptions')

{{-- vendors styles --}}
@section('vendor-style')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/data-tables/css/jquery.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css"
  href="{{asset('vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css')}}">
@endsection

{{-- page styles --}}
@section('page-style')
<style>
    nav {
        background-color: white !important;
    }
    .pagination li.active {
        background-color: gray !important;
        margin-top: 15px;
        padding-bottom: 45px;
    }
    .pagination li.active span {
        width: 30px;
        display: inline-block;
        padding-top: 7px;
        font-size: 2.2rem;
        padding: 0 5px;
        line-height: 24px;
    }
</style>
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/page-users.css')}}">
@endsection

{{-- page content --}}
@section('content')
<!-- users list start -->
<section class="users-list-wrapper section">

  <div class="users-list-table">

    <div class="card">
      <div class="card-content">
        <h5>@lang('locale.Subscriptions')</h5>

        <div class="responsive-table">
          <table id="users-list-datatable" class="table">
            <thead>
              <tr>
                <th></th>
                <th>#</th>
                  <th>Client Name</th>
                <th>Plan English</th>
                <th>Plan Arabic</th>
                <th>Start and End</th>
                <th>Secretary</th>
                <th>Amount</th>
                <th>Duration</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>

            @if(isset($subscriptions) && count($subscriptions) > 0)
            @foreach($subscriptions as $key => $subscription)
                <tr>
                    @php $plan = DB::table('package_plans')->where('id',$subscription->plan_id)->first() @endphp
                <td></td>
                <td>{{ $key+1 }}</td>
                <td>{{ $subscription->clientName }}</td>
                <td>{{ $plan ? $plan->name_en : '' }}</td>
                <td>{{ $plan ? $plan->name_ar : '' }}</td>
                <td>{{ $subscription->start_date . ' - ' . $subscription->end_date }}</td>
                <td>
                    <select onchange="secretaryChanged({{$subscription->id}}, event)">
                        @if (isset($subscription->secretary_id))
                            <option> </option>
                            @foreach ($secretaries as $secretary)
                                @if($subscription->secretary_id == $secretary->id)
                                    <option value="{{$secretary->id}}" selected>{{$secretary->name}}</option>
                                @else
                                    <option value="{{$secretary->id}}">{{$secretary->name}}</option>
                                @endif
                            @endforeach
                        @else
                            <option selected> </option>

                            @foreach ($secretaries as $secretary)
                                <option value="{{$secretary->id}}">{{$secretary->name}}</option>
                            @endforeach
                        @endif
                    </select>
                </td>
                <td>{{ $subscription->payment }}</td>
                 <td>
                    @if($plan)
                    {{ DB::table('package_durations')->where('id',$plan->duration)->first()->title_en }}
                    @endif
                </td>
                <td>
                  <div class="switch">
                        <label>
                             <input type="checkbox" disabled {{ $subscription->status == 1?'checked':''}} >
                            <span class="lever"></span>
                         </label>
                    </div>
                </td>

              </tr>
            @endforeach
            @endif
            </tbody>
          </table>
          <div id="view-pagination">
            <div class="row">
              <div class="col s12">
                <ul class="pagination">
                    {{ $subscriptions->links() }}
                </ul>
              </div>
            </div>
          </div>
        </div>
        <!-- datatable ends -->
      </div>
    </div>
  </div>
</section>
<!-- users list ends -->
@endsection

<script>
    let secretary_id = null;
    let subscription_id = null;

    function secretaryChanged(index, event) {
        subscription_id = index;
        secretary_id = event.target.value;

        $.ajax({
            url: '/subscription_secretary_changed/' + subscription_id + '/' + secretary_id,
            type: "put",
            data: {"_token": "{{ csrf_token() }}"},
            success: function() {

            },
            error: function(err) {

            }
        });
    }

</script>

{{-- vendor scripts --}}
@section('vendor-script')
<script src="{{asset('vendors/data-tables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js')}}"></script>
@endsection
