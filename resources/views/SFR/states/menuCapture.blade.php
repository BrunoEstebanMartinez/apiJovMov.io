@extends('SFR.canvas')
    
    
        @section('navbar')
            @include('SFR.navbars.navbarCapt')
        @endsection

        @section('sidebar')
            @include('SFR.sidebars.sidebarCapt')
        @endsection

        @section('scripts')
        <script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>   
        @endsection 