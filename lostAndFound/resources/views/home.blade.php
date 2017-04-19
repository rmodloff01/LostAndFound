@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="text-align: center">

            <div class="panel panel-default">

                <div class="panel-heading">See What Items Students Have Lost!</div>

                <div class="panel-body">
                    <?php
                    #print "<br /> REQUEST=<pre>"; print_r( $items );
                    print "<table>";
                    print "<th>Item Type</th><th>Date Found</th><th>Description</th><th>Owner Info</th><th>Inventory Location</th><th>Officer</th><th>Report Number</th><th>Update Item</th>";
                    #Testing traversing of an object
                    foreach ($items as $item) {
                      print "<tr><td>";
                      #print "$item->type";
                      print "</td><td>";
                      print "$item->date_found";
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
                      print "<button class='btn btn-primary'>Update</button>";
                      print "</td></tr>";
                      }
                    print "</div>";
                    ?>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
