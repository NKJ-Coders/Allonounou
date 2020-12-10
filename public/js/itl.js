var input = document.querySelector('#telephone');
var valiMsg = document.querySelector('#valid-msg');
var errorMsg = document.querySelector('error-msg');

var errorMap = ['Invalid number', 'Invalid country code', 'Too short', 'Too long', 'Invalid number'];

var iti = new window.intlTelInput(input, {
    // onlyCountries: ['cm'],
    utilsScript: 'js/utils.js'
});

var reset = function () {
    input.classList.remove("error");
    errorMsg.innerHTML = "";
    errorMsg.classList.add('hide');
    valiMsg.classList.add('hide');
}

input.addEventListener('blur', function () {
    reset();
    if (input.value.trim()) {
        if (iti.isValidNumber()) {
            valiMsg.classList.remove('hide');
        } else {
            input.classList.add('error');
            var errorCode = iti.getValidationError();
            errorMsg.innerHTML = errorMap[errorCode];
            errorMsg.classList.remove('hide');
        }
    }
});

input.addEventListener('change', reset);
input.add('keyup', reset);
