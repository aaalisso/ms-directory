<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>


<div class="modal-content">
    <div class="modal-header bg-primary">
        <h3 class="modal-title">
            {{$user_info->person_name}} : Roles
        </h3>
    </div>
    <div class="modal-body">
        <form id="aRoles" action="{{url('user/add_role')}}" method="POST" class="aRolesForm">
            @csrf
            <div class="card">
                <div class="card-body table-responsive p-0" style="height: 300px;">
                    <table id="user_roles_data" class="table table-head-fixed text-nowrap">
                        <thead>
                            <tr>
                                <th>{{__('Elegir')}}</th>
                                <th>{{__('Descripción del rol')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rolelist as $role)
                            <tr>
                                <td>
                                    <input value="{{$role->role_id}}" type="checkbox" class="control-form" name="role[]" />
                                </td>
                                <td>
                                    {{$role->role_description}}
                                </td>
                            </tr>
                            @endforeach
                            <input value="{{$user_info->user_id}}" type="hidden" class="control-form" name="user_id">
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button id="sendRoles" disabled type="submit" class="btn-secondary btn-sm sendRoles float-right" data-toggle="tooltip" data-bs-placement="right">
                        <i class="bi bi-plus-square-fill"></i> Guardar
                    </button>
                </div>
                <div class="col-2">
                    <button type="button" class="btn-danger btn-sm float-right" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    //check role selection
    var roleCheckBoxes = document.querySelectorAll('input[type=checkbox]');
    var roleSubmit = document.querySelector('#sendRoles');

    function checkRoleCheckBoxes() {
        let checked = false;

        roleCheckBoxes.forEach(checkbox => {
            if (checkbox.checked) {
                checked = true;
            }
        });
        if (checked) {
            roleSubmit.disabled = false;
            roleSubmit.classList.remove('btn-secondary');
            roleSubmit.classList.add('btn-success');
        } else {
            roleSubmit.disabled = true;
            roleSubmit.classList.add('btn-secondary');
            roleSubmit.classList.remove('btn-success');
        }
    }
    roleCheckBoxes.forEach(checkbox => {
        checkbox.addEventListener('change', checkRoleCheckBoxes)
    });
</script>

