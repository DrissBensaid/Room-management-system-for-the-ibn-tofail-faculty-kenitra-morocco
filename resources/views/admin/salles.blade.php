@extends('layouts.body')

@section('logotitle')
    Admin
@endsection

@section('activeSalles')
    active
@endsection



@section('list')
    <div style="min-height:90vh; background-color:rgb(40, 57, 101);" class="w-25" >
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
                @if($count_message)
                    <span class="badge rounded-pill" style="background-color:#fd5234;">{{$count_message}}</span>
                @endif
            </a>
        </ul>
    </div>
@endsection


@section('content')

    <div class="container w-100" style="max-height:79vh; overflow:auto;">
        
        @if ($errors->any())
        <div class="alert alert-danger" >
            <ul>
                @foreach ($errors->all() as $error)
                    <li style="text-align: center; list-style-type:none">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if(session('success'))
        <div class="alert alert-success mt-1">
            <ul>
                <li style="text-align: center; list-style-type:none">{{ session('success') }}</li>
            </ul>
        </div>
        @endif

        <br>

        <h2 style="width:100%; text-align: center; color:rgba(40, 58, 102, 0.788);">
            TOUT_LES_SALLES
        </h2>

        <br>

        <button type="button"  id='add' class="btn text-light rounded-0" data-bs-toggle="modal" data-bs-target="#addsalleModal" style="background-color:#fd5234;">
            Ajouter +
        </button>

        <div>
            <br>
            <div class="table">
                <div class="table-header">
                    <div class="header__item"><a id="name" class="filter__link" href="#">Type_salle</a></div>
                    <div class="header__item"><a id="name" class="filter__link" href="#">Nbr_places</a></div>
                    <div class="header__item"><a id="wins" class="filter__link filter__link--number" href="#">Nom_faculte</a></div>
                    <div class="header__item"><a id="draws" class="filter__link filter__link--number" href="#">Action</a></div>
                </div>
               
                <div class="table-content">	
                    @foreach ($salles as $salle)
                        <div class="table-row">		
                            <div class="table-data">Salle {{$salle['type_salle']}}</div>
                            <div class="table-data">{{$salle['nbr_places']}}</div>
                            <div class="table-data">{{$salle['nom_faculte']}}</div>
                            <div class="table-data">
                                <a href="javascript:void(0)" onclick="updateSalle({{$salle['id']}})">Edit</a>
                                <a href="javascript:void(0)" onclick="deleteSalle({{$salle['id']}})">Supprimer</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="d-flex justify-content-center">
                {{ $salles->links() }}
            </div>
        </div>


        <script>
            function updateSalle(id)
            {
                $('#UpdateSalleModel').modal('toggle');
                $.get('/admin/salles/'+id, function(data){
                    $('#type_salle').val(data.type_salle);
                    $('#nom_faculte').val(data.nom_faculte);
                    $('#nbr_places').val(data.nbr_places);
                    $('#id').val(id); 
                });
            }
            

            $(document).ready(function() {
            //add data;
                $('#UpdateSalleForm').on('submit', function(e) {
                    e.preventDefault();
                    var type_salle = $('#type_salle').val();
                    var nom_faculte = $('#nom_faculte').val();
                    var nbr_places = $('#nbr_places').val();
                    var id = $('#id').val();
                    var url = "{{ route('admin.salles.update', ':id') }}";
                        url = url.replace(':id', id);

                    // Envoi de la requête POST vers la route 'users.store'
                    $.ajax({
                        url: url,
                        type: "PUT",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "type_salle": type_salle,
                            "nbr_places": nbr_places,
                            "nom_faculte": nom_faculte
                        },
                        success:function(data) {
                            alert('User added successfully!');
                            $('#addUserForm')[0].reset();  
                        }
                    });
                location.reload();
                });
            });


            function deleteSalle(id)
            {
                $('#deleteSalleModal').modal('toggle');
                $('#deleteSalleForm').attr('action','salles/'+id);
            }
        </script>

    </div>
@endsection