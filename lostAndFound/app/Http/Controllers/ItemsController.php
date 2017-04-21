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

    public function getSearchResults(Request $req){
        $types = DB::select('select * from item_types;');
        //$items = DB::select('SELECT items.*, item_types.type FROM items INNER JOIN item_types ON items.type_id = item_types.type_id
        //    WHERE date_found > ? AND date_found < ? AND ? = items.type_id;', []);
        return view('home')->with('formData', $req['types'])->with('formTypes', $types);
    }

    public function showForm(){
        return view('itemViews/itemForm');
    }

    public function showEditForm() {
      return view('itemViews/editForm');
    }

     public function addItem(Request $req) {
         $types = DB::select('select * from item_types;');
         DB::insert('insert into items (type_id, location_found,
         description, owner_info, inventory_location, officer, report_number) values
         ( ?, ?, ?, ?, ?, ?, ?)', [$req['types'], $req['location'], $req['description'],
         $req['ownerinfo'], $req['inventorylocation'], $req['officer'], $req['reportnumber']]);
         $items = DB::select('SELECT items.*, item_types.type FROM items INNER JOIN item_types ON items.type_id = item_types.type_id ORDER BY date_found DESC;');

         return view('home')->with('items', $items)->with('formTypes', $types);
     }

     public function editItem(Request $req) {
       DB::update('update items set type_id = ?, location_found= ?,
        description= ?, owner_info= ?, collected_by = ?, inventory_location= ?, officer= ?, report_number= ? where item_id= ?',
          [$req['types'], $req['location'], $req['description'], $req['ownerinfo'], $req['collected'],
          $req['inventorylocation'], $req['officer'], $req['reportnumber'], $req['id']]);

          return view('home');

     }

     public function showCollectedItems(){
       $types = DB::select('select * from item_types;');
       $items = DB::select("SELECT items.*, item_types.type FROM items INNER JOIN item_types ON items.type_id = item_types.type_id WHERE collected_by IS NOT NULL ORDER BY date_found DESC;");
       return view('itemViews/collectedItems')->with('items', $items)->with('formTypes', $types);
     }
 }
