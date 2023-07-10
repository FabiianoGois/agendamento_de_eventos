@extends('site.layouts.basico')

@section('titulo', 'Cadastro de Eventos')

@section('conteudo')

    <div class="container mt-5 ">
        @if ($errors->has('conflito'))
            <div class="alert alert-danger mt-3">
                {{ $errors->first('conflito') }}
            </div>
        @endif
        @component('site.layouts._components.form_evento',['local' => $local])
            <!-- Caso queira inserir alguma mensagem pra aparecer acima do form -->
        @endcomponent
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
