<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('id');
            $table->string('prop_name');
            $table->tinyInteger('catid');
            $table->text('prop_desc');
            $table->string('picture')->nullable();
            $table->string('prop_country');
            $table->string('prop_state');
            $table->string('prop_city');
            $table->string('prop_addr');
            $table->string('prop_pincode');
            $table->string('prop_price');
            $table->tinyInteger('user_id');
            $table->string('created_by');
            $table->tinyInteger('status')->default(0);
            $table->date('endDate');
            $table->string('endTime');
            $table->tinyInteger('is_deleted')->default(0);
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
        Schema::dropIfExists('properties');
    }
}
