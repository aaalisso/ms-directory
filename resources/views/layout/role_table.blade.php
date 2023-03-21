<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>


<div class="modal-content">
    <div class="modal-header bg-primary">
        <h3 class="modal-title">
            {{$user_info->person_name}} : Roles
        </h3>
        <a href="#" class="btn close_btn" data-bs-dismiss="modal" aria-label="Close" style="font-size: 24px;">
            <i class="bi bi-x-octagon-fill"></i>
        </a>
    </div>
    <div class="modal-body">
        @if($addRoleBtnState == 1)
        <button type="button" class="btn-outline-info btn-sm addrol" data-user="{{$user_info->user_id}}" data-toggle="tooltip" data-bs-placement="right">
            <i class="bi bi-plus-square-fill"></i> Añadir roles
        </button>
        @else
        <button type="button" class="btn-secondary btn-sm addrol" disabled data-user="{{$user_info->user_id}}" data-toggle="tooltip" data-bs-placement="right">
            <i class="bi bi-plus-square-fill"></i> Añadir roles
        </button>
        @endif
        <br></br>
        <div class="card">
            <div class="card-body table-responsive p-0" style="height: 300px;">

                <table id="user_roles_data" class="table table-head-fixed text-nowrap">
                    <thead>
                        <tr>
                            <th>{{__('Estado')}}</th>
                            <th>{{__('Descripción')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($fill as $row)
                        <tr>
                            <td>
                                @if($row->ur_state == 1)
                                <button title="Habilitado" type="button" data-bs-toggle="tooltip" data-bs-placement="bottom" class="btn role_button_state ena" data-id="{{$row->id}}" data-user="{{$row->user_id}}" data-state="0">
                                    <i class="bi bi-toggle-on"></i>
                                </button>
                                @else
                                <button title="Deshabilitado" type="button" data-bs-toggle="tooltip" data-bs-placement="bottom" class="btn role_button_state disa" data-id="{{$row->id}}" data-user="{{$row->user_id}}" data-state="1">
                                    <i class="bi bi-toggle-on"></i>
                                </button>
                                @endif
                            </td>
                            <td>{{$row->role_description}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <button id="btnClose_add_role_view" type="button" class="btn-danger btn-sm float-right" data-bs-dismiss="modal">Cerrar</button>
    </div>
</div>