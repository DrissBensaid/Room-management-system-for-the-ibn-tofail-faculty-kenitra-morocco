@extends('layouts.body')

@section('logotitle')
    {{$user->nom.' '.$user->prenom}}
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
    <div class="container w-100 d-flex flex-column  align-items-center" style="max-height:85vh; overflow:auto;">
            @if(session('success'))
            <div class="alert alert-success w-100 mt-2">
                <ul>
                        <li style="text-align: center; list-style-type:none">{{ session('success') }}</li>
                </ul>
            </div>
            @endif
            @if(session('danger'))
            <div class="alert alert-danger w-100 mt-2">
                <ul>
                        <li style="text-align: center; list-style-type:none">{{ session('danger') }}</li>
                </ul>
            </div>
            @endif
        
        <h1 style="width:100%; text-align: center; color:rgba(40, 58, 102, 0.788); margin-top:4px;">RESERVATION</h1>
        <form class="w-50  d-flex flex-column  align-items-center"  action="{{route('admin.reservation_admin.store')}}" method="POST">
            @csrf
            <div class="form-group w-100 mb-1">
                <input type="hidden" name='id' value={{$id}} >
              <label style="color:rgba(40,57,101,.9)" >NOM : </label>
              <input  style="border:solid 0.5px rgba(40,57,101,.9)"  type="text" name='nom' class="form-control rounded-0 h-75"   placeholder="Enter votre nom ... ">
            </div>
            @error('nom')
                <div class="alert alert-danger w-100 ">{{ $message }}</div>
            @enderror
            <div class="form-group w-100 mb-1 mt-2">
              <label style="color:rgba(40,57,101,.9)" >PRENOM : </label>
              <input  style="border:solid 0.5px rgba(40,57,101,.9)"  type="text" name='prenom' class="form-control rounded-0 h-75"   placeholder="Enter votre prenom ... ">
            </div>
            @error('prenom')
                <div class="alert alert-danger w-100 pt-1">{{ $message }}</div>
            @enderror
            <div class="form-group w-100 mb-1 mt-2">
              <label style="color:rgba(40,57,101,.9)" >DATE_RESERVATION : </label>
              <input  style="border:solid 0.5px rgba(40,57,101,.9)"  type="date" name='date_reservation' class="form-control rounded-0 h-75"   placeholder="Enter votre date de reservation ... ">
            </div>
            @error('date_reservation')
                <div class="alert alert-danger w-100 mt-1">{{ $message }}</div>
            @enderror

            <div class="form-group w-100 mb-1 mt-2">
              <label style="color:rgba(40,57,101,.9)" >DUREE_PAR_HEURE : </label>
              <input  style="border:solid 0.5px rgba(40,57,101,.9)"  type="number" name='duree_par_heur' class="form-control rounded-0 h-75"   placeholder="Enter votre duree par heure ... ">
            </div>
            @error('duree_par_heur')
                <div class="alert alert-danger w-100 mt-1">{{ $message }}</div>
            @enderror

            <div class="form-group w-100 mb-1 mt-2">
                <label style="color:rgba(40,57,101,.9)" for="exampleInputEmail1">HEURE_DEBUT : </label>
                <input  style="border:solid 0.5px rgba(40,57,101,.9)"  type="time" min="08:00" style="border:solid 0.5px rgba(40,57,101,.9)" name='heur_debut' class="form-control rounded-0 h-75 "   placeholder="Enter votre heur_debut ... ">
              </div>
              @error('heur_debut')
                <div class="alert alert-danger w-100 mt-1">{{ $message }}</div>
              @enderror

              <div class="form-group w-100 mb-1 mt-2">
                <label style="color:rgba(40,57,101,.9)" for="exampleInputEmail1">HEURE_FIN : </label>
                <input  style="border:solid 0.5px rgba(40,57,101,.9)"  type="time"  max="18:00" name='heur_fin' class="h-75 form-control rounded-0"   placeholder="Enter votre heur_fin... ">
              </div>
              @error('heur_fin')
                <div class="alert alert-danger w-100 mt-2">{{ $message }}</div>
            @enderror

            
            <button type="submit" class="btn text-light w-50 mt-2 rounded-0 h-75 pt-2 mt-2 w-100" style="background-color:#fd5234;">Réserver</button>
        </form>
    </div>
@endsection