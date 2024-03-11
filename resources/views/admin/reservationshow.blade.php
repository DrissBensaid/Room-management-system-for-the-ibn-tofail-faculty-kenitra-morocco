@extends('layouts.body')

@section('logotitle')
    Admin
@endsection


@section('active_RESERVER_SALLE')
    active
@endsection


@section('list')
    <div style="min-height:90vh; background-color:rgb(40, 57, 101);" class="w-25 ">
        <ul class="list-group w-100">
            <a href='{{route('admin.users.index')}}'   style="background-color:rgba(40,57,101,.9)" class="list-group-item  d-flex justify-content-between align-items-center text-light @yield('activeHome')">
                PROFESSEURS
                <span class="badge bg-dark rounded-pill"></span>
                </a>
            <a href='{{route('admin.salles.index')}}'  style="background-color:rgba(40,57,101,.9)" class="list-group-item  d-flex justify-content-between align-items-center text-light @yield('activeSalles')">
                SALLES
                <span class="badge bg-dark rounded-pill"></span>
            </a>
            <a href='{{route('admin.contact.index')}}'  style="background-color:rgba(40,57,101,.9)" class="list-group-item  d-flex justify-content-between align-items-center text-light @yield('activeContacts')">
                DEMANDES_SALLES
                <span class="badge bg-dark rounded-pill"></span>
            </a>
            <a href='{{route("admin.salles_reservation.index")}}' style="background-color:rgba(40,57,101,.9)" class="list-group-item  d-flex justify-content-between align-items-center text-light @yield('active_RESERVER_SALLE')">
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
                    {{ $reservations->links() }}
                </div>
                <br>
                <div>
                    <a href="{{route('admin.reservation_admin.create', ['id'=>$id])}}" class="btn text-light rounded-0" style="background-color:#fd5234;">Reserver la Salle</a>
                </div>
            </div>
    </div>
@endsection