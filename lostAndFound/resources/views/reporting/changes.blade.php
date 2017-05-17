@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12" style="text-align: center">
            <div class="panel panel-default">
                <div class="panel-heading makebold">
                    <span class="double-size">CHANGES</span>
                </div>

                @if(isset($changes) && sizeof($changes) > 0)
                    <div class="panel-body responsivetable">
                        <?php
                        print "<table class='auto-margin'>";
                        print "<tr><th>Field Changed</th><th>Old Value</th><th>New Value</th><th>User</th><th>Changed At</th></tr>";
                        foreach ($changes as $change) {
                          print "<tr><td>";
                          print "$change->field_changed";
                          print "</td><td>";
                          print "$change->old_val";
                          print "</td><td>";
                          print "$change->new_val";
                          print "</td><td>";
                          print "$change->name";
                          print "</td><td>";
                          print date_format(date_create($change->created_at), "m-d-Y g:i:s A");
                          print "</td></tr>";
                          }
                        print "</table>";
                        ?>
                      </div>
                @else
                    <div class="panel-body">
                        <h2 class="panel-heading">No Changes Recorded</h2>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
