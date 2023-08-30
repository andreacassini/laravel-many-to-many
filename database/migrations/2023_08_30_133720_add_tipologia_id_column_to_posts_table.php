<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            //DEFINISCO LA COLONNA COME unsignedBigInteger
            $table->unsignedBigInteger('tipologia_id')->nullable()->after('id');

            //CREO VINCOLO/FOREIGN KEY
            $table->foreign('tipologia_id')->references('id')->on('tipologias')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign('posts_tipologia_id_foreign');
            $table->dropColumn('tipologia_id');
        });
    }
};
