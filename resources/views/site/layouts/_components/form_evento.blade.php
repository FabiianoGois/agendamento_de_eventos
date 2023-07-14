{{ $slot }}
<form action="{{ route('evento.store') }}" method="POST">
    @csrf
    <div class="col-md-6">
        <label for="responsavel" class="form-label">Responsável:</label>
        <input type="text" class="form-control" id="responsavel" name="responsavel" value="{{ old('responsavel') }}"
            placeholder="Digite o nome do responsável" required>
        {{ $errors->has('responsavel') ? $errors->first('responsavel') : '' }}
    </div>
    <div class="col-md-6">
        <label for="email" class="form-label">Email:</label>
        <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}"
            placeholder="Digite o email do responsável" required>
        {{ $errors->has('email') ? $errors->first('email') : '' }}
    </div>
    <div class="col-md-6">
        <label for="nome_evento" class="form-label">Nome do evento:</label>
        <input type="text" class="form-control" id="nome_evento" name="nome_evento" value="{{ old('nome_evento') }}"
            placeholder="Digite o nome do evento" required>
        {{ $errors->has('nome_evento') ? $errors->first('nome_evento') : '' }}
    </div>
    <div class="col-md-6">

        <label for="local_eventos_id" class="form-label">Local:</label>
        <select id="local_eventos_id" name="local_eventos_id" class="form-select">
            <option value="">Defina um local:</option>
            @foreach ($local as $key => $local)
                <option value="{{ $local->id }}" {{ old('local_eventos_id') == $local->id ? 'selected' : '' }}>
                    {{ $local->local }}
                </option>
            @endforeach
        </select>
        {{ $errors->has('local_eventos_id') ? $errors->first('local_eventos_id') : '' }}
    </div>
    <div class="col-md-6">
        <label for="data" class="form-label">Data:</label>
        <input type="date" class="form-control" id="data" name="data" required>
        {{ $errors->has('data') ? $errors->first('data') : '' }}
    </div>
    <div class="col-md-6">
        <label for="inicio" class="form-label">Horário de início:</label>
        <input type="time" class="form-control" id="inicio" name="inicio"required>
        {{ $errors->has('inicio') ? $errors->first('inicio') : '' }}
    </div>
    <div class="col-md-6">
        <label for="fim" class="form-label">Horário de término:</label>
        <input type="time" class="form-control" id="fim" name="fim" required>
        {{ $errors->has('fim') ? $errors->first('fim') : '' }}
    </div>
    <div class="col-md-6">
        <label for="descricao" class="form-label">Descrição:</label>
        <textarea class="form-control" id="descricao" name="descricao" value="{{ old('descricao') }}"
            placeholder="Faça uma breve descrição sobre o evento"></textarea>
        {{ $errors->has('descricao') ? $errors->first('descricao') : '' }}
    </div>
    <div class="col-md-6">
        <div class="col-sm-2"></div>
        <div class="col-sm-6">
            <button type="submit" class="btn btn-primary mb-3 mt-3">Enviar</button>
        </div>
    </div>
</form>

<!--
<pre>
  print_r($errors)
</pre>

-->
