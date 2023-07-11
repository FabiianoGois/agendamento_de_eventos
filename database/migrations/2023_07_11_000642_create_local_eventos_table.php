<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\LocalEvento;

class CreateLocalEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('local_eventos', function (Blueprint $table) {
            $table->id();
            $table->string('local');
            $table->timestamps();
        });

        /*
        LocalEvento::create(['Plenario']);
        LocalEvento::create(['Auditório']);
        LocalEvento::create(['Sala de Reunião']);
        */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('local_eventos');
    }
}
