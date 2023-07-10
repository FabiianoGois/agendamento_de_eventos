{{ $slot }}
<form action="{{ route('evento.store') }}" method="POST">
    @csrf
    <div class="col-md-6">
        <label for="responsavel" class="form-label">Responsável:</label>
        <input type="text" class="form-control" id="responsavel" name="responsavel" value="{{ old('responsavel') }}"
            placeholder="Digite o nome do responsável" required>
    </div>
    <div class="col-md-6">
        <label for="email" class="form-label">Email:</label>
        <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}"
            placeholder="Digite o email do responsável" required>
    </div>
    <div class="col-md-6">
        <label for="nome_evento" class="form-label">Nome do evento:</label>
        <input type="text" class="form-control" id="nome_evento" name="nome_evento" value="{{ old('nome_evento') }}"
            placeholder="Digite o nome do evento" required>
    </div>
    <div class="col-md-6">

        <label for="local" class="form-label">Local:</label>
        <select id="local" name="local" class="form-select">
            <option value="">Defina um local:</option>
            @foreach ($local as $key => $local)
                <option value="{{ $key }}" {{ old('local') == $key ? 'selected' : '' }}>{{ $local }}
                </option>
            @endforeach
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
        <textarea class="form-control" id="descricao" name="descricao" value="{{ old('descricao') }}"
            placeholder="Faça uma breve descrição sobre o evento"></textarea>
    </div>
    <div class="col-md-6">
        <div class="col-sm-2"></div>
        <div class="col-sm-6">
            <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </div>
</form>

<pre>
 {{ print_r($errors) }}
</pre>
