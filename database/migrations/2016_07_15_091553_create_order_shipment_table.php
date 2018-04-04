<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderShipmentTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('ORDER_SHIPMENT', function(Blueprint $table) {
            $table->increments('ID');
            $table->string('SHIPPING_METHOD_ID');
            $table->string('SHIPPING_CAREER_ID');
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
        //
    }

}
