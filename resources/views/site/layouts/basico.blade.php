<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS do Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('assets/css/estilo_basico.css')}}">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('titulo')</title>

</head>

<body>
    @include('site.layouts._partials.topo')
    @yield('conteudo')
    @include('site.layouts._partials.rodape')
</body>
</html>
