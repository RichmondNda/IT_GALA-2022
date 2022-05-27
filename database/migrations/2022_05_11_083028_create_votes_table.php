<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->id();

            $table->string('code')->nullable() ;

            $table->unsignedBigInteger('gala_id');
            $table->foreign('gala_id')->references('id')->on('galas')->onDelete('cascade');

            $table->unsignedBigInteger('nomine_id');
            $table->foreign('nomine_id')->references('id')->on('nomines')->onDelete('cascade');

            $table->unsignedBigInteger('categorie_id');
            $table->foreign('categorie_id')->references('id')->on('categories')->onDelete('cascade');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            
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
        Schema::dropIfExists('votes');
    }
}
