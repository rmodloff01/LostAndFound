<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use View;

class ItemsController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }

    public function filterResults(Request $req){
        $filterType = DB::select('SELECT type FROM item_types WHERE type_id=?;', [$req['type']]);
        $filterParam = $req['date1'] . " - " . $req['date2'] . ". Type: " . $filterType[0]->type;
        $types = DB::select('SELECT * FROM item_types;');
        $items = DB::select('SELECT items.*, item_types.type FROM items INNER JOIN item_types ON items.type_id = item_types.type_id WHERE date_found >= ? AND date_found <= ? AND ? = items.type_id AND collected_by IS NULL ORDER BY date_found DESC;', [$req['date1'], $req['date2'], $req['type']]);
        return view('home')->with('formTypes', $types)->with('items', $items)->with('filterParam', $filterParam);
    }
    public function filterCollectedResults(Request $req){
        $filterType = DB::select('SELECT type FROM item_types WHERE type_id=?;', [$req['type']]);
        $filterParam = $req['date1'] . " - " . $req['date2'] . ". Type: " . $filterType[0]->type;
        $types = DB::select('select * from item_types;');
        $items = DB::select('SELECT items.*, item_types.type FROM items INNER JOIN item_types ON items.type_id = item_types.type_id WHERE date_found >= ? AND date_found <= ? AND ? = items.type_id AND collected_by IS NOT NULL ORDER BY date_found DESC;', [$req['date1'], $req['date2'], $req['type']]);
        return view('itemViews/collectedItems')->with('formTypes', $types)->with('items', $items)->with('filterParam', $filterParam);
    }

    public function showForm(){
        $types = DB::select('SELECT * FROM item_types;');
        return view('itemViews/itemForm')->with('formTypes', $types);
    }

    public function showEditForm(Request $req) {
      $item = DB::select('select * from items where item_id= ?', [$req['btnid']]);
      return view('itemViews/editForm')->with('item', $item[0]);
    }

     public function addItem(Request $req) {
         DB::insert('INSERT INTO items (type_id, location_found,
         description, owner_info, inventory_location, officer, report_number, date_found) VALUES
         ( ?, ?, ?, ?, ?, ?, ?, ?)', [$req['type'], $req['location'], $req['description'],
         $req['ownerinfo'], $req['inventorylocation'], $req['officer'], $req['reportnumber'], $req['date']]);

         $MSG = "You have added an item!";
         return view('success')->with('msg', $MSG);
     }

     public function editItem(Request $req) {
       DB::update('update items set type_id = ?, location_found= ?,
        description= ?, owner_info= ?, collected_by = ?, inventory_location= ?, officer= ?, report_number= ? where item_id= ?',
          [$req['type'], $req['location'], $req['description'], $req['ownerinfo'], $req['collected'],
          $req['inventorylocation'], $req['officer'], $req['reportnumber'], $req['id']]);

          $MSG = "You have updated an item!";
          return view('success')->with('msg', $MSG);
     }

     public function showCollectedItems(){
       $types = DB::select('select * from item_types;');
       $items = DB::select("SELECT items.*, item_types.type FROM items INNER JOIN item_types ON items.type_id = item_types.type_id WHERE collected_by IS NOT NULL ORDER BY date_found DESC LIMIT 50;");
       return view('itemViews/collectedItems')->with('items', $items)->with('formTypes', $types);
     }
 }
