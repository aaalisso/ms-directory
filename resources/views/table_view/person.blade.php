@extends('layout.load_table')

@section('title', 'Persona')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
@endsection


@section('forms')
<div id="add_record_box" class="collapse">
    <form id="aform" action="{{url ('add-person')}}" class="needs-validation" novalidate method="POST">
        @csrf
        <div class="crud-content">
            <div class="col">
                <label for="aname">{{__('Name')}}</label>
                <input type="text" name="aname" id="aname" class="form-control" required>
                <div class="invalid-feedback">
                    Please complete this field
                </div>
            </div>

            <div class="col">
                <label for="asurname">{{__('Surname')}}</label>
                <input type="text" name="asurname" id="asurname" class="form-control" required>
                <div class="invalid-feedback">
                    Please complete this field
                </div>
            </div>
            <div class="col">
                <label for="aemail">{{__('email')}}</label>
                <input type="text" name="aemail" id="aemail" class="form-control" required>
                <div class="invalid-feedback">
                    Please complete this field
                </div>
            </div>
            <div class="col">
                <label for="aiddoc">{{__('iddoc')}}</label>
                <input type="text" name="aiddoc" id="aiddoc" class="form-control" required>
                <div class="invalid-feedback">
                    Please complete this field
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
                <label for="aphoto">{{__('Photo')}}</label>
                <input type="text" name="aphoto" id="aphoto" class="form-control" required>
                <div class="invalid-feedback">
                    Please complete this field
                </div>
            </div>
            <div class="col">
                <label for="abirthdate">{{__('BirthDate')}}</label>
                <input type="date" name="abirthdate" id="abirthdate" class="form-control" required>
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
    <form id="uform" action="{{url ('update-person')}}" class="needs-validation" novalidate method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="record_id" id="record_id">
        <div class="crud-content">
            <div class="col">
                <label for="uname">{{__('Name')}}</label>
                <input type="text" name="uname" id="uname" class="form-control" required>
                <div class="invalid-feedback">
                    Please complete this field
                </div>
            </div>

            <div class="col">
                <label for="usurname">{{__('Surname')}}</label>
                <input type="text" name="usurname" id="usurname" class="form-control" required>
                <div class="invalid-feedback">
                    Please complete this field
                </div>
            </div>
            <div class="col">
                <label for="uemail">{{__('email')}}</label>
                <input type="text" name="uemail" id="uemail" class="form-control" required>
                <div class="invalid-feedback">
                    Please complete this field
                </div>
            </div>
            <div class="col">
                <label for="uiddoc">{{__('iddoc')}}</label>
                <input type="text" name="uiddoc" id="uiddoc" class="form-control" required>
                <div class="invalid-feedback">
                    Please complete this field
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
                <label for="uphoto">{{__('Photo')}}</label>
                <input type="text" name="uphoto" id="uphoto" class="form-control" required>
                <div class="invalid-feedback">
                    Please complete this field
                </div>
            </div>
            <div class="col">
                <label for="ubirthdate">{{__('BirthDate')}}</label>
                <input type="date" name="ubirthdate" id="ubirthdate" class="form-control" required>
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
<h1>Lista Persona</h1>
@endsection

@section('head_data')
<tr>
    <th>{{__('actions')}}</th>
    <th>{{__('name')}}</th>
    <th>{{__('surname')}}</th>
    <th>{{__('email')}}</th>
    <th>{{__('id_doc')}}</th>
    <th>{{__('address')}}</th>
    <th>{{__('phone')}}</th>
    <th>{{__('web_page')}}</th>
    <th>{{__('photo')}}</th>
    <th>{{__('birth_date')}}</th>
    <th>{{__('ubigeo')}}</th>
</tr>
@endsection

@section('row_data')
@foreach($person_data as $item)
<tr>
    <td>
        <button title="Actualizar" value="{{$item->person_id}}" class="action-btn btn-success editbtn" data-bs-toggle="collapse" data-bs-target="#update_record_box" aria-controls="update_record_box" aria-expanded="false">
            <i class="bi bi-pencil-square"></i>
        </button>
        <button title="Eliminar" data-bs-toggle="modal" data-bs-target="#deleteRecord" value="{{$item->person_id}}" class="action-btn btn-danger deletebtn">
            <i class="bi bi-x-square"></i>
        </button>
    </td>
    <td>{{$item->person_name}}</td>
    <td>{{$item->person_surname}}</td>
    <td>{{$item->person_email}}</td>
    <td>{{$item->person_identity_document}}</td>
    <td>{{$item->person_address}}</td>
    <td>{{$item->person_phone}}</td>
    <td>{{$item->person_web_page}}</td>
    <td>{{$item->person_profile_picture}}</td>
    <td>{{$item->person_birthday_date}}</td>
    <td>{{$item->ubigeo_id}}</td>
</tr>
@endforeach
@endsection

