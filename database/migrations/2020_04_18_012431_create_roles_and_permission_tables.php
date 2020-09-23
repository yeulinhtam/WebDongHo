<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesAndPermissionTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles',function(Blueprint $table){
          $table->increments('id');
          $table->string('description');
          $table->timestamps();
      });

        Schema::create('permissions',function(Blueprint $table){
          $table->increments('id');
          $table->string('name');
          $table->string('description');
          $table->timestamps();
      });

        Schema::create('role_permission',function(Blueprint $table){
          $table->unsignedInteger('role_id');
          $table->foreign('role_id')->references('id')->on('roles')->onDelete('CASCADE');
          $table->unsignedInteger('permission_id');
          $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('CASCADE');
          $table->primary(['role_id','permission_id']);
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
        Schema::dropIfExists('roles');
          Schema::dropIfExists('permissons');
            Schema::dropIfExists('role');
    }
}
