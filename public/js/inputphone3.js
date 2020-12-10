// ******************* input3 Telephone 1***********************
var input3 = document.querySelector('#phone3');
var valiMsg3 = document.querySelector('#valid-msg3');
var errorMsg3 = document.querySelector('#error-msg3');

var errorMap3 = ['Numero invalide', 'Code de pays invalide', 'Trop court', 'Trop long', 'Numero invalide'];

var iti3 = new window.intlTelInput(input3, {
    // onlyCountries: ['cm'],
    initialCountry: 'cm',
    utilsScript: '../js/utils.js'
});

var reset3 = function () {
    input3.classList.remove("error");
    errorMsg3.innerHTML = "";
    errorMsg3.classList.add('hide');
    valiMsg3.classList.add('hide');
}

input3.addEventListener('blur', function () {
    reset3();
    if (input3.value.trim()) {
        if (iti3.isValidNumber()) {
            valiMsg3.classList.remove('hide');
        } else {
            input3.classList.add('error');
            var errorCode3 = iti3.getValidationError();
            errorMsg3.innerHTML = errorMap3[errorCode3];
            errorMsg3.classList.remove('hide');
        }
    }
});

input3.addEventListener('change', reset3);
input3.addEventListener('keyup', reset3);
