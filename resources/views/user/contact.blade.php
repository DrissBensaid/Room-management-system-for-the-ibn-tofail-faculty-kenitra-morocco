@extends('layouts.body')

@section('CONTACT_ADMINISTRATEUR')
    active
@endsection

@section('logotitle')
        {{$user->nom.' '.$user->prenom}}
@endsection

@section('list')
    <div style="min-height: 90vh; background-color:rgb(40, 57, 101);" class="w-25 " >
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
    <div class="container w-100 d-flex flex-column  align-items-center" style="max-height:80vh; overflow:auto;">
        @if(session('success'))
            <div class="alert alert-success w-100 mt-2">
                <ul>
                        <li style="text-align: center; list-style-type:none">{{ session('success') }}</li>
                </ul>
            </div>
            @endif
        <br><br>
        <h1 style="width:100%; text-align: center; color:rgba(40, 58, 102, 0.788); margin-top:4px;" >ENVOYER_E-MAIL</h1>
        <br>
        <form class="w-50  d-flex flex-column  align-items-center" method="POST" action="{{ route('user.contact.submit') }}">
            @csrf
        
            <div class="form-group w-100 mt-3">
                <label for="name" style="color:rgba(40,57,101,.9); max-height:50px;" >NOM: </label>
                <input type="text" style="border:solid 0.5px rgba(40,57,101,.9);max-height:50px;" name="name" id="name" class="form-control rounded-0 h-75" placeholder="écrire votre nom ..." value="{{ old('name') }}" >
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        
            <div class="form-group w-100 mt-3">
                <label for="email" style="color:rgba(40,57,101,.9)" >E-MAIL : </label>
                <input type="email" style="border:solid 0.5px rgba(40,57,101,.9);max-height:50px;" name="email" id="email" class="form-control rounded-0 h-75" placeholder="écrire votre email..." value="{{ old('email') }}" >
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        
            <div class="form-group w-100 mt-3">
                <label for="message" style="color:rgba(40,57,101,.9)" >MESSAGE : </label>
                <textarea name="message" style="border:solid 0.5px rgba(40,57,101,.9);max-height:100px;" id="message" class="form-control rounded-0 h-100" placeholder="écrire un Message ..." >{{ old('message') }}</textarea>
                @error('message')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group w-100 mt-4">  
                <button type="submit" class="btn text-light mt-2 rounded-0 w-100" class="btn text-light" style="background-color:#fd5234;" >Send</button>
            </div>
        </form>
    </div>
@endsection