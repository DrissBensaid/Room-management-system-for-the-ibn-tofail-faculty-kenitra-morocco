@extends('layouts.body')

@section('logotitle')
    Admin
@endsection

@section('list')
    <div style="min-height:90vh; background-color:rgb(40, 57, 101);" class="w-25 h-100 ">
        <ul class="list-group w-100">
            <a href='{{route('admin.users.index')}}'   style="background-color:rgba(40,57,101,.9)"class="list-group-item  d-flex justify-content-between align-items-center text-light @yield('activeHome')">
                PROFESSEURS
            <span class="badge bg-dark rounded-pill"></span>
            </a>
            <a href=''  style="background-color:rgba(40,57,101,.9)"class="list-group-item  d-flex justify-content-between align-items-center text-light @yield('activeSalles')">
                SALLES
                <span class="badge bg-dark rounded-pill"></span>
            </a>
            <a href='{{route('admin.contact.index')}}'  style="background-color:rgba(40,57,101,.9)"class="list-group-item  d-flex justify-content-between align-items-center text-light @yield('activeContacts')">
                DEMANDES_SALLES
                <span class="badge bg-dark rounded-pill"></span>
            </a>
            <a href='{{route("admin.salles_reservation.index")}}' style="background-color:rgba(40,57,101,.9)" class="list-group-item  d-flex justify-content-between align-items-center text-light @yield('activeContact')">
                RESERVER_SALLE
                <span class="badge bg-dark rounded-pill"></span>
            </a>
            <a href='{{route("admin.contact.messages")}}' style="background-color:rgba(40,57,101,.9)" class="list-group-item  d-flex justify-content-between align-items-center text-light @yield('active_messages')">
                MESSAGES
               
            </a>
        </ul>
    </div>
@endsection


@section('content')
    <div class="w-100">
    </div>
@endsection