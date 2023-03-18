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

function alphaOnly(event) {
    var key = event.keyCode;
    `enter code here`;
    return (key >= 65 && key <= 90) || key == 8;
}

inputs.forEach((input) => {
    input.addEventListener("keyup", validate);
    input.addEventListener("blur", validate);
});

// addmodal.addEventListener("hidden.bs.modal", resetform);
// editmodal.addEventListener("hidden.bs.modal", resetaform);

// forms.addEventListener("submit", (e) => {
//     e.preventDefault();
// });

