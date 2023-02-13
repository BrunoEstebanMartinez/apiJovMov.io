@extends('SFR.stateDasher')

    @section('canvas')

    <div style = "position: relative;
                width: 100%;
                height: 100%;
                display: inline-flex;">

        <div class = "" style = "position:relative;
                        width: 100%;
                        height: 100%;
                        display: inline-flex;">

                        <div class = "border border-info" style = "position:relative;
                        width: 10%;
                        height: 100%;">
                        <div style = "position: relative; 
                                        width: 100%;
                                        height: 33.33%;">

                                <div style = "position: relative; 
                                                width: 100%;
                                                height: 20%;
                                              
                                                top: 40%;
                                                display: flex;
                                                justify-content: center;
                                                ">
                                <a href = "#personalData" role = "button" class = "btn btn-outline-info rounded-circle" style = "
                                                                                        width: 32px;
                                                                                        height: 32px;
                                                                                        display: flex;
                                                                                        justify-content: center;
                                                                                        padding: 0.5em;"><i class="fa-solid fa-1"></i></a>
                                </div>


                        </div>

                        <div style = "position: relative; 
                                        width: 100%;
                                        height: 33.33%;
                                      
                                    
                                        ">

                                <div  style = "position: relative; 
                                                width: 100%;
                                                height: 20%;
                                                
                                                top: 40%;
                                                display: flex;
                                                justify-content: center;
                                                ">
                                                <a href = "#personalDirection" role = "button" class = "btn btn-outline-info rounded-circle" style = "
                                                                                        width: 32px;
                                                                                        height: 32px;
                                                                                        display: flex;
                                                                                        justify-content: center;
                                                                                        padding: 0.5em;"><i class="fa-solid fa-2"></i></a>
                                        
                                </div>


                        </div>

                        <div style = "position: relative; 
                                        width: 100%;
                                        height: 33.33%;
                                
                                        vertical-align: middle;
                                        ">

                                                <div style = "position: relative; 
                                                width: 100%;
                                                height: 20%;
                                                top: 40%;
                                                display: flex;
                                                justify-content: center;
                                                ">
                                                <a href = "#photosBenef" role = "button" class = "btn btn-outline-info rounded-circle" style = "
                                                                                        width: 32px;
                                                                                        height: 32px;
                                                                                        display: flex;
                                                                                        justify-content: center;
                                                                                        padding: 0.5em;"><i class="fa-solid fa-3"></i></a> 
                                                </div>


                        </div>

                        
                        </div>

                        <div style = "position:relative;
                        width: 90%;
                        height: 100%;
                        scroll-behavior: smooth;
                        overflow: hidden;">

                                        <scroll-container>
                               
                                                <scroll-page  id = "personalData">
                                    <form action="{{ route('registro') }}" method = "POST" >
                                    @csrf
                                                        <div class = "border border-start-0 border-info" style = "position: relative;
                                                                        width: 100%;
                                                                        height: 10%;
                                                                        padding-left: 1em;"><h3>Datos personales</h3></div>
                                              
                                                        <div class = "" style = "position: relative;
                                                                        width: 100%;
                                                                        height: 90%;
                                                                        padding: 1em;">

                                                                        

                                                                        <div class = "row mb-3">

                                                                                <div class = "col">
                                                                                 
                                                                                                <label class="form-label">Apellido paterno</label>
                                                                                                <input type="text" class = "form-control" value = "" name = "primer_apellido" id = "primer_apellido">
                                                                                                @error('primer_apellido')
                                                                                                        <div class="alert alert-danger">Campo obligatorio</div>
                                                                                                @enderror 
                                                                                 
                                                                                </div>  

                                                                                <div class = "col">
                                                                                                <label class="form-label">Apellido materno</label>
                                                                                                <input type="text"  class = "form-control"  value = "" name = "segundo_apellido" id = "segundo_apellido" >

                                                                                </div>  
                                                                                
                                                                                <div class = "col">
                                                                                                <label class="form-label">Nombres</label>
                                                                                                <input type="text"  class = "form-control" value = "" name = "nombres" id = "nombres">

                                                                                </div> 
                                                                                

                                                                        </div>

                                                                        <div class = "row mb-3">

                                                                                <div class = "col">

                                                                                        <div class="input-group">
                                                                                                <span class="input-group-text">CURP</span>
                                                                                                <input type="text" class="form-control" value = "" name = "curp" id = "curp">
                                                                                        </div> 
                                                                                 </div>  
                                                                                        

                                                                        </div>

                                                                        <div class = "row mb-3">

                                                                                        <div class = "col">
                                                                                               
                                                                                                <label class="form-label">Fecha de nacimiento</label>
                                                                                                <input type="date" class = "form-control" value = "" name = "fecha_nacimiento" id = "fecha_nacimiento">
                                                                                                
                                                                                        </div> 

                                                                                        
                       
                                                                        </div>

                                                                   

                                                                        <div class = "row mb-3">

                                                                                <div class = "col">
                                                                                       
                                                                                                <label class="form-label">Genero</label>      
                                                                                        <div class="row mb-3">

                                                                                          
                                                                                                
                                                                                                        <div class = "col">

                                                                                                                 <div class="form-check">
                                                                                                                        <input class="form-check-input" type="radio" value = "H" name="genero" id="flexRadioDefault1" checked>
                                                                                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                                                                                        Masculino
                                                                                                                        </label>
                                                                                                                 </div>  
                                                                                                        </div>

                                                                                                        <div class="col">
                                                                                                                 <div class="form-check">
                                                                                                                        <input class="form-check-input" type="radio" value = "M" name="genero" id="flexRadioDefault2">
                                                                                                                        <label class="form-check-label" for="flexRadioDefault2">
                                                                                                                        Femenino
                                                                                                                        </label>
                                                                                                                </div>
                                                                                                        </div>
                     
                                                                                        </div>  
                                                                                                

                                                                                                           

                                                                                </div> 

                                                                                                    
                                                                        </div>

                                                                   

                                                                        <div class = "row mb-3">
                                                                                        <div class = "col">
                                                                                                
                                                                                                                <label class="form-label">Número telefónico</label>
                                                                                                                <input type="text"  class = "form-control" value = "" name = "numeroTel" id = "numeroTel">
                                                                                                                
                                                                                                 
                                                                                        </div>
                                                                                        <div class = "col">

                                                                                                                <label class="form-label">Correo electrónico</label>
                                                                                                                <input type="text"  class = "form-control" value = ""name = "correo_electron" id = "correo_electron">

                                                                                        </div>    
                                                                                        

                                                                        </div>

                                                                        

                                                                </div>

                                                </scroll-page>

                                                <scroll-page class = "mb-3" id = "personalDirection" >
                                                <div class = "border border-start-0 border-info" style = "position: relative;
                                                                        width: 100%;
                                                                        height: 10%;
                                                                        padding-left: 1em;"><h3>Datos domiciliarios</h3></div>

                                                <div class = "" style = "position: relative;
                                                                        width: 100%;
                                                                        height: 90%;
                                                                        padding: 1em;">

                                                                       

                                                                        

                                                                        <div class = "row mb-3">

                                                                                <div class = "col">

                                                                                        <div class="input-group">
                                                                                                <span class="input-group-text">Municipio</span>
                                                                                        <input class="form-control" value =  "" name = "municipio_desc" id = "municipio_desc" list = "municipio">      
                                                                                                <datalist id= "municipio">
                                                                                                        @if(is_array($getCvesInfo) || is_object($getCvesInfo))
                                                                                                        @foreach($getCvesInfo as $municipios)
                                                                                                        <option value="{{ $municipios ->  municipio}}">{{ $municipios -> municipio }}</option>
                                                                                                         @endforeach
                                                                                                        @endif
                                                                                                </datalist>
                                                                                        </div> 
                                                                                 </div>  

                                                                                
                                                                        </div>

                                                                        <div class = "row mb-3">

                                                                                        <div class = "col">
                                                                                                        <div class="input-group">
                                                                                                                <span class="input-group-text">Código postal</span>
                                                                                                                <input type="text"  value = "" class="form-control" name = "codigo_postal" id = "codigo_postal">
                                                                                                        </div> 
                                                                                        </div> 

                                                                                                
                                                                        </div>

                                                                        <div class = "row mb-3">

                                                                                        <div class = "col">
                                                                                               
                                                                                                <div class="input-group">
                                                                                                        <span class="input-group-text">Localidad</span>
                                                                                                        <input class="form-control" value = "" name = "loc_desc" id = "loc_desc" list = "localidad">      
                                                                                                        <datalist id= "localidad">
                                                                                                        @if(is_array($getCvesLoc) || is_object($getCvesLoc))
                                                                                                        @foreach($getCvesLoc as $localidades)
                                                                                                        <option value="{{ $localidades ->  nom_loc}}">{{ $municipios -> nom_loc }}</option>
                                                                                                         @endforeach
                                                                                                        @endif
                                                                                                </datalist>
                                                                                                </div> 
                                                                                                
                                                                                        </div> 

                                                                                        
                       
                                                                        </div>


                                                                        <div class = "row mb-3">
                                                                                        <div class = "col">
                                                                                                
                                                                                        <div class="input-group">
                                                                                                <span class="input-group-text">Calle</span>
                                                                                                <input type="text"  class="form-control" value = "" name = "calle" id = "calle">
                                                                                                <span class="input-group-text">Y</span>
                                                                                                <input type="text"  class="form-control" value = "" name = "entre_calle" id = "entre_calle">
                                                                                        </div>                    
                                                                                                 
                                                                                        </div>
                                                                                         
                                                                                        

                                                                         </div>

                                                                         <div class = "row mb-3">
                                                                                <div class = "col">
                                                                                                
                                                                                        <div class="input-group">
                                                                                                <span class="input-group-text">Manzana</span>
                                                                                                <input type="text"  class="form-control" value = "" name = "manzana" id = "manzana">
                                                                                                <span class="input-group-text">Lote</span>
                                                                                                <input type="text" class="form-control" value = "" name = "lote" id = "lote">
                                                                                        </div>                    
                                                                                                 
                                                                                </div>
                                                                                         
                                                                                
                                                                         </div>

                                                                         <div class = "row mb-3">
                                                                                <div class = "col">
                                                                                                
                                                                                        <div class="input-group">
                                                                                                <span class="input-group-text">Número exterior</span>
                                                                                                <input type="text" class="form-control" value = "" name = "no_exterior" id = "no_exterior">
                                                                                                <span class="input-group-text">Número interior</span>
                                                                                                <input type="text" class="form-control" value = "" name = "no_interior" id = "no_interior">
                                                                                        </div>                    
                                                                                                 
                                                                                </div>
                                                                                         
                                                                                
                                                                         </div>

                                                                         <div class = "row mb-3">
                                                                                <div class = "col">
                                                                                                
                                                                                        <div class="input-group">
                                                                                                <span class="input-group-text">Otra referencia</span>
                                                                                                <input type="text" class="form-control" value = "" name = "otr_referencia" id = "otr_referencia">
                                                                                                
                                                                                        </div>                    
                                                                                                 
                                                                                </div>
                                                                                               
                                                                         </div>
                                                                        
                                                                        </div>
                                                
                                                                        
                                                
                                        
                                                </scroll-page>
                                                <scroll-page id = "photosBenef">
                                                <div class = "border border-start-0 border-info" style = "position: relative;
                                                                        width: 100%;
                                                                        height: 10%;
                                                                        padding-left: 1em;"><h3>Documentos oficiales</h3></div>
                                                <div class = "" style = "position: relative;
                                                                        width: 100%;
                                                                        height: 90%;
                                                                        padding-left: 2em;
                                                                        padding-right: 2em;
                                                                        padding-bottom: 2em;">


                                                                <div class = "row mb-3">

                                                                                <div class = "col">
                                                                                <label class="mb-3" >Identificación oficial (Adverso)</label>
                                                                                        <input type="file" name = "cop_fot_iden_ad" class="form-control" value = "">
                                                                                        </div>
                                                                                  
                                                                                
                                                                                

                                                                </div>

                                                                <div class = "row mb-3">

                                                                                <div class = "col">
                                                                                <label class="mb-3">Identificación oficial (Reverso)</label>
                                                                                        <input type="file" name = "cop_fot_iden_rev" class="form-control" value = "">
                                                                                        
                                                                                        </div>
                                                                                  
                                                                                
                                                                                

                                                                </div>

                                                                <div class = "row mb-3">

                                                                                <div class = "col">
                                                                                <label class="mb-3">Comprobante domiciliario</label>
       
                                                                                        <input type="file" name = "cop_fot_comp" class="form-control" value = "">
                                                                                 </div>
                                                                                  
                                                                                
                                                                                

                                                                </div>

                                                                <div class = "row mb-3">

                                                                                <div class = "col">
                                                                               <label class="mb-3">CURP</label>
                           
                                                                                        <input type="file" name = "cop_fot_curp" class="form-control" value = "">
                                                                                                                                                     </div>
                                                                                  
                                                                                
                                                                                

                                                                </div>

                                                                <div class = "row mb-3">

                                                                                <div class = "col">
                                                                                        <label class="mb-3">FUR</label>
                                                                                        <input type="file" name = "cop_fot_fur" class="form-control" value = "">
                                                                                        
                                                                                </div>  
                                                                                
                                                                                

                                                                </div>

                                                                <div class = "row mb-3">
                                                                                
                                                                                <div class = "col d-flex justify-content-center">

                                                                                        <a href="" role = "button" class = "btn btn-outline-danger">Cancelar</a>

                                                                                </div>

                                                                                <div class = "col d-flex justify-content-center">
                                                                                   
                                                                                        <button type="submit" class = "btn btn-outline-success">Registrar</button>
                                                                                     
                                                                                </div>  
                                                                                
                                                                </div>

                                                                        
                                                                        
                                                                
                                                                </div>

</form>
                                                
                                        
                                                </scroll-page>
                                   
                                        </scroll-container>


                        </div>
        </div>

        




    </div>
          
    @endsection

    @section('javascript')

     @endsection