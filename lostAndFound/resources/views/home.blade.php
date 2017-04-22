@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <h4 class="text-center">Filter Records</h4>
            {{ Form::open(array('url' => '/itemFilter','method' => 'post')) }}
            <select name="type" size="9">
                @foreach($formTypes as $key => $element)
                    <option value="{{$key}}" >{{$element->type}}</option>
                @endforeach
            </select>
            {{ Form::text('date1', '', array('id' => 'datepicker1')+['required']) }}
            {{ Form::text('date2', '', array('id' => 'datepicker2')+['required']) }}
            {{ Form::submit('Filter Records') }}
            {{ Form::token() }}
            {{ Form::close() }}

            @if(isset($formData))
                {{print_r($formData)}}
            @endif
        </div>
        <div class="col-md-10" style="text-align: center">

            <div class="panel panel-default">

                <div class="panel-heading">See What Items Students Have Lost!</div>
                @if(isset($items) && sizeof($items) > 0)
                    <div class="panel-body">
                        {{ Form::open(array('url' => '/editForm','method' => 'put')) }}
                        <?php
                        #print "<br /> REQUEST=<pre>"; print_r( $items );
                        print "<table>";
                        print "<th>Item Type</th><th>Date Found</th><th>Location Found</th><th>Description</th><th>Owner Info</th><th>Inventory Location</th><th>Officer</th><th>Report Number</th><th>Update Item</th>";
                        #Testing traversing of an object
                        foreach ($items as $item) {
                          print "<tr><td>";
                          print "$item->type";
                          print "</td><td>";
                          print "$item->date_found";
                          print "</td><td>";
                          print "$item->location_found";
                          print "</td><td>";
                          print "$item->description";
                          print "</td><td>";
                          print "$item->owner_info";
                          print "</td><td>";
                          print "$item->inventory_location";
                          print "</td><td>";
                          print "$item->officer";
                          print "</td><td>";
                          print "$item->report_number";
                          print "</td><td>";
                          print "<button name='btnid' value=$item->item_id class='btn btn-primary'>Update</button>";
                          print "</td></tr>";
                          }
                        print "</table>";
                        ?>
                        {{ Form::token() }}
                        {{ Form::close() }}
                    </div>
                @else
                    <div class="panel-body">
                        <h2>No Records Match The Search Criteria</h2>
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>


@endsection
