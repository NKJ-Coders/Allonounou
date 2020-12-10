// ******************* Input Telephone 1***********************
var input2 = document.querySelector('#phone2');
var valiMsg2 = document.querySelector('#valid-msg2');
var errorMsg2 = document.querySelector('#error-msg2');

var errorMap2 = ['Numero invalide', 'Code de pays invalide', 'Trop court', 'Trop long', 'Numero invalide'];

var iti2 = new window.intlTelInput(input2, {
    // onlyCountries: ['cm'],
    initialCountry: 'cm',
    utilsScript: '../js/utils.js'
});

var reset2 = function () {
    input2.classList.remove("error");
    errorMsg2.innerHTML = "";
    errorMsg2.classList.add('hide');
    valiMsg2.classList.add('hide');
}

input2.addEventListener('blur', function () {
    reset2();
    if (input2.value.trim()) {
        if (iti2.isValidNumber()) {
            valiMsg2.classList.remove('hide');
        } else {
            input2.classList.add('error');
            var errorCode2 = iti2.getValidationError();
            errorMsg2.innerHTML = errorMap2[errorCode2];
            errorMsg2.classList.remove('hide');
        }
    }
});

input2.addEventListener('change', reset2);
input2.addEventListener('keyup', reset2);
