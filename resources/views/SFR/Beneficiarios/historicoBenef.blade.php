@extends('SFR.stateDasher')

    @section('canvas')
    <div style = "position: relative; 
                    height: 10%;
                    width: 100%;
                    padding-left: 1em;
                    padding-right: 1em;">

        <div class = "row ">
            <div class = "col">
                    <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Por nombre y/o curp..." aria-label="Por nombre y/o curp..." aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" type="button" disabled><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
            </div>

            <div class = "col">
                <button type = "button" class="btn btn-primary rounded-pill"><a href="{{ route('nuevo') }}" ><i class="fa-solid fa-plus"></i></a></button>
            </div>
        
        </div>
       
    </div>

    <div style = "position: relative;
                    height: 85%;
                    width: 100%;
                    padding: 1em;
                    overflow-y: scroll;
                    ">


                   

                        <table class="table table-striped">
                                <thead>
                                    <tr>
                                    <th scope="col">Periodo</th>
                                    <th scope="col">Folio</th>
                                    <th scope="col">Programa</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Entidad federativa</th>
                                    <th scope="col">Municipio</th>
                                    <th scope="col">Localidad</th>
                                    <th scope="col">Aprobado</th>
                                    <th scope="col"></th>
                                
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    @foreach($allDataBenef as $benefUnico)
                                    <th scope="row">{{Trim($benefUnico ->n_periodo)}}</th>
                                    <td>{{ $benefUnico -> folio }}</td>
                                    <td>{{ $benefUnico -> cve_programa }}</td>
                                    <td>{{ $benefUnico -> nombre_completo }}</td>
                                    <td>{{ $benefUnico -> desc_entidad_federativa }}</td>
                                    <td>{{ $benefUnico -> desc_municipio }}</td>
                                    <td>{{ $benefUnico -> desc_localidad }}</td>
                                    <td>{{ $benefUnico -> status_1 }}</td>
                                    <td>
                                        <div class = "row">
                                            <div class = "col">
                                                <button type = "button" class="btn btn-success rounded-pill"><a href="{{ route('editUnique', array($benefUnico->folio)) }}"><i class="fa-solid fa-pencil"></i></a></button>
                                            </div>
                                            <div class = "col">
                                                @if(!$cve_usuario == 'CA')
                                                    <button type = "button" class="btn btn-danger rounded-pill"><a href="{{ route('editUnique', array($benefUnico->folio)) }}" ></a><i class="fa-solid fa-pencil"></i></button>
                                                    @else
                                                    <button type = "button" class="btn btn-danger rounded-pill" disabled><a href="{{ route('editUnique', array($benefUnico->folio))}}" ></a><i class="fa-solid fa-trash"></i></button>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    @endforeach
                                    </tr>
                                </tbody>
                        </table>
                       
            
    </div>
    <div style = "position: relative; 
                    display: flex;
                    justify-content: center;
                    width:100%;
                    height: 5%;">
                    {!!  $allDataBenef -> appends(request()->input())->links() !!}
                    </div>
    @endsection

    @section('javascript')


    @endsection