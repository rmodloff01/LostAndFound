@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="text-align: center">

            <div class="panel panel-default">

                <div class="panel-heading">See What Items Students Have Lost!</div>

                <div class="panel-body">
                    View/Search items here, add option to delete/edit
                    <?php
                    print "<br /> REQUEST=<pre>"; print_r( $items );

                    #Testing traversing of an object
                    foreach ($items as $item) {
                      print "$item->description";
                      print " ";
                      }
                    ?>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
