let form = document.querySelector('#form');
let tel = document.querySelector('.phone3');

// form.email.addEventListener('keyup', function () {
//     validEmail(this);
// });

form.password.addEventListener('keyup', function () {
    validPassword(this);
});

form.telephone1.addEventListener('keyup', function() {
    validPhone(this);
});

form.telephone2.addEventListener('keyup', function() {
    validPhone(this);
});

tel.addEventListener('keyup', function() {
    validPhone(this);
});

form.password_confirmation.addEventListener('keyup', function () {
    let small = this.nextElementSibling;

    if (this.value === form.password.value) {
        small.innerHTML = '<i class="icon-ok"></i> Les deux mots de passe sont similaires';
        small.setAttribute('class', 'text-success');
    }
    else {
        small.innerHTML = '<i class="icon-remove"></i> Les deux mots de passe doivent être similaires';
        small.setAttribute('class', 'text-danger');
    }
});

// envoi du formulaire
form.addEventListener('submit', function (e) {
    e.preventDefault();
    if (validEmail(form.email) && validPassword(form.password) && validPhone(form.telephone1) && validPhone(form.telephone2)) {
        form.submit()
    }
});

// ################### VALIDATION EMAIL #########################
const validEmail = function(inputEmail) {
    let emailRegExp = new RegExp(
        '^[a-zA-Z0-9.-_]+[@]{1}[a-zA-Z0-9.-_]+[.]{1}[a-z]{2,10}$', 'g'
    );

    let small = inputEmail.nextElementSibling; // recupere la balise <small></small> juste apres inputEmail

    if (emailRegExp.test(inputEmail.value)) {
        small.innerHTML = '<i class="icon-ok"></i> Adresse valide';
        small.setAttribute('class', 'text-success');
        return true;
    }
    else {
        small.innerHTML = '<i class="icon-remove"></i> Adresse non valide';
        small.setAttribute('class', 'text-danger');
        return false;
    }
}

// ################### VALIDATION PASSWORD #########################
const validPassword = function (inputPassword) {
    let msg;
    let valid = false;

    // au moins 8 caracteres
    if (inputPassword.value.length < 8) {
        msg = '<i class="icon-remove"></i> Le mot de passe doit contenir au moins 8 caractères';
    }
    // au moins une majiscules
    else if (!/[A-Z]/.test(inputPassword.value)) {
        msg = '<i class="icon-remove"></i> Le mot de passe doit contenir au moins une majiscule';
    }
    // au moins une miniscule
    else if (!/[a-z]/.test(inputPassword.value)) {
        msg = '<i class="icon-remove"></i> Le mot de passe doit contenir au moins une miniscule';
    }
    // au moins 1 chiffre
    else if (!/[0-9]/.test(inputPassword.value)) {
        msg = '<i class="icon-remove"></i> Le mot de passe doit contenir au moins un chiffre';
    }
    // mot de passe valide
    else {
        valid = true;
    }

    let small = inputPassword.nextElementSibling; // recupere la balise <small></small> juste apres inputPassword

    if (valid) {
        small.innerHTML = '<i class="icon-ok"></i> Mot de passe valide';
        small.setAttribute('class', 'text-success');
        return true;
    }
    else {
        small.innerHTML = msg;
        small.setAttribute('class', 'text-danger');
        return false;
    }
}

// ################### VALIDATION PHONE #########################
const validPhone = function (inputTelephone) {
    let telephoneRegExp = new RegExp(
        '^[6]{1}[56789]{1}[0-9]{7}$', 'g'
    );

    let small = inputTelephone.nextElementSibling; // recupere la balise <small></small> juste apres inputTelephone

    if (telephoneRegExp.test(inputTelephone.value)) {
        small.innerHTML = '<i class="icon-ok"></i> Numéro de téléphone valide';
        small.setAttribute('class', 'text-success');
        return true;
    }
    else {
        small.innerHTML = '<i class="icon-remove"></i> Numéro de téléphone invalide';
        small.setAttribute('class', 'text-danger');
        return false;
    }
}

form.email.addEventListener('keyup', function () {
    validEmail(this);
});
