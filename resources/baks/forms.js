const { default: Swal } = require("sweetalert2");

const inputs = document.querySelectorAll("#forms input");

const patterns = {
    // onlyletters: /^[A-Za-zÀ-ÿ]+$/,
    user: /^[a-zA-Z0-9]{4,16}$/,
    onlyletters: /^[a-zA-ZÀ-ÿ\s]+$/,
    password: /^.{8,20}$/, // 4 a 12 digitos.
    email: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
    phone_number: /^\d{7,14}$/,
    iddoc: /^(?:\d{8}|\d{20})$/,
};

const validate = (e) => {
    switch (e.target.name) {
        case "country":
            validationField(patterns.onlyletters, e.target, "country");
            break;
        case "department":
            validationField(patterns.onlyletters, e.target, "department");
            break;
        case "municipality":
            validationField(patterns.onlyletters, e.target, "municipality");
            break;
        case "edit_country":
            validationField(patterns.onlyletters, e.target, "country");
            break;
        case "name":
            validationField(patterns.onlyletters, e.target, "name");
            break;
        case "surname":
            validationField(patterns.onlyletters, e.target, "surname");
            break;
        case "email":
            validationField(patterns.email, e.target, "email");
            break;
        case "iddoc":
            validationField(patterns.iddoc, e.target, "iddoc");
            break;
        case "password":
            validationField(patterns.password, e.target, "password");
            break;
        case "phone":
            validationField(patterns.phone_number, e.target, "phone");
            break;
    }
};

const validationField = (expresion, input, field) => {
    if (expresion.test(input.value)) {
        document
            .getElementById(`group__${field}`)
            .classList.remove("forms__group-incorrect");
        document
            .getElementById(`group__${field}`)
            .classList.add("forms__group-correct");
        document
            .querySelector(`#group__${field} i`)
            .classList.remove("bi-x-circle-fill");
        document
            .querySelector(`#group__${field} i`)
            .classList.add("bi-check-circle-fill");
        document
            .querySelector(`#group__${field} .forms__input-error`)
            .classList.remove("forms__input-error-active");
    } else {
        document
            .getElementById(`group__${field}`)
            .classList.add("forms__group-incorrect");
        document
            .getElementById(`group__${field}`)
            .classList.remove("forms__group-correct");
        document
            .querySelector(`#group__${field} i`)
            .classList.add("bi-x-circle-fill");
        document
            .querySelector(`#group__${field} i`)
            .classList.remove("bi-check-circle-fill");
        document
            .querySelector(`#group__${field} .forms__input-error`)
            .classList.add("forms__input-error-active");
    }
};
inputs.forEach((input) => {
    input.addEventListener("keyup", validate);
    input.addEventListener("blur", validate);
});

// addmodal.addEventListener("hidden.bs.modal", resetform);
// editmodal.addEventListener("hidden.bs.modal", resetaform);

// forms.addEventListener("submit", (e) => {
//     e.preventDefault();
// });

