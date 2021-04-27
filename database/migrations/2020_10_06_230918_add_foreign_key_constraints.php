<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyConstraints extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('depenses', function (Blueprint $table) {        
            $table->foreign('nature_depense_id')->references('id')->on('nature_depenses');
        });

        Schema::table('depenses', function (Blueprint $table) {        
            $table->foreign('mouvement_caisse_id')->references('id')->on('mouvement_caisses');
        });

        Schema::table('mouvement_caisses', function (Blueprint $table) {        
            $table->foreign('caisse_id')->references('id')->on('caisses');
        });

        Schema::table('mouvement_caisses', function (Blueprint $table) {        
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('approvisionnements', function (Blueprint $table) {        
            $table->foreign('type_approvisionnement_id')->references('id')->on('type_approvisionnements');
        });

        Schema::table('approvisionnements', function (Blueprint $table) {        
            $table->foreign('mouvement_caisse_id')->references('id')->on('mouvement_caisses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('depenses', function (Blueprint $table) {        
            $table->dropForeign('nature_depense_id_foreign');
        });

        Schema::table('depenses', function (Blueprint $table) {        
            $table->dropForeign('mouvement_caisse_id_foreign');
        });

        Schema::table('mouvement_caisses', function (Blueprint $table) {        
            $table->dropForeign('caisse_id_foreign');
        });

        Schema::table('mouvement_caisses', function (Blueprint $table) {        
            $table->dropForeign('user_id_foreign');
        });

        Schema::table('approvisionnements', function (Blueprint $table) {        
            $table->dropForeign('type_approvisionnement_id_foreign');
        });

        Schema::table('approvisionnements', function (Blueprint $table) {        
            $table->dropForeign('mouvement_caisse_id_foreign');
        });
    }
}
