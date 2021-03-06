<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_users', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_id_fk_598761')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedInteger('role_id');
            // $table->foreign('role_id', 'role_id_fk_598761')->references('id')->on('roles')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_users');
    }
}
