    <div class="topo">
        <!-- Barra de Menu -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary ">
            <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" width="190" height="50">
            <div class="container">
                <a class="navbar-brand" href="/">Início</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('evento.index') }}">Cadastrar evento</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
