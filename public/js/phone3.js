// ******************* input6 Telephone 3***********************
var input6 = document.querySelector('#telephone3');
var valiMsg6 = document.querySelector('#valid-msg31');
var errorMsg6 = document.querySelector('#error-msg31');

var errorMap6 = ['Numero invalide', 'Code de pays invalide', 'Trop court', 'Trop long', 'Numero invalide'];

var iti6 = new window.intlTelInput(input6, {
    onlyCountries: ['cm'],
    initialCountry: 'cm',
    utilsScript: '../js/utils.js'
});

var reset6 = function () {
    input6.classList.remove("error");
    errorMsg6.innerHTML = "";
    errorMsg6.classList.add('hide');
    valiMsg6.classList.add('hide');
}

input6.addEventListener('blur', function () {
    reset6();
    if (input6.value.trim()) {
        if (iti6.isValidNumber()) {
            valiMsg6.classList.remove('hide');
        } else {
            input6.classList.add('error');
            var errorCode6 = iti6.getValidationError();
            errorMsg6.innerHTML = errorMap6[errorCode6];
            errorMsg6.classList.remove('hide');
        }
    }
});

input6.addEventListener('change', reset6);
input6.addEventListener('keyup', reset6);
