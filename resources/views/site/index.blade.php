<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
    <title>Layout Bootstrap</title>
    <!-- CSS do Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth'
            });
            calendar.render();
        });
    </script>

</head>

<body>
    <!-- Barra de Menu -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">Logo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Item 1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Item 2</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Item 3</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Conteúdo Centralizado -->
    <div class="container text-center mt-5">
        <div id='calendar'></div>
        <button type="button" class="btn btn-primary"><a href="{{ route('evento.index') }}">Primary</button>
    </div>


    <!-- Rodapé -->
    <footer class="bg-primary text-white text-center py-3">
        <div class="container">
            &copy; 2023 Crea - DF. Todos os direitos reservados.
        </div>
    </footer>

    <!-- Scripts do Bootstrap (opcional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
