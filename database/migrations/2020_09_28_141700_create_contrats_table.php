<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->double('montant');
            $table->string('modalite_paiement');
            $table->string('type_paiement');
            $table->unsignedBigInteger('type_service_id');
            $table->foreign('type_service_id')->references('id')->on('type_services');
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('clients');
            $table->unsignedBigInteger('employe_id');
            $table->foreign('employe_id')->references('id')->on('users');
            

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
        Schema::dropIfExists('contrats');
    }
}
