<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReponseExamensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reponse_examens', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->bigIncrements('id');            
            $table->bigInteger('Eleve')->index();
            $table->bigInteger('Exam')->index();
            $table->bigInteger('Ligne_reponse')->index();         
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
        Schema::dropIfExists('reponse_examens');
    }
}
