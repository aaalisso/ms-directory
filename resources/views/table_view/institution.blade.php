@extends('layout.load_table')

@section('title', 'Institución')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
@endsection

@section('forms')
<div id="add_record_box" class="collapse">
    <form id="aform" action="{{url ('add-institution')}}" class="needs-validation" novalidate method="POST">
        @csrf
        <div class="crud-content">
            <div class="col">
                <label for="aname">{{__('Name')}}</label>
                <input type="text" name="aname" id="aname" class="form-control" required>
                <div class="invalid-feedback">
                    Please complete or enter a valid password
                </div>
            </div>

            <div class="col">
                <label for="aaddress">{{__('Address')}}</label>
                <input type="text" name="aaddress" id="aaddress" class="form-control" required>
                <div class="invalid-feedback">
                    Please complete this field
                </div>
            </div>

            <div class="col">
                <label for="aphone">{{__('Phone')}}</label>
                <input type="number" name="aphone" id="aphone" class="form-control" required>
                <div class="invalid-feedback">
                    Please complete this field
                </div>
            </div>
            <div class="col">
                <label for="awebpage">{{__('Web Page')}}</label>
                <input type="text" name="awebpage" id="awebpage" class="form-control" required>
                <div class="invalid-feedback">
                    Please complete this field
                </div>
            </div>
            <div class="col">
                <label for="alogo">{{__('Logo')}}</label>
                <input type="text" name="alogo" id="alogo" class="form-control" required>
                <div class="invalid-feedback">
                    Please complete this field
                </div>
            </div>
            <div class="col">
                <label for="aubigeoid">{{__('Ubigeo_id')}}</label>
                <input type="number" name="aubigeoid" id="aubigeoid" class="form-control" required>
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
    <form id="uform" action="{{url ('update-institution')}}" class="needs-validation" novalidate method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="record_id" id="record_id">
        <div class="crud-content">
        <div class="col">
                <label for="uname">{{__('Name')}}</label>
                <input type="text" name="uname" id="uname" class="form-control" required>
                <div class="invalid-feedback">
                    Please complete or enter a valid password
                </div>
            </div>

            <div class="col">
                <label for="uaddress">{{__('Address')}}</label>
                <input type="text" name="uaddress" id="uaddress" class="form-control" required>
                <div class="invalid-feedback">
                    Please complete this field
                </div>
            </div>

            <div class="col">
                <label for="uphone">{{__('Phone')}}</label>
                <input type="number" name="uphone" id="uphone" class="form-control" required>
                <div class="invalid-feedback">
                    Please complete this field
                </div>
            </div>
            <div class="col">
                <label for="uwebpage">{{__('Web Page')}}</label>
                <input type="text" name="uwebpage" id="uwebpage" class="form-control" required>
                <div class="invalid-feedback">
                    Please complete this field
                </div>
            </div>
            <div class="col">
                <label for="ulogo">{{__('Logo')}}</label>
                <input type="text" name="ulogo" id="ulogo" class="form-control" required>
                <div class="invalid-feedback">
                    Please complete this field
                </div>
            </div>
            <div class="col">
                <label for="uubigeoid">{{__('Ubigeo_id')}}</label>
                <input type="number" name="uubigeoid" id="uubigeoid" class="form-control" required>
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
<h1>Lista Institución</h1>
@endsection

@section('head_data')
<tr>
    <th>{{__('actions')}}</th>
    <th>{{__('name')}}</th>
    <th>{{__('address')}}</th>
    <th>{{__('phone')}}</th>
    <th>{{__('web_page')}}</th>
    <th>{{__('logo')}}</th>
    <th>{{__('ubigeo_id')}}</th>
</tr>
@endsection

@section('row_data')
@foreach($data as $item)
<tr>
    <td>
        <button title="Actualizar" value="{{$item->institution_id}}" class="action-btn btn-success editbtn" data-bs-toggle="collapse" data-bs-target="#update_record_box" aria-controls="update_record_box" aria-expanded="false">
            <i class="bi bi-pencil-square"></i>
        </button>
        <button title="Eliminar" data-bs-toggle="modal" data-bs-target="#deleteRecord" value="{{$item->institution_id}}" class="action-btn btn-danger deletebtn">
            <i class="bi bi-x-square"></i>
        </button>
    </td>
    <td>{{$item->institution_name}}</td>
    <td>{{$item->institution_address}}</td>
    <td>{{$item->institution_phone}}</td>
    <td>{{$item->institution_web_page}}</td>
    <td>{{$item->institution_logo}}</td>
    <td>{{$item->ubigeo_id}}</td>
</tr>
@endforeach
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
            var id = $(this).val();
            $.ajax({
                type: "GET",
                url: "edit-institution/" + id,
                success: function(response) {
                    $('#record_id').val(response.institution.institution_id);
                    $('#uname').val(response.institution.institution_name);
                    $('#uaddress').val(response.institution.institution_address);
                    $('#uphone').val(response.institution.institution_phone);
                    $('#uwebpage').val(response.institution.institution_web_page);
                    $('#ulogo').val(response.institution.institution_logo);
                    $('#uubigeoid').val(response.institution.ubigeo_id);
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

    $(document).ready(function() {
        $(document).on("click", ".deletebtn", function() {
            Swal.fire({
                title: "¿Estás seguro?",
                text: "¡El registro dejará de estar disponible indefinidamente!",
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
</script>
@endsection