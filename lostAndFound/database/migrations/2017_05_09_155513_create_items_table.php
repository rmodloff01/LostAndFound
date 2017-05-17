<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('item_id');
            $table->integer('type_id')->unsigned();
            $table->foreign('type_id')->references('type_id')->on('item_types');
            $table->date('date_found');
            $table->string('location_found', 100)->nullable();
            $table->string('description', 250)->nullable();
            $table->string('collected_by', 50)->nullable();
            $table->string('owner_info', 250)->nullable();
            $table->string('inventory_location', 45)->nullable();
            $table->string('officer', 45)->nullable();
            $table->string('report_number', 45)->nullable();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
