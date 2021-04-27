<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMouvementCaissesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mouvement_caisses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('caisse_id');
            $table->date('dateOuverture');
            $table->date('dateFermeture');
            $table->double('soldeOuverture');
            $table->double('totalAppro')->nullable();
            $table->double('totalDepense')->nullable();
            $table->double('soldeTheorique')->nullable();
            $table->double('soldePhysique')->nullable();
            $table->double('ecart')->nullable();
            $table->boolean('statut')->default(true);
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
        Schema::dropIfExists('mouvement_caisses');
    }
}
