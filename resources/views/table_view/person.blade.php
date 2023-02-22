@extends('load_table_layout')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
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
        <button title="Actualizar" data-bs-toggle="modal" data-bs-target="#editRecord" value="{{$item->person_id}}" class="action-btn btn-success editbtn">
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

@section('scripts')
<script>
    $('#forms').on('hidden.bs.modal', function() {
        document.getElementById("addPersonForm").reset();
    })

    $('#editPerson').on('hidden.bs.modal', function() {
        document.getElementById("editPersonForm").reset();
    })
</script>

<script>
    $(document).ready(function() {
        $(document).on('click', '.deletebtn', function() {
            var person_id = $(this).val();
            $('#delete_id').val(person_id);
        });
    });

    $(document).ready(function() {
        $(document).on('click', '.editbtn', function() {
            var id = $(this).val();
            $.ajax({
                type: "GET",
                url: "edit-person/" + id,
                success: function(response) {
                    // console.log(response);
                    $('#edit_id').val(response.person.person_id);
                    $('#edit_name').val(response.person.person_name);
                    $('#edit_surname').val(response.person.person_surname);
                    $('#edit_email').val(response.person.person_email);
                    $('#edit_identity_document').val(response.person.person_identity_document);
                    $('#edit_address').val(response.person.person_address);
                    $('#edit_phone').val(response.person.person_phone);
                    $('#edit_web_page').val(response.person.person_web_page);
                    $('#edit_profile_picture').val(response.person.person_profile_picture);
                    $('#edit_birthday_date').val(response.person.person_birthday_date);
                    $('#edit_ubigeo_id').val(response.person.ubigeo_id);
                }
            });
        });
    });
</script>

<!-- table hover scripts-->
<!-- <script type="text/javascript">
    (function($) {
        "use strict";
        $('.pad').on('mouseover', function() {
            var table1 = $(this).parent().parent().parent();
            var table2 = $(this).parent().parent();
            var column = $(this).data('column') + "";
            $(table2).find("." + column).addClass('hov-column-custom');
            $(table1).find(".custom-row.head ." + column).addClass('hov-column-head-custom');
        });
        $('.pad').on('mouseout', function() {
            var table1 = $(this).parent().parent().parent();
            var table2 = $(this).parent().parent();
            var column = $(this).data('column') + "";
            $(table2).find("." + column).removeClass('hov-column-custom');
            $(table1).find(".custom-row.head ." + column).removeClass('hov-column-head-custom');
        });
    })(jQuery);
</script> -->
@endsection