@extends('load_table_layout')

@section('title', 'Usuario')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
@endsection

@section('forms')
<div id="add_record_box" class="collapse">
    <form id="aform" action="{{url ('add-user')}}" class="needs-validation" novalidate method="POST">
        @csrf
        <div class="crud-content" id="crudCont">
            <div class="col">
                <label for="apassword">{{__('Password')}}</label>
                <input type="text" name="apassword" id="apassword" class="form-control" required>
                <div class="invalid-feedback">
                    Please complete or enter a valid password
                </div>
            </div>

            <div class="col">
                <label for="astate">{{__('state')}}</label>
                <input type="number" name="astate" id="astate" class="form-control" required>
                <div class="invalid-feedback">
                    Please complete this field
                </div>
            </div>

            <div class="col">
                <label for="apersonid">{{__('PersonId')}}</label>
                <input type="number" name="apersonid" id="apersonid" class="form-control" required>
                <div class="invalid-feedback">
                    Please complete this field
                </div>
            </div>
            <div class="col">
                <label for="aroleid">{{__('RoleId')}}</label>
                <input type="number" name="aroleid" id="aroleid" class="form-control" required>
                <div class="invalid-feedback">
                    Please complete this field
                </div>
            </div>
        </div>
        <div class="row-md" style="display: flex; justify-content: center;">
            <button type="submit" value="submit" class="btn btn-primary" style="width: 20rem;">{{__('save')}}</button>
        </div>
    </form>
</div>

<div id="update_record_box" class="collapse">
    <form id="uform" action="{{url ('update-user')}}" class="needs-validation" novalidate method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="record_id" id="record_id">
        <div class="crud-content">
            <div class="col">
                <label for="upassword">{{__('Password')}}</label>
                <input type="text" name="upassword" id="upassword" class="form-control" required>
                <div class="invalid-feedback">
                    Please complete or enter a valid password
                </div>
            </div>

            <div class="col">
                <label for="ustate">{{__('state')}}</label>
                <input type="number" name="ustate" id="ustate" class="form-control" required>
                <div class="invalid-feedback">
                    Please complete this field
                </div>
            </div>

            <div class="col">
                <label for="upersonid">{{__('PersonId')}}</label>
                <input type="number" name="upersonid" id="upersonid" class="form-control" required>
                <div class="invalid-feedback">
                    Please complete this field
                </div>
            </div>
            <div class="col">
                <label for="uroleid">{{__('RoleId')}}</label>
                <input type="number" name="uroleid" id="uroleid" class="form-control" required>
                <div class="invalid-feedback">
                    Please complete this field
                </div>
            </div>
        </div>
        <div class="row-md" style="display: flex; justify-content: center;">
            <button type="submit" value="submit" class="btn btn-success" style="width: 20rem;">{{__('update')}}</button>
        </div>
    </form>
</div>
@endsection


@section('table_title')
<h1>Lista Usuario</h1>
@endsection

@section('head_data')
<tr>
    <th>{{__('actions')}}</th>
    <th>{{__('password')}}</th>
    <th>{{__('state')}}</th>
    <th>{{__('person_id')}}</th>
    <th>{{__('Roles')}}</th>
</tr>
@endsection

@section('row_data')
@foreach($data as $item)
<tr>
    <td>
        <button title="Actualizar" value="{{$item->user_id}}" class="action-btn btn-success editbtn" data-bs-toggle="collapse" data-bs-target="#update_record_box" aria-controls="update_record_box" aria-expanded="false">
            <i class="bi bi-pencil-square"></i>
        </button>
        <button title="Eliminar" data-bs-toggle="modal" data-bs-target="#deleteRecord" value="{{$item->user_id}}" class="action-btn btn-danger deletebtn">
            <i class="bi bi-x-square"></i>
        </button>
    </td>
    <td>{{ $item->password}}</td>
    <td>{{ $item->user_state}}</td>
    <td>{{ $item->person_id}}</td>
    <td>
        <button type="buttom" title="Ver Roles" value="{{$item->user_id}}" class="action-btn btn-info roles" data-bs-toggle="modal" data-bs-target="#user_roles" aria-controls="user_roles" aria-expanded="false">
            <i class="bi bi-file-earmark-person-fill"></i>
        </button>
    </td>
</tr>
@endforeach
@endsection

@section('modals')


