@extends('layout.layout')
@section('title', 'Usuario')

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
                <button class="btn btn-primary add btn-sm" id="add_Register_btn" name="add_Register_btn" data-bs-toggle="modal" data-bs-target="#add_Register">Nuevo Registro</button>
            </p>
            <hr>
            <div class="card-text">
                <table id="dataTable" class="custom-table table-responsive">
                    <thead>
                        <tr class="custom-row head center">
                            <th class="column1 actions-pad pad s" data-column="column1">{{__('actions')}}</th>
                            <th class="column2 pad lg" data-column="column2">{{__('password')}}</th>
                            <th class="column3 pad lg" data-column="column3">{{__('state')}}</th>
                            <th class="column5 pad lg" data-column="column4">{{__('person_id')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $item)
                        <tr class="custom-row center">
                            <td class="column1 pad btn-group-xs" data-column="column1">
                                <button data-bs-toggle="modal" data-bs-target="#edit_Register" value="{{$item->user_id}}" class="btn btn-success editbtn">
                                    <i class="bi bi-pencil-square"></i>
                                </button>
                                <button data-bs-toggle="modal" data-bs-target="#delete_Register" value="{{$item->user_id}}" class="btn btn-danger deletebtn">
                                    <i class="bi bi-x-square"></i>
                                </button>
                            </td>
                            <td class="column2 pad" data-column="column2">{{$item->user_password}}</td>
                            <td class="column3 pad" data-column="column3">{{$item->user_state}}</td>
                            <td class="column4 pad" data-column="column4">{{$item->person_id}}</td>
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
<!-- Add Modal -->
<div class="modal fade" id="add_Register" tabindex="-1" aria-labelledby="addLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addLabel">Ingrese datos de nuevo registro</h5>
            </div>
            <form action="{{ url ('add-user') }}" method="POST" id="add_Form">
                @csrf
                <div class="modal-body">
                    <div class="row md-form mb-2">
                        <div class="col-md-3">
                            <label for="">{{__('password')}}</label>
                            <input type="password" name="add_password" id="add_password" autocomplete="on" required class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="">{{__('state')}}</label>
                            <input type="text" name="add_state" id="add_state" required class="form-control" placeholder="0 ó 1">
                        </div>
                        <div class="col-md-6">
                            <label for="">{{__('person_id')}}</label>
                            <input type="text" name="add_person_id" id="add_person_id" required class="form-control" placeholder="0 ó 1">
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
            <form action="{{ url ('update-user') }}" method="POST" id="edit_Form">
                @csrf
                @method('PUT')
                <input type="hidden" name="edit_id" id="edit_id"/>
                <div class="modal-body">
                    <div class="row md-form mb-2">
                        <div class="col-md-3">
                            <label for="">{{__('name')}}</label>
                            <input type="password" name="edit_password" autocomplete="on" id="edit_password" required class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="">{{__('surname')}}</label>
                            <input type="text" name="edit_state" id="edit_state" required class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="">{{__('email')}}</label>
                            <input type="text" name="edit_person_id" id="edit_person_id" required class="form-control">
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
<div class="modal fade" id="delete_Register" tabindex="-1" aria-labelledby="deletePersonLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ url ('delete-user') }}" method="POST" id="deltePersonForm">
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
                url: "edit-user/" + id,
                success: function(response) {
                    console.log(response);
                    $('#edit_id').val(response.user.user_id);
                    $('#edit_password').val(response.user.user_password);
                    $('#edit_state').val(response.user.user_state);
                    $('#edit_person_id').val(response.user.person_id);
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