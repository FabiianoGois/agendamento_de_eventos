@extends('site.layouts.basico')

@section('titulo', 'Agendamento de Eventos')

@section('conteudo')

    <!-- Conteúdo Centralizado -->
    <form action="/" method="GET">
        @csrf
        <div class="row">
            <div class="col-md-3 ms-auto mt-3">
                <input type="text" class="form-control" id="pesquisar" name="pesquisar" placeholder="Pesquisar">
            </div>
            <div class="col-md-3 mt-3">
                <button type="submit" class="btn btn-primary">Pesquisar</button>
            </div>
        </div>
        <div class="container text-center mt-3">

            @if ($pesquisar)
                <h1>Buscando por: {{ $pesquisar }} </h1>
            @else
                <h1>Lista de Eventos</h1>
            @endif

            <table class="table">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Responsável</th>
                        <th>Email</th>
                        <th>Nome do Evento</th>
                        <th>Local do Evento</th>
                        <th>Data</th>
                        <th>Hora de Início</th>
                        <th>Hora de Término</th>
                        <th>Descrição</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($eventos as $evento)
                        <tr>
                            <td>{{ $evento->id }}</td>
                            <td>{{ $evento->responsavel }}</td>
                            <td>{{ $evento->email }}</td>
                            <td>{{ $evento->nome_evento }}</td>
                            <td>{{ $evento->localEvento->local }}</td>
                            <td>{{ \Carbon\Carbon::parse($evento->data)->format('d/m/Y') }}</td>
                            <td>{{ $evento->inicio }}</td>
                            <td>{{ $evento->fim }}</td>
                            <td>{{ $evento->descricao }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if (count($eventos) == 0 && $pesquisar)
                <p>Não foi possível encontrar nenhum evento com {{ $pesquisar }}. <a href="/">ver todos
                        eventos.</a></p>
            @elseif(count($eventos) == 0)
                <p>Não há eventos disponíveis.</p>
            @endif

            <div class="d-flex justify-content-center">
                {{ $eventos->links() }}
            </div>
        </div>
    </form>
@endsection
