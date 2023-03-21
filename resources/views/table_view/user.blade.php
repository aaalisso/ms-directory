@extends('layout.load_table')

@section('title', 'Usuario')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
@endsection

@section('forms')
<div id="add_record_box" class="collapse">
    <form id="aform" action="{{url ('add-user')}}" class="needs-validation" novalidate method="POST">
        <!-- <form id="aform" action="{{url ('add-user')}}" method="POST"> -->
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
        </div>
        <div class="row-md" style="display: flex; justify-content: center;">
            <button id="submit_add_record" type="submit" class="btn btn-primary" style="width: 20rem;">{{__('save')}}</button>
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
        </div>
        <div class="row-md" style="display: flex; justify-content: center;">
            <button id="submit_update_record" type="submit" value="submit" class="btn btn-success" style="width: 20rem;">{{__('update')}}</button>
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
    <th>{{__('Estado')}}</th>
    <th>{{__('Nombre')}}</th>
    <th>{{__('Roles')}}</th>
</tr>
@endsection

@section('row_data')
@foreach($data as $item)
<tr>
    <td>
        <button title="Actualizar" data-toggle="tooltip" data-bs-placement="bottom" value="{{$item->user_id}}" class="action-btn btn-success editbtn" data-bs-toggle="collapse" data-bs-target="#update_record_box" aria-controls="update_record_box" aria-expanded="false">
            <i class="bi bi-pencil-square"></i>
        </button>
        <button title="Eliminar" data-toggle="tooltip" data-bs-placement="bottom" data-record-id="{{$item->user_id}}" class="action-btn btn-danger deletebtn">
            <i class="bi bi-x-square"></i>
        </button>
    </td>
    <td>
        @if($item->user_state == 1)
        Habilitado
        @else
        Deshabilitado
        @endif
    </td>
    <td>{{ $item->person_name}} {{$item->person_surname}}</td>
    <td>
        <button type="button" data-toggle="tooltip" data-bs-placement="bottom" title="Ver Roles" value="{{$item->user_id}}" class="action-btn btn-info roles" data-bs-toggle="modal" data-bs-target="#user_roles" aria-controls="user_roles" aria-expanded="false">
            <i class="bi bi-file-earmark-person-fill"></i>
        </button>
    </td>
</tr>
@endforeach



@endsection

@yield('filldata')
<div class="modal fade" id="user_roles" tabindex="-1" role="dialog" aria-labelledby="userRolesLabel" aria-hidden="false">
    <div class="modal-dialog">
        <div class="modal-content" id="role_user">

        </div>
    </div>
</div>

@section('js')
<script>
    $(document).ready(function() {
        var records = document.getElementsByName('');
    });
</script>

