<nav class="navbar bg-light" style = "position: relative;"aria-label="Light offcanvas navbar">
    <div class="container-fluid" >
       <a class="navbar-brand" href="#">
        <img src="{{ asset('images/edomex.png') }}" alt="" width="40" height="24" class="d-inline-block align-text-top">
        SECAMPO
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbarLight" aria-controls="offcanvasNavbarLight">
        <span><i class="fa-solid fa-bars"></i></span>
      </button>
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbarLight" aria-labelledby="offcanvasNavbarLightLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" >{{ $logon }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            @if($cve_arbol == 'CA')
                <li class = "nav-item"><p class = "lead">General</p></li>
            @endif
            <li class="nav-item">
              <a href="#">Salir</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>



