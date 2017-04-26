@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 well bs-component">
            <legend>Filter Records</legend>
            {{ Form::open(array('url' => '/collectedItemFilter','method' => 'post', 'class' => 'form-horizontal')) }}
                <fieldset>
                    <label for="selectbox" class = "control-label">Item Type:</label>
                    <select name="type" id="selectbox" class="form-control">
                        @foreach($formTypes as $element)
                            <option value="{{$element->type_id}}" >{{$element->type}}</option>
                        @endforeach
                    </select>
                    <div class="form-group">
                        <label for="datepicker1" class = "control-label">Start Date:</label>
                        {{ Form::text('date1', '', array('id' => 'datepicker1', 'class' => 'makepointer form-control')+['required']) }}
                        <label for="datepicker2" class = "control-label">End Date:</label>
                        {{ Form::text('date2', '', array('id' => 'datepicker2', 'class' => 'makepointer form-control')+['required']) }}
                    </div>
                    {{ Form::button('Filter Records', array('type' => 'submit', 'class' => 'btn btn-primary'))}}
                    {{ Form::token() }}
                </fieldset>
            {{ Form::close() }}
        </div>
        <div class="col-md-10" style="text-align: center">

            <div class="panel panel-default">

                @if(isset($items) && sizeof($items) > 0)
                    <div class="panel-heading double-size" style="color: green">Collected Items</div>
                    <div class="panel-body">
                        {{ Form::open(array('url' => '/editForm','method' => 'put')) }}
                        <?php
                        #print "<br /> REQUEST=<pre>"; print_r( $items );
                        print "<table>";
                        print "<th>Item Type</th><th>Date Found</th><th>Collected By</th><th>Location Found</th><th>Description</th><th>Owner Info</th><th>Inventory Location</th><th>Officer</th><th>Report Number</th><th>Update Item</th>";
                        #Testing traversing of an object
                        foreach ($items as $item) {
                          print "<tr><td>";
                          print "$item->type";
                          print "</td><td>";
                          print "$item->date_found";
                          print "</td><td>";
                          print "$item->collected_by";
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
                        <h2 class="panel-heading">No Records Match The Search Criteria</h2>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
