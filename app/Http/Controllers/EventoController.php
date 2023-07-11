<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Models\LocalEvento;

class EventoController extends Controller
{
    public function loadEventos()
    {
        $pesquisar = request('pesquisar');
        // $filtro = request('filtro');

        if ($pesquisar) {
            $eventos = Evento::where(function ($query) use ($pesquisar) {
                $query->where('responsavel', 'like', '%' . $pesquisar . '%')
                    ->orWhere('nome_evento', 'like', '%' . $pesquisar . '%')
                    ->orWhere('email', 'like', '%' . $pesquisar . '%')
                    ->orWhere('data', 'like', '%' . $pesquisar . '%')
                    ->orWhere('local_eventos_id', 'like', '%' . $pesquisar . '%');
            })->paginate(5);
        } else {
            $eventos = Evento::orderBy('data', 'desc')->paginate(5);
        }
        return view('site.index', ['eventos' => $eventos, 'pesquisar' => $pesquisar,]);
    }

    public function create()
    {
        $local = LocalEvento::all();

        return view('site.evento', ['local_eventos_id' => $local]);
    }
    public function teste()
    {
        return view('site.teste');
    }

    public function store(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'responsavel' => 'required|min:3|max:40',
                'email' => 'email',
                'nome_evento' => 'required',
                'local_eventos_id' => 'required',
                'data' => 'required|date',
                'inicio' => 'required',
                'fim' => 'required',
                'descricao' => 'required|max:2000',
            ],
            [
                'responsavel.min' => 'O campo responsável deve ter no mínimo 3 caracteres.',
                'responsavel.max' => 'O campo responsável deve ter no máximo 40 caracteres.',

                'email.email' => 'O email informado não é válido.',

                'descricao' => 'A descrição deve conter no máximo 2000 caracteres.',

                'required' => 'O campo :attribute deve ser preenchido',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Verificação de conflito de horário
        $inicio = $request->input('inicio');
        $fim = $request->input('fim');
        $data = $request->input('data');
        $local = $request->input('local_eventos_id');

        $conflito = Evento::where('local_eventos_id', $local)
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
