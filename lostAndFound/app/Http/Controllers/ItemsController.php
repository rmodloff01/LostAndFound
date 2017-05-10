<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\ItemType;
use App\Item;
use View;

class ItemsController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }

    public function filterLostResults(Request $req){
        $filterType = DB::select('SELECT type FROM item_types WHERE type_id=?;', [$req['type']]);
        $filterParam = $req['date1'] . " - " . $req['date2'] . ". Type: " . $filterType[0]->type;
        $types = ItemType::getAllTypes();
        $items = DB::select('SELECT items.*, item_types.type FROM items INNER JOIN item_types ON items.type_id = item_types.type_id WHERE date_found >= ? AND date_found <= ? AND ? = items.type_id AND collected_by IS NULL ORDER BY date_found DESC;', [$req['date1'], $req['date2'], $req['type']]);
        return view('home')->with('formTypes', $types)->with('items', $items)->with('filterParam', $filterParam);
    }
    public function filterCollectedResults(Request $req){
        $filterType = DB::select('SELECT type FROM item_types WHERE type_id=?;', [$req['type']]);
        $filterParam = $req['date1'] . " - " . $req['date2'] . ". Type: " . $filterType[0]->type;
        $types = ItemType::getAllTypes();
        $items = DB::select('SELECT items.*, item_types.type FROM items INNER JOIN item_types ON items.type_id = item_types.type_id WHERE date_found >= ? AND date_found <= ? AND ? = items.type_id AND collected_by IS NOT NULL ORDER BY date_found DESC;', [$req['date1'], $req['date2'], $req['type']]);
        return view('itemViews/collectedItems')->with('formTypes', $types)->with('items', $items)->with('filterParam', $filterParam);
    }

    public function showCreateForm(){
        $types = ItemType::getAllTypes();
        return view('itemViews/itemForm')->with('formTypes', $types);
    }

    public function showEditForm(Request $req) {
        $types = ItemType::getAllTypes();
        $item = Item::find($req['btnid']);
        return view('itemViews/editForm')->with('item', $item)->with('formTypes', $types);
    }

     public function addItem(Request $req) {

         $newItem = new Item;
         $newItem->type_id = $req['type'];
         $newItem->location_found = $req['location'];
         $newItem->description = $req['description'];
         $newItem->owner_info = $req['ownerinfo'];
         $newItem->inventory_location = $req['inventorylocation'];
         $newItem->officer = $req['officer'];
         $newItem->report_number = $req['reportnumber'];
         $newItem->date_found = $req['date'];
         $newItem->save();

         $MSG = "You have added an item!";
         return view('success')->with('msg', $MSG);
     }

     public function editItem(Request $req) {

          $editedItem = Item::find($req['id']);
          $editedItem->type_id = $req['type'];
          $editedItem->collected_by = $req['collected'];
          $editedItem->location_found = $req['location'];
          $editedItem->description = $req['description'];
          $editedItem->owner_info = $req['ownerinfo'];
          $editedItem->inventory_location = $req['inventorylocation'];
          $editedItem->officer = $req['officer'];
          $editedItem->report_number = $req['reportnumber'];
          $editedItem->save();

          $MSG = "You have updated an item!";
          return view('success')->with('msg', $MSG);
     }

     public function showCollectedItems(){
       $types = ItemType::getAllTypes();
       $items = DB::select("SELECT items.*, item_types.type FROM items INNER JOIN item_types ON items.type_id = item_types.type_id WHERE collected_by IS NOT NULL ORDER BY date_found DESC LIMIT 50;");
       return view('itemViews/collectedItems')->with('items', $items)->with('formTypes', $types);
     }
 }
