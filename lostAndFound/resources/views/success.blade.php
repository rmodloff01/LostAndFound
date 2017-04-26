@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <h3>
            Success! {{$msg}}
        </h3>
        </>
        <h4>
          Taking you back to the home page...
        </h4>
          <script>
            window.setTimeout(function(){ window.location = "{{ url('/home')}}"; }, 2000);
          </script>

    </div>
</div>
@endsection
