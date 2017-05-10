<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\ItemType;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = ItemType::getAllTypes();
        $items = DB::select("SELECT items.*, item_types.type FROM items INNER JOIN item_types ON items.type_id = item_types.type_id WHERE collected_by IS NULL ORDER BY date_found DESC LIMIT 50;");
        return view('home')->with('items', $items)->with('formTypes', $types);
    }
}
