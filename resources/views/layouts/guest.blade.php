<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="{{ route('welcome') }}">Mi Sistema</a>
  <div class="collapse navbar-collapse">
    <ul class="navbar-nav mr-auto">
      @auth
        <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('ingresos.index') }}">Ingresos</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('reportes.index') }}">Reportes</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('profile.edit') }}">Perfil</a></li>
      @endauth
    </ul>
    @auth
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="btn btn-danger">Salir</button>
      </form>
    @endauth
  </div>
</nav>
