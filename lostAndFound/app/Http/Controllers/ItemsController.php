<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use View;

class ItemsController extends Controller {
    public function __construct(  ) {
        //include( app_path() . '/dbClass.php');
    }


    public function getSearchResults(  ) {
        $DB = new dbClass();
    }

    public function showForm(){
        return view('itemViews/itemForm');
    }

     public function addItem() {
       $DB = new dbClass();
       $DB->addRow();
     }

     public function editItem() {
       $DB = new dbClass();
       $DB->editItem();
     }

     public function dontRemember() {

     }
 }
