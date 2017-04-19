<?php

namespace App\Http\Controllers;

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

     public function addItem() {
     }

     public function editItem() {
     }

     public function dontRemember() {
     }
 }
