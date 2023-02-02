@extends('layout.layout')
@section('title', 'Institución')

@section('content')
<!-- Main -->
@if(session('status'))
<div class="alert alert-success">{{session('status')}}</div>
@endif
<div class="container-sm">
    <div class="card">
        <h5 class="card-header">Lista</h5>
        <div class="card-body">
            <p>
                <button class="btn btn-primary add btn-sm" id="add_register_btn" name="add_register_btn" data-bs-toggle="modal" data-bs-target="#add_Register">Nuevo Registro</button>
            </p>
            <hr>
            <div class="card-text">
                <table id="dataTable" class="custom-table table-responsive">
                    <thead>
                        <tr class="custom-row head center">
                            <th class="column1 actions-pad pad s" data-column="column1">{{__('actions')}}</th>
                            <th class="column2 pad lg" data-column="column2">{{__('name')}}</th>
                            <th class="column3 pad lg" data-column="column3">{{__('address')}}</th>
                            <th class="column4 pad lg" data-column="column4">{{__('phone')}}</th>
                            <th class="column5 pad lg" data-column="column5">{{__('web_page')}}</th>
                            <th class="column6 pad lg" data-column="column6">{{__('logo')}}</th>
                            <th class="column7 pad lg" data-column="column7">{{__('ubigeo_id')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $item)
                        <tr class="custom-row center">
                            <td class="column1 pad btn-group-xs" data-column="column1">
                                <button data-bs-toggle="modal" data-bs-target="#edit_Register" value="{{$item->institution_id}}" class="btn btn-success editbtn">
                                    <i class="bi bi-pencil-square"></i>
                                </button>
                                <button data-bs-toggle="modal" data-bs-target="#delete_Register" value="{{$item->institution_id}}" class="btn btn-danger deletebtn">
                                    <i class="bi bi-x-square"></i>
                                </button>
                            </td>
                            <td class="column2 pad" data-column="column2">{{$item->institution_name}}</td>
                            <td class="column3 pad" data-column="column3">{{$item->institution_address}}</td>
                            <td class="column4 pad" data-column="column4">{{$item->institution_phone}}</td>
                            <td class="column5 pad" data-column="column5">{{$item->institution_web_page}}</td>
                            <td class="column6 pad" data-column="column6">{{$item->institution_logo}}</td>
                            <td class="column7 pad" data-column="column7">{{$item->ubigeo_id}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
                <div class="d-flex">
                    {!! $data->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Add Ubigeo Modal -->
<div class="modal fade" id="add_Register" tabindex="-1" aria-labelledby="addLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addLabel">Ingrese datos de nuevo registro</h5>
            </div>
            <form action="{{ url ('add-institution') }}" method="POST" id="add_Form">
                @csrf
                <div class="modal-body">
                    <div class="row md-form mb-2">
                        <div class="col-md-3">
                            <label for="">{{__('name')}}</label>
                            <input type="text" name="add_name" id="add_name" required class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="">{{__('adress')}}</label>
                            <input type="text" name="add_address" id="add_address" required class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="">{{__('phone')}}</label>
                            <input type="text" name="add_phone" id="add_phone" required class="form-control">
                        </div>
                    </div>
                    <div class="row md-form mb-2">
                        <div class="col-md-3">
                            <label for="">{{__('web_page')}}</label>
                            <input type="text" name="add_web_page" id="add_web_page" required class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="">{{__('logo')}}</label>
                            <input type="text" name="add_logo" id="add_logo" required class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="">{{__('ubigeo')}}</label>
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

<!-- Edit Ubigeo Modal -->
<div class="modal fade" id="edit_Register" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editLabel">Actualizar datos</h5>
            </div>
            <form action="{{ url ('update-institution') }}" method="POST" id="edit_Form">
                @csrf
                @method('PUT')
                <input type="hidden" name="edit_id" id="edit_id"/>
                <div class="modal-body">
                    <div class="row md-form mb-2">
                        <div class="col-md-3">
                            <label for="">{{__('name')}}</label>
                            <input type="text" name="edit_name" id="edit_name" required class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="">{{__('address')}}</label>
                            <input type="text" name="edit_address" id="edit_address" required class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="">{{__('phone')}}</label>
                            <input type="text" name="edit_phone" id="edit_phone" required class="form-control">
                        </div>
                    </div>
                    <div class="row md-form mb-2">
                        <div class="col-md-3">
                            <label for="">{{__('web_page')}}</label>
                            <input type="text" name="edit_web_page" id="edit_web_page" required class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="">{{__('logo')}}</label>
                            <input type="text" name="edit_logo" id="edit_logo" required class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="">{{__('ubigeo_id')}}</label>
                            <input type="text" name="edit_ubigeo_id" id="edit_ubigeo_id" required class="form-control">
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
<!-- end Edit Modal -->

<!-- Delete Modal -->
<div class="modal fade" id="delete_Register" tabindex="-1" aria-labelledby="deleteLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ url ('delete-institution') }}" method="POST" id="delete_Form">
                @csrf
                @method('DELETE')

                <input type="hidden" name="delete_id" id="delete_id">

                <h5 class="message center" id="deleteLabel">¿Desea eliminar el registro?</h5>
                <div class="modal-footer btn-group center">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">{{__('close')}}</button>
                    <button type="submit" class="btn btn-primary btn-sm">{{__('delete')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end Delete Modal -->

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
                url: "edit-institution/" + id,
                success: function(response) {
                    $('#edit_id').val(response.institution.institution_id);
                    $('#edit_name').val(response.institution.institution_name);
                    $('#edit_address').val(response.institution.institution_address);
                    $('#edit_phone').val(response.institution.institution_phone);
                    $('#edit_web_page').val(response.institution.institution_web_page);
                    $('#edit_logo').val(response.institution.institution_logo);
                    $('#edit_ubigeo_id').val(response.institution.ubigeo_id);
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