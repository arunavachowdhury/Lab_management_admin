<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestMethodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_methods', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('sample_id')->unsigned();
            $table->integer('test_item_id')->unsigned();
			$table->integer('uom_id')->unsigned();
			$table->string('name');
			$table->string('specified_range_from')->nullable();
            $table->string('specified_range_to')->nullable();
            $table->timestamps();

			$table->foreign('sample_id')->references('id')->on('samples');
            $table->foreign('test_item_id')->references('id')->on('test_items');
			$table->foreign('uom_id')->references('id')->on('uoms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('test_methods');
    }
}
