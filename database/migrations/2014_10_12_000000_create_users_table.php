<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id'); //$table->increments('id');
            $table->unsignedInteger('role_id')->nullable(true);
           // $table->string('first_name', 100)->nullable(true);
            $table->string('name')->nullable(true);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('image')->nullable();
            $table->rememberToken();
            $table->tinyInteger('is_active')->default('1')->comment('1=>"Yes",0=>"No"');
            $table->timestamp('deleted_at')->nullable(true);
            $table->timestamps();
        });

        DB::table('users')->insert([
            'role_id' => '1',
            //'first_name' => 'Super',
            'name' => 'Arijit Dutta',
            'email' => 'arijit@digitalaptech.com',
            'password' => bcrypt('123456'),
            'created_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('users')->insert([
            'role_id' => '2',
            //'first_name' => 'Super',
            'name' => 'Arijit Dutta',
            'email' => 'arijit.dutta48@gmail.com',
            'password' => bcrypt('123456'),
            'created_at' => date("Y-m-d H:i:s"),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
