<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('ORDER', function(Blueprint $table) {
            $table->increments('ID');
            $table->string('ORDER_ID');
            $table->string('ORDER_CHANNEL');
            $table->string('SHIPPPING_ID', 60);
            $table->string('TRACKING_NUMBER', 60);
            $table->dateTime('CREATED_AT')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('UPDATED_AT')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('ORDER');
    }

}
