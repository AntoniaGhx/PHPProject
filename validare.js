function validareFormular(formular) {

    listaErori = validareNume(formular.nume);

    listaErori += validareNume(formular.prenume);
    listaErori += validareEmail(formular.email);
    listaErori += validareParola(formular.parola);
    listaErori += validareParola(formular.confirmareparola);
    if (formular.parola.value != formular.confirmareparola.value) listaErori += "Parolele trebuie sa fie identice<br>";
    if (listaErori == "") return true;
    document.getElementById('erori').innerHTML = '<div class="alert alert-danger">' + listaErori + '</div>';
    return false;
}

function validareNume(nume) {
    if (nume.value == "") {
        nume.parentNode.classList.add("alert");
        nume.parentNode.classList.add("alert-danger");
        return "Continutul nu poate fi gol<br>";
    }
    else if (/[^a-zA-Z _-]/.test(nume.value)) {
        nume.parentNode.classList.add("alert");
        nume.parentNode.classList.add("alert-danger");
        return "Caracterele permise in <b>" + nume.name + "</b> sunt a-z, A-Z, spatii, _ si -<br>";
    }
    else {
        nume.parentNode.classList.remove("alert");
        nume.parentNode.classList.remove("alert-danger");
        return "";
    }

}

function validareEmail(email) {
    if (email.value == "") {
        email.parentNode.classList.add("alert");
        email.parentNode.classList.add("alert-danger");
        return "Continutul nu poate fi gol<br>";
    }
    else if (/[^a-z0-9A-Z.@_-]/.test(email.value) ||
        !((email.value.indexOf(".") > 0) && (email.value.indexOf("@") > 0))) {
        email.parentNode.classList.add("alert");
        email.parentNode.classList.add("alert-danger");
        console.log(email.value.indexOf("."));
        console.log(email.value.indexOf("@"));
        return "Caracterele permise in <b>" + email.name + "</b> sunt a-z, A-Z, 0-9, ., @ _ si -.<br>";
    }
    else {
        email.parentNode.classList.remove("alert");
        email.parentNode.classList.remove("alert-danger");
        return "";
    }
}

function validareParola(parola) {
    if (parola.value == "") {
        parola.parentNode.classList.add("alert");
        parola.parentNode.classList.add("alert-danger");
        return "Continutul nu poate fi gol<br>";
    }
    else if (!(/[a-z]/.test(parola.value)) || !(/[A-Z]/.test(parola.value)) || !(/[0-9]/.test(parola.value)) || !(/[!@#$%^&*()_-]/.test(parola.value))) {

        parola.parentNode.classList.add("alert");
        parola.parentNode.classList.add("alert-danger");
        return "Parola " + parola.name + " trebuie sa contina cel putin cate o litera mica, litera mare, cifra sau caracterele speciale !@#$%^&*()_-<br>";
    }
    else {
        parola.parentNode.classList.remove("alert");
        parola.parentNode.classList.remove("alert-danger");
        return "";
    }

}