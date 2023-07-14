@extends('site.layouts.basico')

@section('titulo', 'Agendamento de Eventos')

@section('conteudo')

    <!-- Conteúdo Centralizado -->
    <form action="/" method="GET">
        @csrf
        <div class="container text-center mt-3">
            <div class="row">
                <div class="col-md-3 ms-auto mt-3">
                    <select class="form-control" id="pesquisarLocal" name="pesquisarLocal">
                        <option value="">Selecione um local</option>
                        @foreach ($locaisEventos as $key => $locaisEvento)
                            <option value="{{ $locaisEvento->id }}">
                                {{ $locaisEvento->local }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 mt-3">
                    <input type="date" class="form-control" id="filtroData" name="filtroData">
                </div>
                <div class="col-md-3 ms-auto mt-3">
                    <input type="text" class="form-control" id="pesquisar" name="pesquisar" placeholder="Pesquisar">
                </div>
                <div class="col-md-3 mt-3">
                    <button type="submit" class="btn btn-primary">Pesquisar</button>
                </div>
            </div>
            <br>
            @if ($pesquisar)
                <h1>Buscando por: {{ $pesquisar }} </h1>
            @elseif ($pesquisarLocal == 1)
                <h1>Buscando por local: Plenário </h1>
            @elseif ($pesquisarLocal == 2)
                <h1>Buscando por local: Auditório </h1>
            @elseif ($pesquisarLocal == 3)
                <h1>Buscando por local: Sala de Reunião </h1>
            @else
                <h1>Lista de Eventos</h1>
            @endif

            <table class="table">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome do Evento</th>
                        <th>Local</th>
                        <th>Responsável</th>
                        <th>Email</th>
                        <th>Data</th>
                        <th>Início</th>
                        <th>Término</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($eventos as $evento)
                        <tr>
                            <td>{{ $evento->id }}</td>
                            <td>{{ $evento->nome_evento }}</td>
                            <td>{{ $evento->localEvento->local }}</td>
                            <td>{{ $evento->responsavel }}</td>
                            <td>{{ $evento->email }}</td>
                            <td>{{ \Carbon\Carbon::parse($evento->data)->format('d/m/Y') }}</td>
                            <td>{{ $evento->inicio }}</td>
                            <td>{{ $evento->fim }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if (count($eventos) == 0 && $pesquisar)
                <p>Não foi possível encontrar eventos com o termo {{ $pesquisar }}. <a href="/">Ver todos
                        eventos.</a></p>
            @elseif (count($eventos) == 0 && $pesquisarLocal == 1)
                <p>Não foi possível encontrar eventos no Plenário. <a href="/">Ver todos
                        eventos.</a></p>
            @elseif (count($eventos) == 0 && $pesquisarLocal == 2)
                <p>Não foi possível encontrar eventos no Auditório. <a href="/">Ver todos
                        eventos.</a></p>
            @elseif (count($eventos) == 0 && $pesquisarLocal == 3)
                <p>Não foi possível encontrar eventos na Sala de Reunião. <a href="/">Ver todos
                        eventos.</a></p>
            @elseif (count($eventos) == 0 && $filtroData)
                <p>Não foi possível encontrar eventos na data {{ \Carbon\Carbon::parse($filtroData)->format('d/m/Y') }}. <a
                        href="/">Ver todos
                        eventos.</a></p>
            @elseif (count($eventos) == 0)
                <p>Não há eventos disponíveis.</p>
            @endif
            <div class="d-flex justify-content-center">
                {{ $eventos->links() }}
            </div>
        </div>
    </form>
@endsection
