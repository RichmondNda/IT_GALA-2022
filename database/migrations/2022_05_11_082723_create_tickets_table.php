<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('gala_id');
            $table->foreign('gala_id')->references('id')->on('galas')->onDelete('cascade');

            $table->unsignedBigInteger('personne_id')->nullable();
            $table->foreign('personne_id')->references('id')->on('personnes')->onDelete('cascade');


            $table->unsignedBigInteger('homme_id')->nullable();
            $table->foreign('homme_id')->references('id')->on('personnes')->onDelete('cascade');

            $table->unsignedBigInteger('femme_id')->nullable();
            $table->foreign('femme_id')->references('id')->on('personnes')->onDelete('cascade');

            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')->references('id')->on('type_tickets')->onDelete('cascade');

            $table->integer("nbUtilisation")->default("1");
            $table->boolean("statut")->default(false) ;

            $table->string("code");


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
        Schema::dropIfExists('tickets');
    }
}
