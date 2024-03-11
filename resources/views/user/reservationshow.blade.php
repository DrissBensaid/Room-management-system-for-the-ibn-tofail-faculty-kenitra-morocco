@extends('layouts.body')

@section('logotitle')
    {{$user->nom.' '.$user->prenom}}
@endsection


@section('activeSalles')
    active
@endsection


@section('list')
    <div style="min-height: 90vh; background-color:rgb(40, 57, 101);" class="w-25 ">
        <ul class="list-group w-100">
            <ul class="list-group w-100">
                <a href='{{route("user.home")}}' style="background-color:rgba(40,57,101,.9)"  class="list-group-item  d-flex justify-content-between align-items-center text-light @yield('activeHome')">
                HOME
                <span class="badge bg-dark rounded-pill"></span>
                </a>
                <a href='{{route("user.profile.index")}}' style="background-color:rgba(40,57,101,.9)" class="list-group-item  d-flex justify-content-between align-items-center text-light @yield('activeProfil')">
                PROFIL
                <span class="badge bg-dark rounded-pill"></span>
                </a>
                <a href='{{route("user.salles.index")}}' style="background-color:rgba(40,57,101,.9)" class="list-group-item  d-flex justify-content-between align-items-center text-light @yield('activeSalles')">
                    SALLES
                    <span class="badge bg-dark rounded-pill"></span>
                </a>
                <a href='{{route("user.contact.show")}}' style="background-color:rgba(40,57,101,.9)" class="list-group-item  d-flex justify-content-between align-items-center text-light @yield('CONTACT_ADMINISTRATEUR')">
                    CONTACT_ADMINISTRATEUR
                    <span class="badge bg-dark rounded-pill"></span>
                </a>
            </ul>
    </div>
@endsection


@section('content')
    <div class="container w-100" >
        <div>
            <br>
            <br>
            <h1 style="width:100%; text-align: center; color:rgba(40, 58, 102, 0.788);">TOUT_LES_RESERVATION</h1>
            <br>
            <div class="table">
                
                <div class="table-header">
                    <div class="header__item"><a id="name" class="filter__link" href="#">Nom</a></div>
                    <div class="header__item"><a id="name" class="filter__link" href="#">Prenom</a></div>
                    <div class="header__item"><a id="wins" class="filter__link filter__link--number" href="#">Date_reservation</a></div>
                    <div class="header__item"><a id="draws" class="filter__link filter__link--number" href="#">Durée_par_heur</a></div>
                    <div class="header__item"><a id="losses" class="filter__link filter__link--number" href="#">Heure_debut</a></div>
                    <div class="header__item"><a id="total" class="filter__link filter__link--number" href="#">Heure_fin</a></div>
                </div>
               
                <div class="table-content">	
                    @foreach ($reservations as $reservation)
                        <div class="table-row">		
                            <div class="table-data">{{$reservation->nom}}</div>
                            <div class="table-data">{{$reservation->prenom}}</div>
                            <div class="table-data">{{$reservation->date_reservation}}</div>
                            <div class="table-data">{{$reservation->duree_par_heur}} H</div>
                            <div class="table-data">{{$reservation->heur_debut}}</div>
                            <div class="table-data">{{$reservation->heur_fin}}</div>
                        </div>
                    @endforeach
                </div>              
            </div>
            <div class="d-flex justify-content-center">
                {{-- {{ $reservations->links() }} --}}
            </div>
                <div>
                    <a href="{{route('user.reservation.creat', ['id'=>$id])}}" class="btn text-light rounded-0" style="background-color:#fd5234;">Reserver cette Salle</a>
                </div>
            </div>
    </div>
@endsection