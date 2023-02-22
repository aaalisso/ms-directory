<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!--Custom styles-->
    @vite(['resources/js/app.js', 'resources/css/login_styles.css', 'resources/css/header_styles.css'])

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <title>@yield('title')</title>

</head>

<body>
    @extends('header')
    <div class="main-container">
        <div class="sidebar" style="background-color: lightgray;">

            <a class="sidebar__item" href="ubigeo"><i class="bi bi-globe-americas"></i> UBIGEO</a>
            <a class="sidebar__item" href="person"><i class="bi bi-person-vcard"></i> PERSONAS</a>
            <a href="institution_person" class="sidebar__item">INSTITUTO - PERSONA</a>
            <a class="sidebar__item" href="user"><i class="bi bi-people-fill"></i> USUARIOS</></a>
            <a class="sidebar__item" href="institution"><i class="bi bi-buildings"></i> INSTITUCIÓN</></a>
            @if(session('status'))
            @endif
        </div>

        <!-- <main class="main__content" style="background-color: lightgray;">
            @yield('content')
        </main> -->

    </div>
    @yield('scripts')
    </div>
</body>

</html>


<table id="dataTable" class="table table-responsive">
        <thead>
                <tr class="custom-row head">
                    <th>{{__('actions')}}</th>
                    <th>{{__('country')}}</th=>
                    <th>{{__('department')}}</th=>
                    <th>{{__('municipality')}}</th=>
                </tr>
            </thead>
            <tbody>
                @foreach($ubigeo_data as $item)
                <tr class="custom-row center">
                    <td class="column1 pad btn-group-xs" data-column="column1">
                        <button data-bs-toggle="modal" data-bs-target="#editUbigeo" value="{{$item->ubigeo_id}}" class="btn btn-success editbtn">
                            
                        </button>
                        <button data-bs-toggle="modal" data-bs-target="#deleteUbigeo" value="{{$item->ubigeo_id}}" class="btn btn-danger deletebtn">
                            
                        </button>
                    </td>
                    <td class="column2 pad" data-column="column2">{{ $item->ubigeo_country}}</td>
                    <td class="column3 pad" data-column="column3">{{ $item->ubigeo_department}}</td>
                    <td class="column4 pad" data-column="column4">{{ $item->ubigeo_municipality}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>




        <div class="table-card">
    <div class="table-header">Lista de ubigeo</div>
    <div class="table-alert-box">
        @if(session('status'))
        <p>
            {{session('status')}}
        </p>
        @endif
    </div>
    <div class="table-function-btn-box">
        <button class="btn btn-primary addbtn" id="add_ubigeo" name="add_ubigeo" data-bs-toggle="modal" data-bs-target="#addUbigeo">Agregar ubigeo</button>
    </div>
    <div class="table-body">
        <div id="dataTable" class="custom-table">
            <div class="custom-table-head-row">casco</div>
            <div class="custom-table-head-row">moto</div>
            <div class="custom-table-head-row">moto</div>
        </div>
        
        <div class="d-flex">
            {!! $ubigeo_data->links() !!}
        </div>
    </div>
</div>

<div id="dataTable" class="custom-table">
            <div class="table-head">
                <div class="table-head-cell">{{__('actions')}}</div>
                <div class="table-head-cell">{{__('country')}}</div>
                <div class="table-head-cell">{{__('department')}}</div>
                <div class="table-head-cell">{{__('municipality')}}</div>
            </div>
            <div class="table-body">
                @foreach($ubigeo_data as $item)
                <div class="table-row">
                    <div class="table-row-cell">
                        <div class="btn-group-xs">
                            <button data-bs-toggle="modal" data-bs-target="#editUbigeo" value="{{$item->ubigeo_id}}" class="action-btn btn-success editbtn">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                            <button data-bs-toggle="modal" data-bs-target="#deleteUbigeo" value="{{$item->ubigeo_id}}" class="action-btn btn-danger deletebtn">
                                <i class="bi bi-x-square"></i>
                            </button>
                        </div>
                    </div>
                    <div class="table-row-cell">{{ $item->ubigeo_country}}</div>
                    <div class="table-row-cell">{{ $item->ubigeo_department}}</div>
                    <div class="table-row-cell">{{ $item->ubigeo_municipality}}</div>
                </div>
                @endforeach
                <div class="d-flex">
                    {!! $ubigeo_data->links() !!}
                </div>
            </div>

        </div>
