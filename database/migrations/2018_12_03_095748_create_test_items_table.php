<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('sample_id')->unsigned();
            $table->text('description')->nullable();
            $table->string('price')->nullable();
            $table->string('is_new')->default(0);
            $table->timestamps();

            $table->foreign('sample_id')->references('id')->on('samples');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('test_items');
    }
}