<div class="modal fade" id="user_roles" tabindex="-1" role="dialog" aria-labelledby="userRolesLabel" aria-hidden="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h3 class="modal-title">Roles de usuario</h3>
                <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close" style="font-size: 24px;">
                    <i class="bi bi-x-octagon-fill"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body table-responsive p-0" style="height: 300px;">
                        <table id="user_roles_data" class="table table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                    <th>{{__('User id')}}</th>
                                    <th>{{__('Role id')}}</th>
                                    <th>{{__('Description')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                            </tbody>
                        </table>
                    </div>

                    <!-- @include('table_roles') -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection


@section('js')
<script>
    $(document).ready(function() {
        $(document).on('click', '.deletebtn', function() {
            var id = $(this).val();
            $('#delete_id').val(id);
        });
    });
    $(document).ready(function() {
        $(document).on('click', '.editbtn', function() {
            document.getElementById('add_record_box').classList.remove("show");
            document.getElementById('aform').classList.remove("was-validated");
            document.getElementById('uform').classList.remove("was-validated");
            document.getElementById('aform').reset();
            document.getElementById('uform').reset();
            var record_id = $(this).val();
            $.ajax({
                type: "GET",
                url: "edit-user/" + record_id,
                success: function(response) {
                    $('#record_id').val(response.user.user_id);
                    $('#ustate').val(response.user.user_state);
                    $('#uroleid').val(response.user.role_id);
                    $('#upersonid').val(response.user.person_id);
                }
            });
        });


    });
</script>

<script>
    (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }
                form.classList.add('was-validated')
            }, false)
        })
    })()

    $(document).ready(function() {
        table.destroy();

        table = $('#record_data').DataTable({
            scrollX: true,
            "lengthMenu": [
                [5, 10, 50, -1],
                [5, 10, 50, "All"]
            ],
            pagingType: 'full_numbers',
            language: {
                "decimal": ",",
                "thousands": ".",
                "info": "Mostrando _START_ al _END_ de _TOTAL_",
                "infoEmpty": "Mostrando 0 de 0 - total 0",
                "infoPostFix": "",
                "infoFiltered": "(total registros: _MAX_)",
                "loadingRecords": "Cargando...",
                "lengthMenu": "Mostrar _MENU_ registros",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
                "processing": "Procesando...",
                "search": "Buscar:",
                "searchPlaceholder": "Término de búsqueda",
                "zeroRecords": "No se encontraron resultados",
                "emptyTable": "Ningún dato disponible en esta tabla",
                "aria": {
                    "sortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sortDescending": ": Activar para ordenar la columna de manera descendente"
                },
                //only works for built-in buttons, not for custom buttons
                "buttons": {
                    "create": "Nuevo",
                    "edit": "Cambiar",
                    "remove": "Borrar",
                    "copy": "Copiar",
                    "csv": "fichero CSV",
                    "excel": "tabla Excel",
                    "pdf": "documento PDF",
                    "print": "Imprimir",
                    "colvis": "Visibilidad columnas",
                    "collection": "Colección",
                    "upload": "Seleccione fichero...."
                },
                "select": {
                    "rows": {
                        _: '%d filas seleccionadas',
                        0: 'clic fila para seleccionar',
                        1: 'una fila seleccionada'
                    }
                }
            }
        });
    });
</script>

<!-- create roles table-->
<script>
    $(document).ready(function() {
        $(document).on('click', '.roles', function() {
            // var tdbody = document.getElementById("tdbodyRoles");
            // var trCreated = document.getElementById("cells");

            // if (trCreated != null) {
            //     tdbody.innerHTML = "";
            // }
            var record_id = $(this).val();
            $.ajax({
                type: "GET",
                url: "user/get-roles/" + record_id,
                success: function(response) {
                    console.log(response);
                    // var length = response.user_role.length;
                    // for (let i = 0; i < length; i++) {

                    //     const contenedor = document.getElementById('tdbodyRoles');
                    //     const tr = document.createElement('tr');
                    //     const user_id = document.createElement('td');
                    //     const role_id = document.createElement('td');
                    //     const description = document.createElement('td');

                    //     tr.setAttribute('id', 'cells');

                    //     user_id.setAttribute('name', 'cell');
                    //     role_id.setAttribute('name', 'cell');
                    //     description.setAttribute('name', 'cell');

                    //     const user_id_p = document.createElement('p');
                    //     const role_id_p = document.createElement('p');
                    //     const description_p = document.createElement('p');
                    //     user_id_p.innerText = response.user_role[i].user_id;
                    //     role_id_p.innerText = response.user_role[i].role_id;
                    //     description_p.innerText = response.user_role[i].role_description;

                    //     // Agregar el elemento p como hijo del elemento div
                    //     user_id.appendChild(user_id_p);
                    //     role_id.appendChild(role_id_p);
                    //     description.appendChild(description_p);

                    //     // Agregar el elemento div como hijo del elemento contenedor
                    //     tr.appendChild(user_id);
                    //     tr.appendChild(role_id);
                    //     tr.appendChild(description);

                    //     contenedor.appendChild(tr);
                    // }
                }
            });

        });
    });
</script>
@endsection