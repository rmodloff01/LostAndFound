<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_types', function (Blueprint $table) {
            $table->increments('type_id');
            $table->string('type', 50);
            $table->engine = 'InnoDB';
        });
        $insertString = "INSERT INTO item_types (type) VALUES (?);";
        DB::insert($insertString, ['Keys']);
        DB::insert($insertString, ['Wallet']);
        DB::insert($insertString, ['Cell Phone']);
        DB::insert($insertString, ['Laptop/Tablet']);
        DB::insert($insertString, ['AU ID - Official Gov ID Card']);
        DB::insert($insertString, ['Flash Drive']);
        DB::insert($insertString, ['Textbook']);
        DB::insert($insertString, ['Clothing']);
        DB::insert($insertString, ['Bags - Purses/Backpack']);
        DB::insert($insertString, ['Debit/Credit Card']);
        DB::insert($insertString, ['Glasses']);
        DB::insert($insertString, ['Jewelry']);
        DB::insert($insertString, ['Charger']);
        DB::insert($insertString, ['Headphones']);
        DB::insert($insertString, ['Notebook/Binder']);
        DB::insert($insertString, ['Other']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_types');
    }
}
