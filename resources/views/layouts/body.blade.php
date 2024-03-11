<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="css/list.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/1763c99aed.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://kit.fontawesome.com/1763c99aed.css" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700');

        $base-spacing-unit: 24px;
        $half-spacing-unit: $base-spacing-unit / 2;

        $color-alpha: #1772FF;
        $color-form-highlight: #EEEEEE;

        h1,h2,h3,h4,h5,h6 {
            margin:0;
        }

        .table {
            width:100%;
            border:1px solid $color-form-highlight;
        }

        .table-header {
            display:flex;
            width:100%;
            background-color:rgb(40, 57, 101);
            padding:($half-spacing-unit * 1.5) 0;
        }

        .table-row {
            display:flex;
            width:100%;
            padding:($half-spacing-unit * 1.5) 0;
            
            &:nth-of-type(odd) {
                background:$color-form-highlight;
            }
        }

        .table-data, .header__item {
            flex: 1 1 20%;
            text-align:center;
        }

        .header__item {
            text-transform:uppercase;
        }

        .filter__link {
            color:white;
            text-decoration: none;
            position:relative;
            display:inline-block;
            padding-left:$base-spacing-unit;
            padding-right:$base-spacing-unit;
            
            &::after {
                content:'';
                position:absolute;
                right:-($half-spacing-unit * 1.5);
                color:white;
                font-size:$half-spacing-unit;
                top: 50%;
                transform: translateY(-50%);
            }
            
            &.desc::after {
                content: '(desc)';
            }

            &.asc::after {
                content: '(asc)';
            }
            
        }
    </style>
</head>
<body style="position:relative; min-height:100vh;">
    @include('components.header')
    <div class="w-100 d-flex justify-content-between">
        @yield('list')

        
        @include('admin.modalUsers.modal-update-user')

        @include('admin.modalUsers.modal-add-user')

        @include('admin.modalUsers.modal-delete-user')

        @yield('content')


        @include('admin.modalSalles.modal-update-salle')

        @include('admin.modalSalles.modal-add-salle')
        
        @include('admin.modalSalles.modal-delete-salle')








    </div>
    @include('components.footer')
</body>
</html>