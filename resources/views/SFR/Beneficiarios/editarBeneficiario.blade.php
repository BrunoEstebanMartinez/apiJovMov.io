@extends('SFR.canvas')

    @include('SFR.states.menuCapture')

    @section('canvas')

        <div class="p-4 sm:ml-64">
                <div class = "p-4 mt-14">
    
        <div 
            style = "position: relative;
                    width: 100%;
                    height: 70%;
                    background-color: #009EDA;
                    display: inline-flex;">

        <div style = "position: relative;
                    width:15%;
                    height:100%
                    background-color: #FFE35C">             
        </div>


        <div style = "position: relative;
                        width: 45%;
                        height: 100%;
                        background-color: #1D4ED8">
                        </div>


        <div style = "position: relative;
                        width: 40%;
                        height: 100%;
                        background-color: #1E1E1E" >
                        </div>


        </div>
                </div>
          
    @endsection