@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 well bs-component">
            <legend>Filter Records</legend>
            {{ Form::open(array('url' => '/collectedItemFilter','method' => 'post', 'class' => 'form-horizontal')) }}
                <fieldset>
                    <div class="form-group">
                        <label for="selectbox" class = "control-label">Item Type:</label>
                        <select name="type" id="selectbox" class="form-control">
                            @foreach($formTypes as $element)
                                <option value="{{$element->type_id}}" @if(isset($filterParams)&&$element->type_id==$filterParams['type']) selected @endif>{{$element->type}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        @if(isset($filterParams))
                            <label for="datepicker1" class = "control-label">Start Date:</label>
                            {{ Form::text('date1', $filterParams['date1'], array('class' => 'makepointer form-control datepicker1')+['required']) }}
                            <label for="datepicker2" class = "control-label">End Date:</label>
                            {{ Form::text('date2', $filterParams['date2'], array('class' => 'makepointer form-control datepicker2')+['required']) }}
                        @else
                            <label for="datepicker1" class = "control-label">Start Date:</label>
                            {{ Form::text('date1', '', array('class' => 'makepointer form-control datepicker1')+['required']) }}
                            <label for="datepicker2" class = "control-label">End Date:</label>
                            {{ Form::text('date2', '', array('class' => 'makepointer form-control datepicker2')+['required']) }}
                        @endif
                    </div>
                    {{ Form::button('Filter Records', array('type' => 'submit', 'class' => 'btn btn-primary'))}}
                    {{ Form::token() }}
                </fieldset>
            {{ Form::close() }}
        </div>
        <div class="col-md-10" style="text-align: center">

            <div class="panel panel-default">

                <div class="panel-heading makebold">
                    <span class="double-size augreentext">Collected Items:</span>
                    <span class="augreentext">
                        @if(isset($filterParams))
                            {{$filterParams['date1'] . " - " . $filterParams['date2'] . ". Type: " . $filterParams['typeString']}}
                        @else
                            All
                        @endif
                    </span>
                </div>
                @if(isset($items) && sizeof($items) > 0)
                    <div class="panel-body">
                        {{ Form::open(array('url' => '/editOrChanges','method' => 'post', 'class' => 'center-text')) }}
                        <?php
                        print "<table class='auto-margin'>";
                        print "<th>Item Type</th><th>Date Found</th><th>Collected By</th><th>Location Found</th><th>Description</th><th>Owner Info</th><th>Inventory Location</th><th>Officer</th><th>Report Number</th><th>Update Item</th><th>View Changes</th>";
                        foreach ($items as $item) {
                            print "<tr><td>";
                            print "$item->type";
                            print "</td><td>";
                            print date_format(date_create($item->date_found), 'm-d-Y');
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
                            print "<button type='submit' name='updatebtn' value=$item->item_id class='btn btn-primary'>Update</button>";
                            print "</td><td>";
                            print "<button type='submit' name='changesbtn' value=$item->item_id class='btn btn-info'>". date_format(date_create($item->updated_at), "m-d-Y g:i:s A") ."</button>";
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
