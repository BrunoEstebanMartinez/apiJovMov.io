
<nav class = "navbar navbar-light bg-light border-bottom">
          <a class="navbar-brand">
              <img src="{{ asset('latefon.png') }}" alt="" class="d-inline-block align-top" width = "30" height = "30">@yield('title')</a>
        <ul class = "navbar-nav mr-auto">
            <li class = "nav-item"><a href= "{{ route('feed') }}" class = "btn btn-light">@yield('user')</a></li>
        </ul>
        <ul class="navbar-nav mr-auto justify-content-center">
            <li class = "nav-item">
                <form action="" method = "post" class = "form-inline my-2 my-lg-0">
                    @csrf
                    <input type="search" class="form-control mr-sm-2" placeholder = "Post, Tag, Compañero, Grupos ...">              
                            <button type = "submit" class="btn btn-light my-2 my-sm-0">
                            <img src="{{ asset('search.png') }}">
                            </button>                            
                </form>  
            </li>
        </ul>
         <ul class="nav nav-pills justify-content-end">
             <li class="nav-item dropdown">
                 <a href="" class="nav-link dropdown-toggle" role = "button" data-toggle = "dropdown"></a>
                 <div class = "dropdown-menu">
                    <a href="" class = "dropdown-item">@yield('sectOne')</a>
                    <a href="" class="dropdown-item">@yield('sectTwo')</a>
                    <form action = "{{ route('logout') }}" method = "post">
                         @csrf
                        <button class= "dropdown-item" type = "submit">Cerrar sesión</button>
                    </form>
                         
                 </div>
             </li>
            <li class = "nav-item"><a href="" class = "btn btn-light" role = "button">TEAM LATE</a></li>
         </ul>
    </nav>