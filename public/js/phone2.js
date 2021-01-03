// ******************* input5 Telephone 2***********************
var input5 = document.querySelector('#telephone2');
var valiMsg5 = document.querySelector('#valid-msg21');
var errorMsg5 = document.querySelector('#error-msg21');

var errorMap5 = ['Numero invalide', 'Code de pays invalide', 'Trop court', 'Trop long', 'Numero invalide'];

var iti5 = new window.intlTelInput(input5, {
    onlyCountries: ['cm'],
    initialCountry: 'cm',
    utilsScript: '../js/utils.js'
});

var reset5 = function () {
    input5.classList.remove("error");
    errorMsg5.innerHTML = "";
    errorMsg5.classList.add('hide');
    valiMsg5.classList.add('hide');
}

input5.addEventListener('blur', function () {
    reset5();
    if (input5.value.trim()) {
        if (iti5.isValidNumber()) {
            valiMsg5.classList.remove('hide');
        } else {
            input5.classList.add('error');
            var errorCode5 = iti5.getValidationError();
            errorMsg5.innerHTML = errorMap5[errorCode5];
            errorMsg5.classList.remove('hide');
        }
    }
});

input5.addEventListener('change', reset5);
input5.addEventListener('keyup', reset5);
