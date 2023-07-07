<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class EventoController extends Controller
{
    public function index()
    {
        $evento = Evento::all();
        return view('site.index', ['evento' => $evento]);
    }

    public function create()
    {
        return view('site.evento');
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'responsavel' => 'required',
            'email' => 'required|email',
            'nome_evento' => 'required',
            'local' => 'required',
            'data' => 'required|date',
            'inicio' => 'required',
            'fim' => 'required',
            'descricao' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Verificação de conflito de horário
        $inicio = $request->input('inicio');
        $fim = $request->input('fim');
        $data = $request->input('data');
        $local = $request->input('local');

        $conflito = Evento::where('local', $local)
            ->where('data', $data)
            ->where(function ($query) use ($inicio, $fim) {
                $query->where(function ($q) use ($inicio, $fim) {
                    $q->where('inicio', '<=', $inicio)
                        ->where('fim', '>', $inicio);
                })->orWhere(function ($q) use ($inicio, $fim) {
                    $q->where('inicio', '>=', $inicio)
                        ->where('inicio', '<', $fim);
                });
            })
            ->exists();

        if ($conflito) {
            throw ValidationException::withMessages([
                'conflito' => 'Conflito de horário, favor escolher outro horário, ou local.',
            ]);
        }


        Evento::create($request->all());
        return redirect()->route('evento.index')->with('success', 'Evento agendado com sucesso!');
    }
}
