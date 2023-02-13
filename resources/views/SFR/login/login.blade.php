@extends('SFR.canvas')

    @section('canvas')

      <div style = "background-color: #F0F0F0;
                                        position: absolute;
                                        width: 100%;
                                        height: 100%;">

                        <div style = "position: relative;
                                      width: 100%;
                                      height: 50%;">
                        
                              <div class = "images w3-animate-fading" style = "
                                            width: 100%;
                                            height: 100%;
                                            overflow: hidden;
                                            background-image:
                                            linear-gradient(to bottom, rgba(0,0,36,0.67), rgba(28,20,39,0.4514180672268907)),
                                            url('{{ asset('images/image1.jpg') }}');
                                            background-size: cover;"></div>
                              
                              <div class = "images w3-animate-fading" style = "
                                            width: 100%;
                                            height: 100%;
                                            overflow: hidden;
                                            background-image:
                                            linear-gradient(to bottom, rgba(0,0,36,0.67), rgba(28,20,39,0.4514180672268907)),
                                            url('{{ asset('images/image2.jpg') }}');
                                            background-size: cover;"></div>
                              
                              <div class = "images w3-animate-fading" style = "
                                            width: 100%;
                                            height: 100%;
                                            overflow: hidden;
                                            background-image:
                                            linear-gradient(to bottom, rgba(0,0,36,0.67), rgba(28,20,39,0.4514180672268907)),
                                            url('{{ asset('images/image3.jpg') }}');
                                            background-size: cover;"></div>

                              <div class = "images w3-animate-fading" style = "
                                            width: 100%;
                                            height: 100%;
                                            overflow: hidden;
                                            background-image:
                                            linear-gradient(to bottom, rgba(0,0,36,0.67), rgba(28,20,39,0.4514180672268907)),
                                            url('{{ asset('images/image4.jpeg') }}');
                                            background-size: cover;"></div>
                        </div>
                        
              <div style = "position: absolute;
                            background-color: #FFE35C;
                            width: 100%;
                            height: 80%;
                            top: 10%;
                            display: flex;
                            justify-content: center;
                            visibility: hidden;">

                    <div class = "shadow-lg p-3 mb-5 bg-body rounded" style = "position: relative;
                                  background-color: #FFFFFF;
                                  width: 40%;
                                  height: 100%;
                                  visibility: visible;
                                  ">

                    <div style = "position: relative;
                                 
                                 width: 100%;
                                 height: 20%;
                                 display:inline-flex">
                                  
                                  <div style = "position: relative;
                                 
                                 width: 50%;
                                 height: 100%;
                                 display: flex;
                                justify-content: left;"><img src = "{{ asset('images/mexico.png') }}" height = "75px" width = "30%"></div>

                                <div style = "position: relative;
                                 
                                 width: 50%;
                                 height: 100%;
                                 display: flex;
                                justify-content: right;"><img src = "{{ asset('images/edomex.png') }}" height = "50px" width = "35%"></div>
                                       
                    </div>

                    <div style = "position:relative; 
                                  width: 100%;
                                  height: 9%;
                                  display: flex;
                                justify-content: center;">
                    <p class="h5">Secretería del Campo</p>

                    </div>

                    <div style = "position:relative;
                                  width: 100%;
                                  height: 5%;
                                  display: flex;
                                justify-content: center;">
                    <p class="lead" style = "font-size: 15px;">
                      Iniciar sesión
                    </p>

                    </div>

                    <div style = "position:relative;
                                  width: 100%;
                                  height: 70%;
                                  padding: 4em;">

                    <form action = "{{  route('validate') }} " method = "POST">
                      @csrf
                            <div class="mb-3">
                              <label class="form-label">Correo electrónico</label>
                              <input type="text" id = "correoFUR" name = "correoFUR" class="form-control">
                            </div>

                            <div class="mb-3">
                              <label class="form-label">Contraseña</label>
                              <input type="password" id = "passwordFUR" name = "passwordFUR" class="form-control">
                            </div>

                            <div class = "mb-3 d-grid gap-2">
                            <button type="submit" class="btn btn-outline-success">Entrar</button>
                            </div>
                    </form>
                    
                    @if(count($errors) > 0)
                      <div class="alert alert-danger" role="alert">
                        <ul>
                          @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                          @endforeach
                        </ul>
                      </div>
                    @endif


                    </div>          
              </div>
          </div>
      </div>

      <script type = "text/javascript" src = "{{ asset('js/slideshow.js') }}"></script>
     
    @endsection
    
    
