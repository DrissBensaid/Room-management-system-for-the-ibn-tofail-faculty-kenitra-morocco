@extends('layouts.body')

@section('activeReservationSalles')
    active
@endsection

@section('logotitle')
    Admin
@endsection

@section('list')
    <div style="min-height:90vh; background-color:rgb(40, 57, 101);" class="w-25 ">
        <ul class="list-group w-100">
            <a href='{{route('admin.users.index')}}'  style="background-color:rgba(40,57,101,.9)" class="list-group-item  d-flex justify-content-between align-items-center text-light @yield('activeHome')">
                PROFESSEURS
                <span class="badge bg-dark rounded-pill"></span>
                </a>
            <a href='{{route('admin.salles.index')}}' style="background-color:rgba(40,57,101,.9)" class="list-group-item  d-flex justify-content-between align-items-center text-light @yield('activeSalles')">
                SALLES
                <span class="badge bg-dark rounded-pill"></span>
            </a>
            <a href='{{route('admin.contact.index')}}' style="background-color:rgba(40,57,101,.9)" class="list-group-item  d-flex justify-content-between align-items-center text-light @yield('activeContacts')">
                DEMANDES_SALLES
                @if($count)
                    <span class="badge rounded-pill" style="background-color:#fd5234;">{{$count}}</span>
                @endif
            </a>
            <a href='{{route("admin.salles_reservation.index")}}' style="background-color:rgba(40,57,101,.9)" class="list-group-item  d-flex justify-content-between align-items-center text-light @yield('activeReservationSalles')">
                RESERVER_SALLE
                <span class="badge bg-dark rounded-pill"></span>
            </a>
            <a href='{{route("admin.contact.messages")}}' style="background-color:rgba(40,57,101,.9)" class="list-group-item  d-flex justify-content-between align-items-center text-light @yield('active_messages')">
                MESSAGES
                @if($count_message)
                    <span class="badge rounded-pill" style="background-color:#fd5234;">{{$count_message}}</span>
                @endif
            </a>
        </ul>
    </div>
@endsection


@section('content')
<div class="w-100">
    <div class="w-100 d-flex flex-wrap justify-content-around p-4">
        @foreach ($salles as $salle)
        {{-- /user/reservation/{{$salle->id}} --}}
            <a href="/admin/reservation_admin/{{$salle->id}}" class="card text-white  mt-3 mb-3" 
                style="text-decoration:none; max-width: 25rem; max-height:24vh; ">
                <div style="background-color:rgb(48, 64, 104); text-transform:uppercase; font-size:14px;">
                    <div class="card-header" style='color:#fd5234;'>Réserver la salle</div>
                    <div class="card-body">
                        <h5 class="card-title">Salle {{$salle->type_salle}}</h5>
                        <p class="" style='color:#9c9c9c;'>La capacité de cette salle est {{$salle->nbr_places}} place</p>
                    </div>
                </div>
            </a>
        @endforeach
        
    </div>
    <div class="d-flex justify-content-center">
        {{ $salles->links() }}
    </div>
</div>

@endsection

