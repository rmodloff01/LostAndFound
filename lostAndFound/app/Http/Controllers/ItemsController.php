<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\ItemType;
use App\Item;
use App\Change;
use View;

class ItemsController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }

    public function filterLostResults(Request $req){
        $filterType = ItemType::find($req['type'])->type;
        $filterParams = array("date1"=>$req['date1'], "date2"=>$req['date2'], "typeString"=>$filterType, "type"=>$req['type']);
        $items = DB::select('SELECT items.*, item_types.type FROM items INNER JOIN item_types ON items.type_id = item_types.type_id WHERE date_found >= ? AND date_found <= ? AND ? = items.type_id AND collected_by IS NULL ORDER BY date_found DESC;', [$req['date1'], $req['date2'], $req['type']]);
        return view('home')->with('formTypes', ItemType::getAllTypes())->with('items', $items)->with('filterParams', $filterParams);
    }

    public function filterCollectedResults(Request $req){
        $filterType = ItemType::find($req['type'])->type;
        $filterParams = array("date1"=>$req['date1'], "date2"=>$req['date2'], "typeString"=>$filterType, "type"=>$req['type']);
        $items = DB::select('SELECT items.*, item_types.type FROM items INNER JOIN item_types ON items.type_id = item_types.type_id WHERE date_found >= ? AND date_found <= ? AND ? = items.type_id AND collected_by IS NOT NULL ORDER BY date_found DESC;', [$req['date1'], $req['date2'], $req['type']]);
        return view('itemViews/collectedItems')->with('formTypes', ItemType::getAllTypes())->with('items', $items)->with('filterParams', $filterParams);
    }

    public function showCreateForm(){
        return view('itemViews/itemForm')->with('formTypes', ItemType::getAllTypes());
    }

    public function showEditOrChangesForm(Request $req) {
        if(isset($req['updatebtn'])){
            return view('itemViews/editForm')->with('item', Item::find($req['updatebtn']))->with('formTypes', ItemType::getAllTypes());
        }
        else if(isset($req['changesbtn'])){
            $changes = DB::select("SELECT changes.field_changed, changes.old_val, changes.new_val, users.name, changes.created_at FROM changes INNER JOIN users ON changes.user_id = users.id WHERE item_id = ? ORDER BY changes.created_at DESC;", [$req['changesbtn']]);
            return view('reporting/changes')->with('changes', $changes)->with('item', Item::find($req['changesbtn']));
        }
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

    public function showCollectedItems(){
        $types = ItemType::getAllTypes();
        $items = DB::select("SELECT items.*, item_types.type FROM items INNER JOIN item_types ON items.type_id = item_types.type_id WHERE collected_by IS NOT NULL ORDER BY date_found DESC LIMIT 50;");
        return view('itemViews/collectedItems')->with('items', $items)->with('formTypes', $types);
    }

    public function editItem(Request $req) {
        $wasChanged = false;
        $editedItem = Item::find($req['id']);
        if($editedItem->type_id != $req['type']){
            $wasChanged = true;
            $change = new Change;
            $change->user_id = Auth::id();
            $change->item_id = $editedItem->item_id;
            $change->field_changed = "Item Type";
            $change->old_val = ItemType::find($editedItem->type_id)->type;
            $change->new_val = ItemType::find($req['type'])->type;
            $change->save();
            $editedItem->type_id = $req['type'];
        }
        if($editedItem->collected_by != $req['collected']){
            $wasChanged = true;
            $change = new Change;
            $change->user_id = Auth::id();
            $change->item_id = $editedItem->item_id;
            $change->field_changed = "Collected By";
            $change->old_val = $editedItem->collected_by;
            $change->new_val = $req['collected'];
            $change->save();
            $editedItem->collected_by = $req['collected'];
        }
        if($editedItem->location_found != $req['location']){
            $wasChanged = true;
            $change = new Change;
            $change->user_id = Auth::id();
            $change->item_id = $editedItem->item_id;
            $change->field_changed = "Location Found";
            $change->old_val = $editedItem->location_found;
            $change->new_val = $req['location'];
            $change->save();
            $editedItem->location_found = $req['location'];
        }
        if($editedItem->description != $req['description']){
            $wasChanged = true;
            $change = new Change;
            $change->user_id = Auth::id();
            $change->item_id = $editedItem->item_id;
            $change->field_changed = "Description";
            $change->old_val = $editedItem->description;
            $change->new_val = $req['description'];
            $change->save();
            $editedItem->description = $req['description'];
        }
        if($editedItem->owner_info != $req['ownerinfo']){
            $wasChanged = true;
            $change = new Change;
            $change->user_id = Auth::id();
            $change->item_id = $editedItem->item_id;
            $change->field_changed = "Owner Info";
            $change->old_val = $editedItem->owner_info;
            $change->new_val = $req['ownerinfo'];
            $change->save();
            $editedItem->owner_info = $req['ownerinfo'];
        }
        if($editedItem->inventory_location != $req['inventorylocation']){
            $wasChanged = true;
            $change = new Change;
            $change->user_id = Auth::id();
            $change->item_id = $editedItem->item_id;
            $change->field_changed = "Inventory Location";
            $change->old_val = $editedItem->inventory_location;
            $change->new_val = $req['inventorylocation'];
            $change->save();
            $editedItem->inventory_location = $req['inventorylocation'];
        }
        if($editedItem->officer != $req['officer']){
            $wasChanged = true;
            $change = new Change;
            $change->user_id = Auth::id();
            $change->item_id = $editedItem->item_id;
            $change->field_changed = "Officer";
            $change->old_val = $editedItem->officer;
            $change->new_val = $req['officer'];
            $change->save();
            $editedItem->officer = $req['officer'];
        }
        if($editedItem->report_number != $req['reportnumber']){
            $wasChanged = true;
            $change = new Change;
            $change->user_id = Auth::id();
            $change->item_id = $editedItem->item_id;
            $change->field_changed = "Report Number";
            $change->old_val = $editedItem->report_number;
            $change->new_val= $req['reportnumber'];
            $change->save();
            $editedItem->report_number = $req['reportnumber'];
        }
        $editedItem->save();

        $MSG = "Nothing changed.";
        if($wasChanged){
            $MSG = "You have updated an item!";
        }
        return view('success')->with('msg', $MSG);
    }
 }
