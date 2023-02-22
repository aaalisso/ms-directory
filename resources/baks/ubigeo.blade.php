@extends('template')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
@endsection

@section('table_title')
<h1>Lista Ubigeo</h1>
@endsection

@section('head_data')
<tr>
    <th>
        {{__('actions')}}
    </th>
    <th>
        {{__('country')}}
    </th>
    <th>
        {{__('department')}}
    </th>
    <th>
        {{__('municipality')}}
    </th>
</tr>
@endsection

@section('row_data')
@foreach($ubigeo_data as $item)
<tr>
    <td>
        <button title="Actualizar" data-bs-toggle="modal" data-bs-target="#editRecord" value="{{$item->ubigeo_id}}" class="action-btn btn-success editbtn">
            <i class="bi bi-pencil-square"></i>
        </button>
        <button title="Eliminar" data-bs-toggle="modal" data-bs-target="#deleteRecord" value="{{$item->ubigeo_id}}" class="action-btn btn-danger deletebtn">
            <i class="bi bi-x-square"></i>
        </button>
    </td>
    <td>{{ $item->ubigeo_country}}</td>
    <td>{{ $item->ubigeo_department}}</td>
    <td>{{ $item->ubigeo_municipality}}</td>
</tr>
@endforeach
@endsection

@section('pagination')
{!! $ubigeo_data->links() !!}
@endsection

@section('modals')
<div class="modal fade" id="addRecord" data-keyboard="false" tabindex="-1" data-backdrop="static" aria-labelledby="addRecordLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="forms__content">
            <div class="forms__header">
                <h3 class="modal-title" id="addUbigeoLabel">Ingrese datos de nuevo registro</h3>
            </div>
            <form action="{{ url ('add-ubigeo') }}" class="forms" name="forms" id="forms" method="POST">
                @csrf
                <!-- Group: Country -->
                <div class="forms__group" id="group__country">
                    <label for="country" class="forms__label">{{__('country')}}</label>
                    <div class="forms__group-input">
                        <input type="text" class="forms__input" name="country" id="country" placeholder="Perú">
                        <i class="forms__validation-state bi bi-x-circle-fill"></i>
                    </div>
                    <p class="forms__input-error">Este campo solo puede contener letras</p>
                </div>
                <!-- Group: Department -->
                <div class="forms__group" id="group__department">
                    <label for="department" class="forms__label">{{__('department')}}</label>
                    <div class="forms__group-input">
                        <input type="text" class="forms__input" name="department" id="department" placeholder="Loreto">
                        <i class="forms__validation-state bi bi-x-circle-fill"></i>
                    </div>
                    <p class="forms__input-error">Este campo solo puede contener letras</p>
                </div>
                <!-- Group: Municipality -->
                <div class="forms__group" id="group__municipality">
                    <label for="municipality" class="forms__label">{{__('municipality')}}</label>
                    <div class="forms__group-input">
                        <input type="text" class="forms__input" name="municipality" id="municipality" placeholder="Maynas">
                        <i class="forms__validation-state bi bi-x-circle-fill"></i>
                    </div>
                    <p class="forms__input-error">Este campo solo puede contener letras</p>
                </div>
                <!-- Group: Error Message -->
                <div class="forms__message" id="forms_message">
                    <p><i class="exclamation-icon bi bi-exclamation-octagon-fill"></i>
                        <b>Error:</b>
                        Por favor complete correctamente los campos.
                    </p>
                </div>
                <!-- Group: Buttons -->
                <div class="forms__group forms__group-btn-submit">
                    <button type="submit" class="forms__btn">{{__('save')}}</button>
                    <p class="forms__message-success" id="forms__message-success">success</p>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editRecord" tabindex="-1" role="dialog" aria-labelledby="editRecordLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="editRecordLabel">Actualizar datos del registro</h3>
            </div>
            <div class="modal-body">
                <form action="{{ url ('add-ubigeo') }}" class="forms" name="forms" id="aforms" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="record_id" id="record_id" />
                    <!-- Group: Country -->
                    <div class="forms__group" id="group__country">
                        <label for="add_country" class="forms__label">{{__('country')}}</label>
                        <div class="forms__group-input">
                            <input type="text" class="forms__input" name="edit_country" id="edit_country" placeholder="Perú">
                            <i class="forms__validation-state bi bi-x-circle-fill"></i>
                        </div>
                        <p class="forms__input-error">Este campo solo puede contener letras</p>
                    </div>
                    <!-- Group: Department -->
                    <div class="forms__group" id="group__department">
                        <label for="add_department" class="forms__label">{{__('department')}}</label>
                        <div class="forms__group-input">
                            <input type="text" class="forms__input" name="edit_department" id="edit_department" placeholder="Loreto">
                            <i class="forms__validation-state bi bi-x-circle-fill"></i>
                        </div>
                        <p class="forms__input-error">Este campo solo puede contener letras</p>
                    </div>
                    <!-- Group: Municipality -->
                    <div class="forms__group" id="group__municipality">
                        <label for="add_municipality" class="forms__label">{{__('municipality')}}</label>
                        <div class="forms__group-input">
                            <input type="text" class="forms__input" name="edit_municipality" id="edit_municipality" placeholder="Maynas">
                            <i class="forms__validation-state bi bi-x-circle-fill"></i>
                        </div>
                        <p class="forms__input-error">Este campo solo puede contener letras</p>
                    </div>
                    <!-- Group: Error Message -->
                    <div class="forms__message" id="forms_message">
                        <p><i class="exclamation-icon bi bi-exclamation-octagon-fill"></i>
                            <b>Error:</b>
                            Por favor complete correctamente los campos.
                        </p>
                    </div>
                    <!-- Group: Buttons -->
                    <div class="forms__group forms__group-btn-submit">
                        <button type="submit" class="forms__btn">{{__('update')}}</button>
                        <p class="forms__message-success" id="forms__message-success">success</p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
@vite(['resources/js/forms.js'])
<script>
    $(document).ready(function() {
        $(document).on('click', '.editbtn', function() {
            var record_id = $(this).val();
            $.ajax({
                type: "GET",
                url: "edit-ubigeo/" + record_id,
                success: function(response) {
                    $('#edit_id').val(response.ubigeo.ubigeo_id);
                    $('#edit_country').val(response.ubigeo.ubigeo_country);
                    $('#edit_department').val(response.ubigeo.ubigeo_department);
                    $('#edit_municipality').val(response.ubigeo.ubigeo_municipality);
                }
            });
        });
    });
</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#record_data').DataTable({
            "lenghMenu": [[5,10,50,-1], [5,10,50,"All"]]
        });
    });
</script>
@endsection