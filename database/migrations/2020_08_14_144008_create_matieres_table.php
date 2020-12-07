<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatieresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matieres', function (Blueprint $table) { 
            $table->engine = "InnoDB";
            $table->bigIncrements('id');
            $table->string('nomMatiere',25);
            $table->BigInteger('mfiliere')->index();
            $table->foreign('mfiliere', 'mfiliere_fk_598761')->references('id')->on('filieres');
           
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
        Schema::dropIfExists('matieres');
    }
}
