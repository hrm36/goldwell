<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColorRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('color_rooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug');
            $table->text('image');
            $table->text('des_s');
            $table->text('des_f');
            $table->boolean('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('color_rooms');
    }
}
