var pwd = document.getElementById("password");
var minuscolo = document.getElementById("minuscolo");
var maiuscolo = document.getElementById("maiuscolo");
var numero = document.getElementById("numero");
var carspeciale = document.getElementById("carspeciale");


myInput.onkeyup = function() {
    
    // valida le lettere minuscole
    var lettereminuscole = /[a-z]/g;
    if(myInput.value.match(lettereminuscole)) {
        minuscolo.classList.remove("invalid");
        minuscolo.classList.add("valid");
    } 
    else {
        minuscolo.classList.remove("valid");
        minuscolo.classList.add("invalid");
    }

    // valida le lettere maiuscole
    var letteremaiuscole = /[A-Z]/g;
    if(myInput.value.match(letteremaiuscole)) {
        maiuscolo.classList.remove("invalid");
        maiuscolo.classList.add("valid");
    } 
    else {
        maiuscolo.classList.remove("valid");
        maiuscolo.classList.add("invalid");
    }

    // valida i numeri
    var numeri = /[0-9]/g;
    if(myInput.value.match(numeri)) {
        numero.classList.remove("invalid");
        numero.classList.add("valid");
    } 
    else {
        numero.classList.remove("valid");
        numero.classList.add("invalid");
    }

    // valida i caratteri speciali
    var carspec = /[?!*-.]/g;
    if(myInput.value.match(carspec)) {
        carspeciale.classList.remove("invalid");
        carspeciale.classList.add("valid");
    } 
    else {
        carspeciale.classList.remove("valid");
        carspeciale.classList.add("invalid");
    }
}
