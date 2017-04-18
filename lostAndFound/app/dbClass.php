<?php
class dbClass {
  function __construct() {
      $server = '127.0.0.1';
      $user = 'kschick02';
      $pass = '';
      $mydb = 'lostfound';
      $this->DBH = mysqli_connect($server, $user, $pass, $mydb )
          or die ("Cannot connect to $server using $user Errst=" .  mysql_error());
      $this->TABLE = 'items';
      $this->COLS[] = 'item_id';
      $this->COLS[] = 'type_id';
      $this->COLS[] = 'date_found';
      $this->COLS[] = 'location_found';
      $this->COLS[] = 'description';
      $this->COLS[] = 'collected_by';
      $this->COLS[] = 'owner_info';
      $this->COLS[] = 'inventory_location';
      $this->COLS[] = 'officer';
      $this->COLS[] = 'report_number';
   }
 function getResults( $WHERE ) {
   $WHAT = implode( ',', $this->COLS );
   $query = "SELECT $WHAT from $this->TABLE $WHERE";
   #print "The Query is <i>$query</i><br>";
   $results = mysqli_query( $this->DBH, $query )
        or die ("Database query failed SQLcmd=$query Error_str=" .  mysql_error());
    while ($R = mysqli_fetch_array($results, MYSQL_ASSOC)) {
        $BY = $R['item_id'];
        $this->TYPE["$BY"] = $R['type_id'];
        $this->DATE["$BY"] = $R['date_found'];
        $this->LOC["$BY"] = $R['location_found'];
        $this->DESCR["$BY"] = $R['description'];
        $this->COLLECT["$BY"] = $R['collected_by'];

      #  $this->highestPid = $R['pid'];
      }

 }

 function editItem() {
   $query = "Update $this->TABLE set type_id= ' . $_REQUEST['type_id'] . ', date_found='" . $_REQUEST['date_found'] . "', location_found=" . $_REQUEST['location_found'] .
    ", description='" . $_REQUEST['description'] . "', collected_by='" . $_REQUEST['collected_by'] . "', owner_info='" . $_REQUEST['owner_info'] .
    "', inventory_location='" . $_REQUEST['inventory_location'] . "', officer='" . $_REQUEST['officer'] . "', report_number='" . $_REQUEST['report_number']
   "' where item_id=" . $_REQUEST['item_id'];
   mysqli_query($this->DBH, $query);

 }

 function addRow() {
  $query = "Insert into $this->TABLE (type_id, date_found, location_found, description,
   collected_by, owner_info, inventory_location, officer, report_number) values ( . $_REQUEST['type_id'] . ','" . $_REQUEST['date_found'] . "',"
    . $_REQUEST['location_found'] . ",'" . $_REQUEST['description'] . "','" . $_REQUEST['collected_by'] . "'," .
      $_REQUEST['owner_info'] . ",'" . $_REQUEST['inventory_location'] . ",'" . $_REQUEST['officer'] . ",'" . $_REQUEST['report_number'] ."')";
  mysqli_query($this->DBH, $query);
 }

}
?>
