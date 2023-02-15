<!DOCTYPE html>
<html lang="en">
   @include('SFR.header') 
<body>

            <div style = "position: absolute; 
                            width: 100%;
                            height: 100%;
                            background-color: #F0F0F0;">
            
            <div style = "position:relative;
                            height: 10%;
                            width: 100%;
                            padding-top: 6px;
                            padding-left: 1em;
                            padding-right: 1em;">

               <nav class="navbar bg-white rounded-pill" aria-label="Light offcanvas navbar">
                    <div class="container-fluid" >
                    <a class="navbar-brand" href="#">
                        <img src="{{ asset('images/edomex.png') }}" alt="" width="40" height="24" class="d-inline-block align-text-top">
                        SECAMPO
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbarLight" aria-controls="offcanvasNavbarLight">
                        <span><i class="fa-solid fa-bars"></i></span>
                    </button>
                    <div class="offcanvas offcanvas-end rounded-3" tabindex="-1" id="offcanvasNavbarLight" aria-labelledby="offcanvasNavbarLightLabel">
                        <div class="offcanvas-header">
                        <h5 class="offcanvas-title" >{{ $logon }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            @switch($cve_usuario)
                                @case('CA')
                                   <li class = "nav-item"><p class = "lead">General</p></li>
                                @break

                                @case('EJ')
                                    <li class = "nav-item"><p class = "lead">Ejecutivo</p></li>
                                @break

                                @case('AD')
                                <li class = "nav-item"><p class = "lead">Administrador</p></li>
                                @break

                                @case('SA')
                                <li class = "nav-item"><p class = "lead">Superadministrador</p></li>
                                @break
                            @endswitch
                            <li class="nav-item">
                            <a href="#">Salir</a>
                            </li>
                        </ul>
                        </div>
                    </div>
                    </div>
                </nav>
            </div>
                
        
        <div style = "position: relative;
                        height:90%;
                        width:100%;
                        display: inline-flex;
                        padding: 1em;">

                       

            <div class="" style="
                                                                position: relative;
                                                                width: 20%;
                                                                height: 100%;
                                                                background-color: #F0F0F0;
                                                                padding-right: 1em;"
                                                                >
                    <ul class="bg-white rounded-3 shadow-lg list-unstyled" style="
                                                                position: relative;
                                                                width: 100%;
                                                                height: 100%;
                                                                padding: 1em;
                                                                ">
                        @switch($cve_usuario)
                            @case('SA')
                            <li class="mb-1">
                                    <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
                                        Backoffice
                                    </button>
                                    <div class="collapse show" id="home-collapse">
                                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                        <li><a href="{{ route('verHistorico') }}" class="link-dark d-inline-flex text-decoration-none rounded">Usuarios</a></li>
                                        <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Catálogos</a></li>
                                    </ul>
                                    </div>
                                </li>
                                <li class="mb-1">
                                    <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
                                        Gestión interna
                                    </button>
                                    <div class="collapse show" id="home-collapse">
                                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                        <li><a href="{{ route('verHistorico') }}" class="link-dark d-inline-flex text-decoration-none rounded">Dashboard</a></li>
                                        <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Programas</a></li>
                                        <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Reportes</a></li>
                                    </ul>
                                    </div>
                                </li>
                                <li class="mb-1">
                                    <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
                                        Captura
                                    </button>
                                    <div class="collapse show" id="home-collapse">
                                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                        <li><a href="{{ route('verHistorico') }}" class="link-dark d-inline-flex text-decoration-none rounded">Beneficiarios</a></li>
                                        <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Seguimiento</a></li>
                                    </ul>
                                    </div>
                            </li>
                            @break

                            @case('AD')


                            <li class="mb-1">
                                    <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
                                        Gestión interna
                                    </button>
                                    <div class="collapse show" id="home-collapse">
                                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                        <li><a href="{{ route('verHistorico') }}" class="link-dark d-inline-flex text-decoration-none rounded">Dashboard</a></li>
                                        <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Programas</a></li>
                                        <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Reportes</a></li>
                                    </ul>
                                    </div>
                                </li>
                                <li class="mb-1">
                                    <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
                                        Captura
                                    </button>
                                    <div class="collapse show" id="home-collapse">
                                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                        <li><a href="{{ route('verHistorico') }}" class="link-dark d-inline-flex text-decoration-none rounded">Beneficiarios</a></li>
                                        <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Seguimiento</a></li>
                                    </ul>
                                    </div>
                            </li>


                            @break

                            @case('EJ')

                            <li class="mb-1">
                                    <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
                                        Gestión interna
                                    </button>
                                    <div class="collapse show" id="home-collapse">
                                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                        <li><a href="{{ route('verHistorico') }}" class="link-dark d-inline-flex text-decoration-none rounded">Dashboard</a></li>
                                        <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Programas</a></li>
                                        <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Reportes</a></li>
                                    </ul>
                                    </div>
                                </li>
                                <li class="mb-1">
                                    <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
                                        Captura
                                    </button>
                                    <div class="collapse show" id="home-collapse">
                                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                        <li><a href="{{ route('verHistorico') }}" class="link-dark d-inline-flex text-decoration-none rounded">Beneficiarios</a></li>
                                        <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Seguimiento</a></li>
                                    </ul>
                                    </div>
                                </li>

                            @break

                            @case('CA')
                            <li class="mb-1">
                                    <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
                                        Captura
                                    </button>
                                    <div class="collapse show" id="home-collapse">
                                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                        <li><a href="{{ route('verHistorico') }}" class="link-dark d-inline-flex text-decoration-none rounded">Beneficiarios</a></li>
                
                                    </ul>
                                    </div>
                                </li>
                            @break

                         @endswitch
                    
                    <li class="border-top my-3"></li>
                    </ul>
                </div>

                <div class = "rounded-3" style = "position: relative;
                                width: 80%;
                                height: 100%;
                                background-color: white;">
                <div style = "position: absolute;
                                width: 100%;
                                height: 100%;
                                padding: 1em;
                                 ">
                        @yield('canvas')
                    </div>
                        
            </div>
        </div>
                
</body>
                @yield('javascript')
</html>