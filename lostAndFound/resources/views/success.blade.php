@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <h3>Success! {{$msg}}
          @if(isset($passed))
            {{$passed->email}}
          @endif</h3>
        <a href="{{ url('/home')}}"><button class="btn btn-primary">Go Back to Home Page</button></a>
    </div>
</div>
@endsection
