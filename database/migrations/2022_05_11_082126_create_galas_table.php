<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGalasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galas', function (Blueprint $table) {
            $table->id();
            $table->string("annee");
            $table->string("nomPco1");
            $table->string("nomPco2");
            $table->integer("nbPlace");
            $table->boolean('status')->default(true) ;
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
        Schema::dropIfExists('galas');
    }
}
