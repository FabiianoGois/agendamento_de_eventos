<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AlterTableEventosAddFkLocalEventos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Adicionando a coluna local_eventos_id
        Schema::table('eventos', function (Blueprint $table) {
            $table->unsignedBigInteger('local_eventos_id');
        });

        // Atribuindo local para a nova coluna local_eventos_id
        DB::statement('update eventos set local_eventos_id = local');

        // Criação da FK e remover a coluna local
        Schema::table('eventos', function (Blueprint $table) {
            $table->foreign('local_eventos_id')->references('id')->on('local_eventos');
            $table->dropColumn('local');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Criar a coluna local e removendo a FK
        Schema::table('eventos', function (Blueprint $table) {
            $table->integer('local');
            $table->dropForeign('eventos_local_eventos_id_foreign');
        });

        // Atribuindo local_eventos_id para a nova coluna local
        DB::statement('update eventos set local = local_eventos_id');

         // Removendo a coluna local_eventos_id
         Schema::table('eventos', function (Blueprint $table) {
            $table->dropColumn('local_eventos_id');
        });
    }
}
