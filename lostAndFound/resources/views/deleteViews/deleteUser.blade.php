@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-xs-offset-3">
        {{ Form::open(array('url' => '/delUser','method' => 'delete')) }}
        <?php
            print "<h2>Current User Accounts</h2>";
            print "<table><tr><th>Name</th><th>Email</th><th>Created At</th><th>Delete</th></tr>";
            foreach($users as $val){
                if($val['id']!=Auth::id()){
                    print "<tr><td>$val[name]</td><td>$val[email]</td><td>$val[created_at]</td>
                    <td>";
                    echo Form::radio('userObj', $val, array('checked' => 'checked'));
                    print"</td></tr>";
                }

            }
            print "</table>";
        ?>
        {{ Form::submit('Delete User\'s Access') }}
        {{ Form::token() }}
        {{ Form::close() }}

        </div>
        {{$users}}
    </div>
</div>
@endsection
