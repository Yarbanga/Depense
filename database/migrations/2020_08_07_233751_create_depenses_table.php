<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('depenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('nature_depense_id');
            $table->foreignId('mouvement_caisse_id');
            $table->date('dateDepense');
            $table->double('montant');
            $table->double('nouveauSolde');
            $table->text('description');
            $table->string('fournisseur');
            $table->text('commentaire');
            $table->string('fichier');
            $table->string('filePath');
            $table->boolean('statut')->default(false);
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
        Schema::dropIfExists('depenses');
    }
}
