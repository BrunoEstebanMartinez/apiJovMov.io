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


                    <div class="row row-cols-1 row-cols-md-3 g-4" style = "display: flex;
                    justify-content: center;">
                            @foreach($allDataBenef as $beneficiario)
                                    <div class="col">
                                    @if(!$beneficiario -> status_1 == '0')
                                    <div class="card border-success border-2" style="width: 18rem;">
                                        @else
                                    <div class="card border-danger border-3" style="width: 18rem;">
                                        @endif
                                            <div class="card-body">
                                                <h5 class="card-title" style = "font-weight: bold">Beneficiario</h5>
                                                <h6 class="card-title">{{ $beneficiario -> nombre_completo }}</h6>
                                                <h6 class="card-title">{{ $beneficiario -> curp }}</h6>
                                                @if(isset($beneficiario -> cop_fot_curp))
                                                <h6 class="card-title">Documentos: SI</h6>
                                                @else
                                                <h6 class="card-title">Documentos: NO</h6>
                                                @endif
                                            <div class = "row">
                                                
                                                <div class = "col d-flex justify-content-center">
                                                <button type = "button" class="btn btn-success rounded-pill"><a href="{{ route('editUnique', array($beneficiario->folio)) }}"><i class="fa-solid fa-pencil"></i></a></button>
                                                </div>
                                            
                                                <div class = "col d-flex justify-content-center">
                                                @if(!$cve_usuario == 'CA')
                                                    <button type = "button" class="btn btn-danger rounded-pill"><a href="{{ route('editUnique', array($beneficiario->folio)) }}" ></a><i class="fa-solid fa-pencil"></i></button>
                                                    @else
                                                    <button type = "button" class="btn btn-danger rounded-pill" disabled><a href="{{ route('editUnique', array($beneficiario->folio))}}" ></a><i class="fa-solid fa-trash"></i></button>

                                                    @endif
                                                </div>
                                            </div>
                                                
                                            </div>
                                            </div>
                                    </div>
                            @endforeach
                            
                        </div>
                       
            
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