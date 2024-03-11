@extends('layouts.body')

@section('logotitle')
    Admin
@endsection

@section('active_messages')
    active
@endsection



@section('list')
    <div style="min-height:90vh; background-color:rgb(40, 57, 101);" class="w-25">
        <ul class="list-group w-100">
            <a href='{{route('admin.users.index')}}'  style="background-color:rgba(40,57,101,.9)" class="list-group-item  d-flex justify-content-between align-items-center text-light @yield('activeHome')">
                PROFESSEURS
                </a>
            <a href='{{route('admin.salles.index')}}' style="background-color:rgba(40,57,101,.9)" class="list-group-item  d-flex justify-content-between align-items-center text-light @yield('activeSalles')">
                SALLES
            </a>
            <a href='{{route('admin.contact.index')}}'  style="background-color:rgba(40,57,101,.9)" class="list-group-item  d-flex justify-content-between align-items-center text-light @yield('DEMANDES_RESERVATION_SALLES')">
                DEMANDES_SALLES
                @if($count)
                    <span class="badge rounded-pill" style="background-color:#fd5234;">{{$count}}</span>
                @endif
                
            </a>
            <a href='{{route("admin.salles_reservation.index")}}' style="background-color:rgba(40,57,101,.9)" class="list-group-item  d-flex justify-content-between align-items-center text-light @yield('activeContact')">
                RESERVER_SALLE
                <span class="badge bg-dark rounded-pill"></span>
            </a>
            <a href='{{route("admin.contact.messages")}}' style="background-color:rgba(40,57,101,.9)" class="list-group-item  d-flex justify-content-between align-items-center text-light @yield('active_messages')">
                MESSAGES
                @if($count_messages)
                    <span class="badge rounded-pill" style="background-color:#fd5234;">{{$count_messages}}</span>
                @endif
            </a>
        </ul>
    </div>
@endsection



@section('activeSalles')
    active
@endsection



@section('content')

    <div class="container w-100">
        @if($count)
            {{-- <div class="alert alert-success w-100 mt-2">
                <ul>
                        <li style="text-align: center; list-style-type:none">
                            un noveaux message
                        </li>
                </ul>
            </div> --}}
        @endif
        <br>
        <h2 style="width:100%; text-align: center; color:rgba(40, 58, 102, 0.788);">TOUT_LES_MESSAGES</h2>
        <br><br><br><br>
        <div class="table w-100">

            <div class="table-header">
                <div class="header__item"><a id="name" class="filter__link" href="#">Nom</a></div>
                <div class="header__item"><a id="name" class="filter__link" href="#">email</a></div>
                <div class="header__item"><a id="wins" class="filter__link filter__link--number" href="#">message</a></div>
                <div class="header__item"><a id="draws" class="filter__link filter__link--number" href="#">Action</a></div>
            </div>
           
            <div class="table-content">	
                @foreach ($contacts_message as $contact)
                    <div class="table-row">		
                        <div class="table-data">{{$contact->nom}}</div>
                        <div class="table-data">{{$contact->email}}</div>
                        <div class="table-data">{{$contact->message}}</div>

                        <div class="table-data d-flex justify-content-around align-items-center">
                            
                                <button class="btn text-light rounded-0 " style="background-color:#fd5234; margin-left:1px; max-height:40px;" type="submit">Réponder</button>
                            
                        </div>
                    </div>
                @endforeach       
            </div>
        </div>
        <div class="d-flex justify-content-center">
            {{ $contacts_message->links() }}
        </div>
    </div>
@endsection