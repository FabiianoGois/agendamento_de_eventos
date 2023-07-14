<?php

namespace Database\Seeders;

use App\Models\Evento;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(EventoSeeder::class);
        //$this->call(LocalEventoSeeder::class);
        // User::factory(10)->create();
    }
}
