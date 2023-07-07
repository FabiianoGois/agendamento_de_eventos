<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"">
    <link rel="stylesheet" href={{ asset('assets/css/estilo_basico.css') }}>
    <title>Formulário do Evento</title>
</head>

<body>
    <div class="container mt-5 ">
        <h1 class="text-center">Formulário do Evento</h1>
        @if ($errors->has('conflito'))
            <div class="alert alert-danger mt-3">
                {{ $errors->first('conflito') }}
            </div>
        @endif
        <form action="{{ route('evento.store') }}" method="POST">
            @csrf
            <div class="col-md-6">
                <label for="responsavel" class="form-label">Responsável:</label>
                <input type="text" class="form-control" id="responsavel" name="responsavel"
                    placeholder="Digite o nome do responsável" required>
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">Email:</label>
                <input type="text" class="form-control" id="email" name="email"
                    placeholder="Digite o email do responsável" required>
            </div>
            <div class="col-md-6">
                <label for="nome_evento" class="form-label">Nome do evento:</label>
                <input type="text" class="form-control" id="nome_evento" name="nome_evento"
                    placeholder="Digite o nome do evento" required>
            </div>
            <div class="col-md-6">
                <label for="local" class="form-label">Local:</label>
                <select id="local" name="local" class="form-select">
                    <option value="1">Plenário</option>
                    <option value="2">Auditório</option>
                    <option value="3">Sala de reunião</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="data" class="form-label">Data:</label>
                <input type="date" class="form-control" id="data" name="data" required>
            </div>
            <div class="col-md-6">
                <label for="inicio" class="form-label">Horário de início:</label>
                <input type="time" class="form-control" id="inicio" name="inicio"required>
            </div>
            <div class="col-md-6">
                <label for="fim" class="form-label">Horário de término:</label>
                <input type="time" class="form-control" id="fim" name="fim" required>
            </div>
            <div class="col-md-6">
                <label for="descricao" class="form-label">Descrição:</label>
                <textarea class="form-control" placeholder="Faça uma breve descrição sobre o evento" id="descricao" name="descricao"></textarea>
            </div>
            <div class="col-md-6">
                <div class="col-sm-2"></div>
                <div class="col-sm-6">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
