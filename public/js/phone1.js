// ******************* input4 Telephone 1***********************
var input4 = document.querySelector('#Telephone1');
var valiMsg4 = document.querySelector('#valid-msg11');
var errorMsg4 = document.querySelector('#error-msg11');

var errorMap4 = ['Numero invalide', 'Code de pays invalide', 'Trop court', 'Trop long', 'Numero invalide'];

var iti4 = new window.intlTelInput(input4, {
    onlyCountries: ['cm'],
    initialCountry: 'cm',
    utilsScript: '../js/utils.js'
});

var reset4 = function () {
    input4.classList.remove("error");
    errorMsg4.innerHTML = "";
    errorMsg4.classList.add('hide');
    valiMsg4.classList.add('hide');
}

input4.addEventListener('blur', function () {
    reset4();
    if (input4.value.trim()) {
        if (iti4.isValidNumber()) {
            valiMsg4.classList.remove('hide');
        } else {
            input4.classList.add('error');
            var errorCode4 = iti4.getValidationError();
            errorMsg4.innerHTML = errorMap4[errorCode4];
            errorMsg4.classList.remove('hide');
        }
    }
});

input4.addEventListener('change', reset4);
input4.addEventListener('keyup', reset4);
