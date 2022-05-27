<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_tickets', function (Blueprint $table) {
            $table->id();
            
            $table->string("libelle");
            $table->integer("prix");

            $table->unsignedBigInteger('gala_id');
            $table->foreign('gala_id')->references('id')->on('galas')->onDelete('cascade');


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
        Schema::dropIfExists('type_tickets');
    }
}
