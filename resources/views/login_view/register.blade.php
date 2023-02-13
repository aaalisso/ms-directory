@extends('layout.layout')
@section('title', 'Register')
@section('content')

@if(session('status'))
<div class="alert alert-success">{{session('status')}}</div>
@endif

<div class="modal-dialog">
    <div class="card">
        <div class="forms__content">
            <h3 class="card-header">Register</h3>
            <form action="{{url ('add-register') }}" class="forms" name="forms" id="forms" method="POST">
                @csrf
                <!-- Group: name -->
                <div class="forms__group" id="group__name">
                    <label for="name" class="forms__label">{{__('Name')}}</label>
                    <div class="forms__group-input">
                        <input type="text" class="forms__input upcase" name="name" id="name" autocapitalize="on">
                        <i class="forms__validation-state bi bi-x-circle-fill"></i>
                    </div>
                    <p class="forms__input-error">Este campo solo puede contener letras</p>
                </div>
                <!-- Group: surname -->
                <div class="forms__group" id="group__surname">
                    <label for="surname" class="forms__label">{{__('Surename')}}</label>
                    <div class="forms__group-input">
                        <input type="text" class="forms__input upcase" name="surname" id="surname">
                        <i class="forms__validation-state bi bi-x-circle-fill"></i>
                    </div>
                    <p class="forms__input-error">Este campo solo puede contener letras</p>
                </div>
                <!-- Group: identity document -->
                <div class="forms__group" id="group__iddoc">
                    <label for="iddoc" class="forms__label">{{__('id Document Number')}}</label>
                    <div class="forms__group-input">
                        <input type="text" class="forms__input" name="iddoc" id="iddoc">
                        <i class="forms__validation-state bi bi-x-circle-fill"></i>
                    </div>
                    <p class="forms__input-error">Este campo solo acepta números</p>
                </div>
                <!-- Group: phone -->
                <div class="forms__group" id="group__phone">
                    <label for="phone" class="forms__label">{{__('Phone')}}</label>
                    <div class="forms__group-input">
                        <input type="tel" class="forms__input" name="phone" id="phone" placeholder="999-888-777">
                        <i class="forms__validation-state bi bi-x-circle-fill"></i>
                    </div>
                    <p class="forms__input-error">Debes ingresar un número de teléfono valido</p>
                </div>
                <!-- Group: email -->
                <div class="forms__group" id="group__email">
                    <label for="email" class="forms__label">{{__('Email')}}</label>
                    <div class="forms__group-input">
                        <input type="text" class="forms__input" name="email" id="email" placeholder="usuario@domain.nnn">
                        <i class="forms__validation-state bi bi-x-circle-fill"></i>
                    </div>
                    <p class="forms__input-error">Debes ingresar un correo electrónico valido</p>
                </div>
                <!-- Group: password -->
                <div class="forms__group" id="group__password">
                    <label for="password" class="forms__label">{{__('Password')}}</label>
                    <div class="forms__group-input">
                        <input type="password" class="forms__input" name="password" id="password" placeholder="***********" maxlength="20" autocomplete="">
                        <i class="forms__validation-state bi bi-x-circle-fill"></i>
                    </div>
                    <p class="forms__input-error">La contraseña debe tener entre 8 y 20 caracteres</p>
                </div>
                <!-- Group: address -->
                <div class="forms__group  forms__address" id="group__address">
                    <label for="address" class="forms__label">{{__('Address')}}</label>
                    <div class="forms__group-input">
                        <input type="text" class="forms__input" maxlength="100" name="address" id="address">
                        <i class="forms__validation-state bi bi-x-circle-fill"></i>
                    </div>
                    <p class="forms__input-error">La contraseña debe tener entre 8 y 20 caracteres</p>
                </div>
                <!-- Group: Web Page -->
                <div class="forms__group" id="group__web_page">
                    <label for="web_page" class="forms__label">{{__('Web page')}}</label>
                    <div class="forms__group-input">
                        <input type="text" class="forms__input" name="web_page" id="web_page" placeholder="www.cti.domain.nnn">
                        <i class="forms__validation-state bi bi-x-circle-fill"></i>
                    </div>
                    <p class="forms__input-error">Debes ingresar un dirección valida</p>
                </div>
                <!-- Group: Profile_Picture -->
                <div class="forms__group" id="group__profile_picture">
                    <label for="profile_picture" class="forms__label">{{__('Profile picture')}}</label>
                    <div class="forms__group-input">
                        <input type="text" class="forms__input" name="profile_picture" id="profile_picture" placeholder="www.cti.domain.nnn">
                        <i class="forms__validation-state bi bi-x-circle-fill"></i>
                    </div>
                    <p class="forms__input-error">Debes ingresar un dirección valida</p>
                </div>
                <!-- Group: birthday date -->
                <div class="forms__group" id="group__birthday">
                    <label for="birthday" class="forms__label">{{__('birthday')}}</label>
                    <div class="forms__group-input">
                        <input type="date" class="forms__input" name="birthday" id="birthday">
                        <i class="forms__validation-state bi bi-x-circle-fill"></i>
                    </div>
                    <p class="forms__input-error">selecciona una fecha</p>
                </div>
                <!-- Group: Error Message -->
                <div class="forms__message" id="forms_message">
                    <p><i class="exclamation-icon bi bi-exclamation-octagon-fill"></i>
                        <b>Error:</b>
                        Por favor complete correctamente los campos.
                    </p>
                </div>
                <!-- Group: Ubigeo -->
                <div class="forms__group" id="group__ubigeo">
                    <label for="ubigeo" class="forms__label">{{__('Ubigeo')}}</label>
                    <div class="forms__group-input">
                        <select type="text" class="forms__input" name="ubigeo" id="ubigeo">
                            <option selected>Select</option>
                            @foreach($data as $data)
                            <option value="{{$data->ubigeo_id}}">{{$data->ubigeo}}</option>
                            @endforeach
                        </select>
                        <!-- <input type="text" class="forms__input" name="ubigeo_id" id="ubigeo_id"> -->
                        <i class="forms__validation-state bi bi-x-circle-fill"></i>
                    </div>
                    <p class="forms__input-error">Debes ingresar un dirección valida</p>
                </div>
                <!-- Group: Buttons -->
                <div class="forms__group forms__group-btn-submit">
                    <p class="forms__message-success" id="forms__message-success">success</p>
                    <button type="submit" class="forms__btn forms__btn-fixed">{{__('Register')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@vite(['resources/js/forms.js'])

@endsection