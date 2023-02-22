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