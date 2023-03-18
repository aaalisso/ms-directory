@extends('layout.load_table')

@section('title', 'Institución Persona')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
@endsection

@section('forms')
<div id="add_record_box" class="collapse">
    <form id="aform" action="{{url ('add-institution_person')}}" class="needs-validation" novalidate method="POST">
        @csrf
        <div class="crud-content">
            <div class="col">
                <label for="ainstitutionid">{{__('Institution_id')}}</label>
                <input type="number" name="ainstitutionid" id="ainstitutionid" class="form-control" required>
                <div class="invalid-feedback">
                    Please complete or enter a valid password
                </div>
            </div>

            <div class="col">
                <label for="apersonid">{{__('Person_id')}}</label>
                <input type="number" name="apersonid" id="apersonid" class="form-control" required>
                <div class="invalid-feedback">
                    Please complete this field
                </div>
            </div>

            <div class="col">
                <label for="aoccupation">{{__('Occupation')}}</label>
                <input type="number" name="aoccupation" id="aoccupation" class="form-control" required>
                <div class="invalid-feedback">
                    Please complete this field
                </div>
            </div>
            <div class="col">
                <label for="ainstitutionalemail">{{__('Institutional email')}}</label>
                <input type="text" name="ainstitutionalemail" id="ainstitutionalemail" class="form-control" required>
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
    <form id="uform" action="{{url ('update-institution_person')}}" class="needs-validation" novalidate method="POST">
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
<h1>Lista Institución - Persona</h1>
@endsection

@section('head_data')
<tr>
    <th>{{__('actions')}}</th>
    <th>{{__('institution_id')}}</th>
    <th>{{__('person_id')}}</th>
    <th>{{__('occupation')}}</th>
    <th>{{__('institutional_email')}}</th>
    <th>{{__('incorporation_date')}}</th>
</tr>
@endsection

@section('row_data')
@foreach($inst_pers_data as $item)
<tr>
    <td>
        <button title="Actualizar" data-bs-toggle="modal" data-bs-target="#editRecord" value="{{$item->id}}" class="action-btn btn-success editbtn">
            <i class="bi bi-pencil-square"></i>
        </button>
        <button title="Eliminar" data-bs-toggle="modal" data-bs-target="#deleteRecord" value="{{$item->id}}" class="action-btn btn-danger deletebtn">
            <i class="bi bi-x-square"></i>
        </button>
    </td>
    <td>{{$item->institution_id}}</td>
    <td>{{$item->person_id}}</td>
    <td>{{$item->occupation}}</td>
    <td>{{$item->institutional_email}}</td>
    <td>{{$item->incorporation_date}}</td>
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
            var id = $(this).val();
            $.ajax({
                type: "GET",
                url: "edit-institution_person/" + id,
                success: function(response) {
                    $('#edit_institution_id').val(response.inst_pers.institution_id);
                    $('#edit_person_id').val(response.inst_pers.person_id);
                    $('#edit_occupation').val(response.inst_pers.occupation);
                    $('#edit_institutional_email').val(response.inst_pers.institutional_email);
                    $('#edit_incorporation_date').val(response.inst_pers.incorporation_date);
                }
            });
        });
    });

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
@endsection