<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatesRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('roles')) {
            Schema::create('roles', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name', 50)->nullable(true);
                $table->timestamp('created_at')->nullable(true);
                $table->timestamp('updated_at')->nullable(true);
            });

            DB::table('roles')->insert([
                'name' => 'Admin',
                'created_at' => date("Y-m-d H:i:s"),
            ]);
            DB::table('roles')->insert([
                'name' => 'User',
                'created_at' => date("Y-m-d H:i:s"),
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