<script>
    //init dataTable
    $(document).ready(function() {
        //tooltip
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
            $(document).click(function() {
                $('[data-toggle="tooltip"]').tooltip("hide");
            });
        });

        //Forms Validation
        (() => {
            "use strict";

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll(".needs-validation");

            // Loop over them and prevent submission
            Array.from(forms).forEach((form) => {
                form.addEventListener(
                    "submit",
                    (event) => {
                        if (!form.checkValidity()) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add("was-validated");
                    },
                    false
                );
            });
        })();

        table.destroy();

        table = $("#record_data").DataTable({
            scrollX: true,
            lengthMenu: [
                [5, 10, 50, -1],
                [5, 10, 50, "All"],
            ],
            pagingType: "full_numbers",
            language: {
                decimal: ",",
                thousands: ".",
                info: "Mostrando _START_ al _END_ de _TOTAL_",
                infoEmpty: "Mostrando 0 de 0 - total 0",
                infoPostFix: "",
                infoFiltered: "(total registros: _MAX_)",
                loadingRecords: "Cargando...",
                lengthMenu: "Mostrar _MENU_ registros",
                paginate: {
                    first: "Primero",
                    last: "Último",
                    next: "Siguiente",
                    previous: "Anterior",
                },
                processing: "Procesando...",
                search: "Buscar:",
                searchPlaceholder: "Término de búsqueda",
                zeroRecords: "No se encontraron resultados",
                emptyTable: "Ningún dato disponible en esta tabla",
                aria: {
                    sortAscending: ": Activar para ordenar la columna de manera ascendente",
                    sortDescending: ": Activar para ordenar la columna de manera descendente",
                },
                //only works for built-in buttons, not for custom buttons
                buttons: {
                    create: "Nuevo",
                    edit: "Cambiar",
                    remove: "Borrar",
                    copy: "Copiar",
                    csv: "fichero CSV",
                    excel: "tabla Excel",
                    pdf: "documento PDF",
                    print: "Imprimir",
                    colvis: "Visibilidad columnas",
                    collection: "Colección",
                    upload: "Seleccione fichero....",
                },
                select: {
                    rows: {
                        _: "%d filas seleccionadas",
                        0: "clic fila para seleccionar",
                        1: "una fila seleccionada",
                    },
                },
            },
        });
    });

    //Update record
    $(document).ready(function() {
        $(document).on("click", ".editbtn", function() {
            document.getElementById("add_record_box").classList.remove("show");
            document.getElementById("aform").classList.remove("was-validated");
            document.getElementById("uform").classList.remove("was-validated");
            document.getElementById("aform").reset();
            document.getElementById("uform").reset();
            var record_id = $(this).val();
            $.ajax({
                type: "GET",
                url: "edit-user/" + record_id,
                success: function(response) {
                    $("#record_id").val(response.user.user_id);
                    $("#ustate").val(response.user.user_state);
                    $("#uroleid").val(response.user.role_id);
                    $("#upersonid").val(response.user.person_id);
                },
            });
        });
    });

    //get roles
    $(document).ready(function() {
        $(document).on("click", ".roles", function() {
            var id = $(this).val();
            $.ajax({
                type: "GET",
                url: "user/get-roles/" + id,
                success: function(response) {
                    $("#role_user").html(response);
                },
            });
        });
    });

    //change role state
    $(document).ready(function() {
        $(document).on("click", ".role_button_state", function() {
            var ur_id = this.getAttribute("data-id");
            var user_id = this.getAttribute("data-user");
            var state = this.getAttribute("data-state");

            $.ajax({
                data: {
                    ur_id: ur_id,
                    user_id: user_id,
                    state: state,
                    _token: "{{ csrf_token() }}",
                },
                type: "PUT",
                url: "user/change_role/" + ur_id,
                success: function(response) {
                    $("#role_user").html(response);
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "El estado se cambió con éxito",
                        showConfirmButton: false,
                        timer: 1500,
                    });
                },
                error: function(response) {
                    alert("FAIL");
                },
            });
        });
    });

    //Delete record
    $(document).ready(function() {
        $(document).on("click", ".deletebtn", function() {
            Swal.fire({
                title: "¿Estás seguro?",
                text: "¡El usuario será deshabilitado indefinidamente!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sí, eliminarlo",
                cancelButtonText: "Cancelar",
            }).then((result) => {
                // si el usuario confirma la eliminación, realiza la acción
                if (result.isConfirmed) {
                    var id = $(this).data("record-id");
                    $.ajax({
                        url: "delete-user/" + id,
                        type: "DELETE",
                        data: {
                            _token: "{{ csrf_token() }}",
                        },
                        success: function(response) {
                            alert("Success");
                        },
                        error: function(xhr) {
                            alert("FAIL");
                        },
                    });
                }
            });
        });
    });

    //show roles to add
    $(document).ready(function() {
        $(document).on("click", ".addrol", function() {
            var user_id = this.getAttribute("data-user");
            $.ajax({
                type: "GET",
                url: "user/show_add_role",
                data: {
                    user_id: user_id,
                    _token: "{{ csrf_token() }}",
                },
                success: function(response) {
                    $("#role_user").html(response);
                },
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $(document).on('click', '.sendRoles', function(e) {
            e.preventDefault();
            
            var formData = $('#aRoles').serialize();
            console.log(formData);
            // $.ajax({
            //     type: 'POST',
            //     url: $(this).attr('action'),
            //     data: formData,
            //     dataType: 'json',
            //     success: function(response) {
            //         $("#role_user").html(response);
            //         Swal.fire({
            //             title: '¡Enviado!',
            //             text: response.message,
            //             icon: 'success'
            //         });
            //     },
            //     error: function(xhr, textStatus, error) {
            //         Swal.fire({
            //             title: '¡Error!',
            //             text: 'Error al guardar los cambios',
            //             icon: 'error'
            //         });
            //     }
            // });
        });
    })
</script>
@endsection