<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Evento;
use Illuminate\Support\Facades\DB;

class EventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //instanciando o objeto
        $eventos = new Evento();
        $eventos->responsavel = "Fabiano";
        $eventos->email = "fabianosilva@creadf.org.br";
        $eventos->nome_evento = "Reunião Agendamento";
        $eventos->local = 2;
        $eventos->data = "2023-07-010";
        $eventos->inicio = "16:00";
        $eventos->fim = "16:30";
        $eventos->descricao = "Reunião teste";
        $eventos->save();

        //método create
        Evento::create([
            'responsavel' => 'Guilherme',
            'email' => 'Guilherme@creadf.org.br',
            'nome_evento' => 'Reunião GED',
            'local' => 1,
            'data' => '2023-07-08',
            'inicio' => '15:00',
            'fim' => '15:30',
            'descricao' => 'Reuniao Teste 2'
        ]);

        //insert
        DB::table('eventos')->insert([
            'responsavel' => 'Paulo',
            'email' => 'paulo@creadf.org.br',
            'nome_evento' => 'Reunião SGO',
            'local' => 3,
            'data' => '2023-07-04',
            'inicio' => '15:00',
            'fim' => '15:30',
            'descricao' => 'Reuniao Teste 3'
        ]);
    }
}
