@extends('layouts.body')

@section('logotitle')
    Admin
@endsection

@section('activeUser')
    active
@endsection

@section('list')
    <div style="min-height:90vh; background-color:rgb(40, 57, 101);" class="w-25 " >
        <ul class="list-group w-100">
            <a href='{{route('admin.users.index')}}'   style="background-color:rgba(40,57,101,.9)" class="list-group-item  d-flex justify-content-between align-items-center text-light @yield('activeUser')">
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



@section('activeHome')
    active
@endsection


@section('content')

    <div class="container w-100">
        
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li style="text-align: center; list-style-type:none">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if(session('success'))
        <div class="alert alert-success">
            <ul>
               
                    <li style="text-align: center; list-style-type:none">{{ session('success') }}</li>
                
            </ul>
        </div>
        @endif
        <br>
        <h2 style="width:100%; text-align: center; color:rgba(40, 58, 102, 0.788);">
            TOUT_LES_PROFESSEURS
        </h2>
        <br>
        <button type="button"  id='add' class="btn text-light rounded-0" data-bs-toggle="modal" data-bs-target="#addnew" style="background-color:#fd5234;">
            Ajouter +
        </button>
        


        <div>
            <br>

            <div class="table">         
                <div class="table-header">
                    <div class="header__item"><a id="name" class="filter__link" href="#">Nom</a></div>
                    <div class="header__item"><a id="name" class="filter__link" href="#">Prenom</a></div>
                    <div class="header__item"><a id="wins" class="filter__link filter__link--number" href="#">Poste</a></div>
                    <div class="header__item"><a id="draws" class="filter__link filter__link--number" href="#">E-mail</a></div>
                    <div class="header__item"><a id="losses" class="filter__link filter__link--number" href="#">Téléphone</a></div>
                    <div class="header__item"><a id="total" class="filter__link filter__link--number" href="#">Action</a></div>
                </div>
               
                <div class="table-content">	
                    @foreach ($users as $user)
                        <div class="table-row">		
                            <div class="table-data">{{$user['nom']}}</div>
                            <div class="table-data">{{$user['prenom']}}</div>
                            <div class="table-data">{{$user['poste']}}</div>
                            <div class="table-data">{{$user['email']}}</div>
                            <div class="table-data">{{$user['telephone']}}</div>
                            <div class="table-data">
                                <a href="javascript:void(0)" onclick="updateUser({{$user['id']}})">Edit</a>
                                <a href="javascript:void(0)" onclick="deleteUser({{$user['id']}})">Supprimer</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

                <div class="d-flex justify-content-center">
                    {{ $users->links() }}
                </div>
        </div>


        <script>
            function updateUser(id)
            {
                $('#updatenew').modal('toggle');
                $.get('/admin/users/'+id, function(data){
                    $('#nom').val(data.nom);
                    $('#prenom').val(data.prenom);
                    $('#email').val(data.email);
                    $('#telephone').val(data.telephone);
                    $('#poste').val(data.poste);
                    $('#id').val(id);
                    
                });
            }
            

            $(document).ready(function() {
            //add data;
            $('#updateForm').on('submit', function(e) {
                e.preventDefault();
                var nom = $('#nom').val();
                var prenom = $('#prenom').val();
                var email = $('#email').val();
                var telephone = $('#telephone').val();
                var poste = $('#poste').val();
                var id = $('#id').val();
                var url = "{{ route('admin.users.update', ':id') }}";
                    url = url.replace(':id', id);

                // Envoi de la requête POST vers la route 'users.store'
                $.ajax({
                    url: url,
                    type: "PUT",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "nom": nom,
                        "prenom": prenom,
                        "email": email,
                        "telephone": telephone,
                        "poste": poste
                    },
                    success:function(data) {
                        alert('User added successfully!');
                        $('#addUserForm')[0].reset();  
                    },
                    error:function(data) {
                        alert('Error adding user.');
                    }
                });
                location.reload();
            });
           

        });


            function deleteUser(id)
            {
                $('#deleteUserModal').modal('toggle');
                $('#deleteUserForm').attr('action','users/'+id);
            }
        </script>
    </div>
@endsection
