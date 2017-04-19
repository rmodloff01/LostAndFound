@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <h3>The account with the email address {{$passed->email}} has been removed.</h3>
    </div>
</div>
@endsection