@section('modals')
<!-- Add Ubigeo Modal -->
<div class="modal fade" id="addPerson" tabindex="-1" aria-labelledby="addPersonLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPersonLabel">Ingrese datos de nueva persona</h5>
            </div>
            <form action="{{ url ('add-person') }}" method="POST" id="forms">
                @csrf
                <div class="modal-body">
                    <div class="row md-form mb-2">
                        <div class="col-md-3">
                            <label for="">{{__('name')}}</label>
                            <input type="text" name="add_name" id="add_name" required class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="">{{__('surname')}}</label>
                            <input type="text" name="add_surname" id="add_surname" required class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="">{{__('email')}}</label>
                            <input type="text" name="add_email" id="add_email" required class="form-control">
                        </div>
                    </div>
                    <div class="row md-form mb-2">
                        <div class="col-md-3">
                            <label for="">{{__('identity_document')}}</label>
                            <input type="text" name="add_identity_document" id="add_identity_document" required class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="">{{__('address')}}</label>
                            <input type="text" name="add_address" id="add_address" required class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="">{{__('phone')}}</label>
                            <input type="text" name="add_phone" id="add_phone" required class="form-control">
                        </div>
                    </div>
                    <div class="row md-form mb-2">
                        <div class="col-md-6">
                            <label for="">{{__('web_page')}}</label>
                            <input type="text" name="add_web_page" id="add_web_page" required class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="">{{__('profile_picture')}}</label>
                            <input type="text" name="add_profile_picture" id="add_profile_picture" required class="form-control">
                        </div>
                    </div>
                    <div class="row md-form mb-2">
                        <div class="col-md-5">
                            <label for="">{{__('birthday_date')}}</label>
                            <input type="text" name="add_birthday_date" id="add_birthday_date" required class="form-control">
                        </div>
                        <div class="col-md-5">
                            <label for="">{{__('ubigeo_id')}}</label>
                            <input type="text" name="add_ubigeo_id" id="add_ubigeo_id" required class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{__('close')}}</button>
                        <button type="submit" class="btn btn-primary">{{__('save')}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end Add Ubigeo Modal-->

<!-- Edit Modal -->
<div class="modal fade" id="editPerson" tabindex="-1" aria-labelledby="editPersonLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPersonLabel">Actualizar datos</h5>
            </div>
            <form action="{{ url ('update-person') }}" method="POST" id="editPersonForm">
                @csrf
                @method('PUT')
                <input type="hidden" name="edit_id" id="edit_id" />
                <div class="modal-body">
                    <div class="row md-form mb-2">
                        <div class="col-md-3">
                            <label for="">{{__('name')}}</label>
                            <input type="text" name="edit_name" id="edit_name" required class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="">{{__('surname')}}</label>
                            <input type="text" name="edit_surname" id="edit_surname" required class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="">{{__('email')}}</label>
                            <input type="text" name="edit_email" id="edit_email" required class="form-control">
                        </div>
                    </div>
                    <div class="row md-form mb-2">
                        <div class="col-md-3">
                            <label for="">{{__('identity_document')}}</label>
                            <input type="text" name="edit_identity_document" id="edit_identity_document" required class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="">{{__('address')}}</label>
                            <input type="text" name="edit_address" id="edit_address" required class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="">{{__('phone')}}</label>
                            <input type="text" name="edit_phone" id="edit_phone" required class="form-control">
                        </div>
                    </div>
                    <div class="row md-form mb-2">
                        <div class="col-md-6">
                            <label for="">{{__('web_page')}}</label>
                            <input type="text" name="edit_web_page" id="edit_web_page" required class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="">{{__('profile_picture')}}</label>
                            <input type="text" name="edit_profile_picture" id="edit_profile_picture" required class="form-control">
                        </div>
                    </div>
                    <div class="row md-form mb-2">
                        <div class="col-md-5">
                            <label for="">{{__('birthday_date')}}</label>
                            <input type="text" name="edit_birthday_date" id="edit_birthday_date" required class="form-control">
                        </div>
                        <div class="col-md-5">
                            <label for="">{{__('ubigeo_id')}}</label>
                            <input type="text" name="edit_ubigeo_id" id="edit_ubigeo_id" required class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">{{__('close')}}</button>
                        <button type="submit" class="btn btn-primary">{{__('edit')}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end Edit Ubigeo Modal -->

<!-- Delete Ubigeo Modal -->
<div class="modal fade" id="deletePerson" tabindex="-1" aria-labelledby="deletePersonLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ url ('delete-person') }}" method="POST" id="deltePersonForm">
                @csrf
                @method('DELETE')

                <input type="hidden" name="delete_id" id="delete_id">

                <h5 class="message center" id="deletePersonLabel">¿Desea eliminar el registro?</h5>
                <div class="modal-footer btn-group center">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">{{__('close')}}</button>
                    <button type="submit" class="btn btn-primary btn-sm">{{__('delete')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end Delete Ubigeo Modal -->

@endsection

@section('js')
<script>
    $(document).ready(function() {
        $(document).on('click', '.deletebtn', function() {
            var person_id = $(this).val();
            $('#delete_id').val(person_id);
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
                url: "edit-person/" + id,
                success: function(response) {
                    // console.log(response);
                    $('#record_id').val(response.person.person_id);
                    $('#uname').val(response.person.person_name);
                    $('#usurname').val(response.person.person_surname);
                    $('#uemail').val(response.person.person_email);
                    $('#uiddoc').val(response.person.person_identity_document);
                    $('#uaddress').val(response.person.person_address);
                    $('#uphone').val(response.person.person_phone);
                    $('#uwebpage').val(response.person.person_web_page);
                    $('#uphoto').val(response.person.person_profile_picture);
                    $('#ubirthdate').val(response.person.person_birthday_date);
                    $('#uubigeoid').val(response.person.ubigeo_id);
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
@endsection