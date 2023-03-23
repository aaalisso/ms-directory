# Iniciar proyecto

Para poner en marcha el proyecto se deben ejecutar los siguientes comandos:

* npm install

* composer install

* php artisan migrate

* php artisan db:seed UbigeoSeeder

* php artisan db:seed InstitutionSeeder

* php artisan db:seed PersonSeeder

* php artisan db:seed UserSeeder

* php artisan serve


# MS-Directory
Sistema de Marketing módulo Directorio, podrá realizar las funciones de vizualizar, agregar, editar y eliminar registros en las cinco tablas presentes en la base de datos. Entre las opciones disponibles estan:
1. [Ubigeo](#Ubigeo)
2. [Personas](#Personas)
3. [Instituto-Persona](#Instituto-Persona)
4. [Usuarios](#Usuarios)
5. [Institución](#Institución)
## Vistas del sistema Usuario Administrador
* Se dispone del menú opciones en el lateral izquierdo, la barra de navegación en la parte superior de la pantalla
<p align="center"><img src="public/assets/01main_portal.png" width="80%"><br>
Pantalla principal de la vista del administrador</p>

## 
* Se muestra el formulario con las credenciales **email** y **contraseña**
<p align="center"><img src="public/assets/02login_view.png" width="80%"><br>
Vista de inicio de sesión</p>

## 
* Se muestra el formulario para el registro de una nueva persona y usuario.
<p align="center"><img src="public/assets/03register_view.png" width="80%"><br>
Vista de registro</p>

# Ubigeo
* Se muestra los registros de la tabla *ubigeo y se dividen en paginas de 5 registros.
<p align="center"><img src="public/assets/04ubigeo_view.png" width="80%"><br></p>

### Agregar Ubigeo
* Se muestra el formulario para registrar los datos de un nuevo ubigeo.
<p align="center"><img src="public/assets/05add_ubigeo_view.png" width="80%"><br></p>

### Editar ubigeo
* Se muestra el formulario para modificar los datos de un ubigeo existente.
<p align="center"><img src="public/assets/06edit_ubigeo_view.png" width="80%"><br>
Vista de editar ubigeo</p>

### Eliminar ubigeo
* Se despliega una ventaja de confirmación para confirmar el borrado del registro.
<p align="center"><img src="public/assets/07delete_ubigeo_view.png" width="80%"><br></p>

# persona
* Se muestran los registros de la tabla personas.
<p align="center"><img src="public/assets/08person_view.png" width="80%"><br></p>

## agregar persona
* Se despliega un formulario con los datos necesarios para agregar un registro.
<p align="center"><img src="public/assets/09add_person_view.png" width="80%"><br></p>

## editar persona
* Se despliega un formulario para editar un registro de persona.
<p align="center"><img src="public/assets/10person_edit_view.png" width="80%"><br></p>

# instituto - persona
* Se muestran los registros existentes.
<p align="center"><img src="public/assets/11institution_person_view.png" width="80%"><br></p>

## agregar instituto - persona
* Se despliega un formulario para agregar un registro.
<p align="center"><img src="public/assets/12inst_person_add.png" width="80%"><br></p>

## editar instituto - persona
* Se despliega un formulario para editar un registro.
<p align="center"><img src="public/assets/13inst_person_edit.png" width="80%"><br></p>

# usuario
* Se muestran los registros de usuarios existentes.
<p align="center"><img src="public/assets/14user_view.png" width="80%"><br></p>

## agregar instituto - persona
* Se despliega un formulario para agregar un registro.
<p align="center"><img src="public/assets/15user_add.png" width="80%"><br></p>

## editar instituto - persona
* Se despliega un formulario para editar un registro.
<p align="center"><img src="public/assets/16user_edit.png" width="80%"><br></p>

# institución
* Se muestran los registros de institutos existentes.
<p align="center"><img src="public/assets/17institution_view.png" width="80%"><br></p>

## agregar institución
* Se despliega un formulario para agregar un registro.
<p align="center"><img src="public/assets/18inst_add.png" width="80%"><br></p>

## editar institución
* Se despliega un formulario para editar un registro.
<p align="center"><img src="public/assets/19inst_edit.png" width="80%"><br></p>

# Validaciones
* cada formulario cuenta con las validaciones correspondientes para que no se puedan ingresar datos inesperados en los registros.
<p align="center"><img src="public/assets/20validation.png" width="80%"><br></p>