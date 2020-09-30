{{-- layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Terms and Conditions')
 
{{-- page style --}}
@section('page-style')
 @endsection

{{-- page content --}}
@section('content')
  {{-- {{ dd($page_terms) }} --}}
<div class="section users-edit">
  <div class="card">
    <div class="card-content">
      <h5>{{ __('locale.Terms and Conditions') }}</h5>

      <div class="divider mb-3"></div>
      <div class="row">
        <div class="col s12" id="account">
     
          <form action="{{ url('update_term_and_conditions') }}" enctype='multipart/form-data' method="post">
            @csrf
            <div class="row">
            	<label for="">{{ __('locale.English') }}:</label>
            <textarea name="editor1">@if(!is_null($page_terms)){{ $page_terms->page_body }}@endif</textarea>
	<br>
		<label for="">{{ __('locale.Arabic') }}:</label>
            <textarea name="editor2">@if(!is_null($page_terms)){{ $page_terms->page_body_arabic }}@endif</textarea>
              <div class="col s12 display-flex justify-content-end mt-3">
                <button type="submit" class="btn indigo">
                  {{ __('locale.Update') }}</button>
               </div>
            </div>
          </form>
          <!-- users edit account form ends -->
        </div>
        
      </div>
      <!-- </div> -->
    </div>
  </div>
</div>

@endsection 
{{-- page scripts --}}
@section('page-script')
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
 <script>
  CKEDITOR.replace( 'editor1' );
  CKEDITOR.replace( 'editor2' );
</script>
@endsection