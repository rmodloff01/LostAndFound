<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use View;

class ItemsController extends Controller {
    public function __construct(  ) {
        $this->middleware('auth');
    }

    public function getSearchResults(  ) {

    }

    public function showForm(){
        return view('itemViews/itemForm');
    }

     public function addItem(Request $req) {
       DB::insert('insert into items (type_id, location_found,
        description, owner_info, inventory_location, officer, report_number) values
        ( ?, ?, ?, ?, ?, ?, ?)', [$req['types'], $req['location'], $req['description'],
          $req['ownerinfo'], $req['inventorylocation'], $req['officer'], $req['reportnumber']]);

        return view('/home');
     }

     public function editItem() {


     }

 }
