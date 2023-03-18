const patterns = {
    // onlyletters: /^[A-Za-zÀ-ÿ]+$/,
    user: /^[a-zA-Z0-9]{4,16}$/,
    onlyletters: /^[(a-zA-ZÀ-ÿ)+\s?]+$/,
    words: /([A-Za-z]+ )+[A-Za-z]+$|^[A-Za-z]+$/,
    // password: /^[A-Za-z0-9+_%@!$*~-]$/, // 4 a 12 digitos.
    email: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
    phone_number: /^\d$/,
    iddoc: /^(?:\d{8}|\d{20})$/,
};

function alphaonlyinput(event) {
    var value = String.fromCharCode(event.which);
    var pattern = patterns.onlyletters;
    return pattern.test(value);
}

$("#acountry").bind("keypress", alphaonlyinput);
$("#adepartment").bind("keypress", alphaonlyinput);
$("#amunicipality").bind("keypress", alphaonlyinput);
$("#ucountry").bind("keypress", alphaonlyinput);
$("#udepartment").bind("keypress", alphaonlyinput);
$("#umunicipality").bind("keypress", alphaonlyinput);

var apasswordinput = document.getElementById("apassword");
apasswordinput.setAttribute("minlength", "8");
apasswordinput.setAttribute("maxlength", "20");
apasswordinput.setAttribute("disallowedwords", "{{username}}");

var anumericinput = document.getElementById("astate");
// apasswordinput.setAttribute("patterns", );

$(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
    $(document).click(function () {
        $('[data-toggle="tooltip"]').tooltip("hide");
    });
});


// $(document).ready(function() {
//     // Validar el formulario con Bootstrap
//     $('#aform').validate();

//     // Mostrar la alerta de SweetAlert2 al enviar el formulario
//     $('#aform').submit(function(event) {
//       event.preventDefault(); // Evitar el envío del formulario

//       if ($('#aform').valid()) {
//         // Mostrar la alerta de SweetAlert2
//         Swal.fire({
//           title: '¿Estás seguro?',
//           text: '¿Quieres enviar el formulario?',
//           icon: 'warning',
//           showCancelButton: true,
//           confirmButtonText: 'Sí, enviar',
//           cancelButtonText: 'Cancelar'
//         }).then((result) => {
//           if (result.isConfirmed) {
//             // Enviar el formulario
//             $('#aform').off('submit').submit();
//           }
//         });
//       } else {
//         // Mostrar un mensaje de error si el formulario no es válido
//         Swal.fire({
//           title: 'Error',
//           text: 'Completa los campos requeridos antes de enviar el formulario.',
//           icon: 'error',
//           confirmButtonText: 'Aceptar'
//         });
//       }
//     });
//   });
