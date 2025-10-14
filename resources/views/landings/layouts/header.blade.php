<header>
  <nav class="navbar navbar-b navbar-dark navbar-trans navbar-expand-xl fixed-top nav-padding" id="sidebar-menu">
    <img class="img-fluid mt-3" src="{{ asset('storage/logos/logo_dark.png') }}" width="250" alt="logo">
    <div class="navbar-collapse justify-content-center collapse hidenav" id="navbarDefault">
      <ul class="navbar-nav navbar_nav_modify" id="scroll-spy">
        {{-- <li class="nav-item"><a class="nav-link" href="#">Buscar Curso</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Verificar Certificado</a></li> --}}
      </ul>
    </div>
    <div class="buy-btn hide-mobile">
      <a href="{{ route('login') }}" class="nav-link js-scroll" target="_blank">
        Iniciar Sesión
        <i class="fa fa-sign-in"></i>
      </a>
    </div>
  </nav>
</header>
