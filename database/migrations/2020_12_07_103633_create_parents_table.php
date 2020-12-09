<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parents', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->bigIncrements('id');
            $table->BigInteger('eleve')->unsigned();
            $table->foreign('eleve')->references('id')->on('users');
            $table->string('name',25);
            $table->string('prenom',25);
            $table->string('télé',25);
            $table->string('email')->unique();
            $table->integer('role')->index();
            $table->foreign('role')->references('id')->on('roles');
            $table->string('password');
             
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
        Schema::dropIfExists('parents');
    }
}
