@extends('layouts.app')

@section('content')
@include('layouts.inlcudes.nav')
<div class="container py-10 py-md-10">
    <div class="row">
        <div class="col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
          <h2 class="display-4 mb-3 text-center">Mark your attendance for the event</h2>
          <p class="lead text-center mb-10">Enter the attendance code shared to you on the event</p>
          <form class="contact-form needs-validation" method="POST" action="{{ route('attendance.mark', ['event' => $event->id, 'user' => Auth::user()->id]) }}">
            @csrf
            {{-- <div class="messages"></div> --}}
            <div class="row gx-4">
              <div class="col-12">
                <div class="form-floating mb-4">
                  <input id="attendence_code" type="text" name="attendence_code" class="form-control" placeholder="a2sdv5" required>
                  <label for="attendence_code">Code *</label>
                  <div class="valid-feedback"> Looks good! </div>   
                  <div class="invalid-feedback"> Please provide a valid attendence code. </div>
                </div>
              </div>
              <!-- /column -->
              <!-- /column -->
              <div class="col-12 text-center">
                <button type="submit" class="btn btn-primary rounded-pill btn-send mb-3">Submit Code</button>
                <p class="text-muted"><strong>*</strong> This field is required.</p>
              </div>
              <!-- /column -->
            </div>
            <!-- /.row -->
          </form>
          <!-- /form -->
        </div>
        <!-- /column -->
      </div>
</div>
{{-- @include('layouts.inlcudes.footer') --}}
@endsection