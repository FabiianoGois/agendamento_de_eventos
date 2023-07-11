<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LocalEvento;

class LocalEventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LocalEvento::create(['local' => 'Plenario']);
        LocalEvento::create(['local' => 'Auditório']);
        LocalEvento::create(['local' => 'Sala de Reunião']);
    }
}
