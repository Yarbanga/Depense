<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('approvisionnements', function (Blueprint $table) {        
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('depenses', function (Blueprint $table) {        
            $table->foreign('user_id')->references('id')->on('users');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('depenses', function (Blueprint $table) {        
            $table->dropForeign('user_id_foreign');
        });

        Schema::table('depenses', function (Blueprint $table) {        
            $table->dropForeign('user_id_foreign');
        });
    }
}
