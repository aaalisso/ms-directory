@extends('load_table_layout')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
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



@section('modals')
<!-- Add Modal -->
<div class="modal fade" id="add_Register" tabindex="-1" aria-labelledby="add_Register_Label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add_Register_Label">Ingrese datos de nuevo registro</h5>
            </div>
            <form action="{{ url ('add-institution_person') }}" method="POST" id="add_Form">
                @csrf
                <div class="modal-body">
                    <div class="row md-form mb-2">
                        <div class="col-md-3">
                            <label for="">{{__('institution_id')}}</label>
                            <input type="text" name="add_institution_id" id="add_institution_id" required class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="">{{__('person_id')}}</label>
                            <input type="text" name="add_person_id" id="add_person_id" required class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="">{{__('occupation')}}</label>
                            <input type="text" name="add_occupation" id="add_occupation" required class="form-control">
                        </div>
                    </div>
                    <div class="row md-form mb-2">
                        <div class="col-md-3">
                            <label for="">{{__('institutional_email')}}</label>
                            <input type="text" name="add_institutional_email" id="add_institutional_email" required class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="">{{__('incorporation_date')}}</label>
                            <input type="text" name="add_incorporation_date" id="add_incorporation_date" required class="form-control" placeholder="2023-01-22">
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
<!-- end Add Modal-->

<!-- Edit Modal -->
<div class="modal fade" id="edit_Register" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editLabel">Actualizar datos</h5>
            </div>
            <form action="{{ url ('update-institution_person') }}" method="POST" id="edit_Form">
                @csrf
                @method('PUT')
                <input type="hidden" name="edit_id" id="edit_id">
                <div class="modal-body">
                    <div class="row md-form mb-2">
                        <div class="col-md-3">
                            <label for="">{{__('name')}}</label>
                            <input type="text" name="edit_institution_id" id="edit_institution_id" required class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="">{{__('surname')}}</label>
                            <input type="text" name="edit_person_id" id="edit_person_id" required class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="">{{__('email')}}</label>
                            <input type="text" name="edit_occupation" id="edit_occupation" required class="form-control">
                        </div>
                    </div>
                    <div class="row md-form mb-2">
                        <div class="col-md-3">
                            <label for="">{{__('identity_document')}}</label>
                            <input type="text" name="edit_institutional_email" id="edit_institutional_email" required class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="">{{__('address')}}</label>
                            <input type="text" name="edit_incorporation_date" id="edit_incorporation_date" required class="form-control" placeholder="2023-01-22">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{__('close')}}</button>
                        <button type="submit" class="btn btn-primary">{{__('edit')}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end Edit Ubigeo Modal -->

<!-- Delete Ubigeo Modal -->
<div class="modal fade" id="delete_Register" tabindex="-1" aria-labelledby="deleteLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ url ('delete-institution_person') }}" method="POST" id="delete_Form">
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
    $('#add_Register').on('hidden.bs.modal', function() {
        document.getElementById("add_Form").reset();
    })

    $('#edit_Register').on('hidden.bs.modal', function() {
        document.getElementById("edit_Form").reset();
    })
</script>

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
</script>

<!-- table hover scripts-->
<script type="text/javascript">
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
</script>
@endsection