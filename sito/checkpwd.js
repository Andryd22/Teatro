function verificaPassword() {

    var pwd = this.password;

    var minuscolo = document.getElementById("minuscolo");
    var maiuscolo = document.getElementById("maiuscolo");
    var numero = document.getElementById("numero");
    var carspeciale = document.getElementById("carspeciale");

    // valida le lettere minuscole
    var lettereminuscole = /[a-z]/g;
    if(pwd.value.match(lettereminuscole)) {
        minuscolo.classList.remove("invalid");
        minuscolo.classList.add("valid");
    } 
    else {
        minuscolo.classList.remove("valid");
        minuscolo.classList.add("invalid");
    }

    // valida le lettere maiuscole
    var letteremaiuscole = /[A-Z]/g;
    if(pwd.value.match(letteremaiuscole)) {
        maiuscolo.classList.remove("invalid");
        maiuscolo.classList.add("valid");
    } 
    else {
        maiuscolo.classList.remove("valid");
        maiuscolo.classList.add("invalid");
    }

    // valida i numeri
    var numeri = /[0-9]/g;
    if(pwd.value.match(numeri)) {
        numero.classList.remove("invalid");
        numero.classList.add("valid");
    } 
    else {
        numero.classList.remove("valid");
        numero.classList.add("invalid");
    }

    // valida i caratteri speciali
    var carspec = /[?!*-.]/g;
    if(pwd.value.match(carspec)) {
        carspeciale.classList.remove("invalid");
        carspeciale.classList.add("valid");
    } 
    else {
        carspeciale.classList.remove("valid");
        carspeciale.classList.add("invalid");
    }

}

function verificaEmail(input) {

    var caratteri = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
  
    if(input.value.match(caratteri)) {
        return true;
    } 
    else {
        alert("Indirizzo email invalido!");   
        return false;
    }
}

function verificaCampi() {
  
    var campopwd1 = document.getElementById("password").value;
    var campopwd2 = document.getElementById("password2").value;
    var campoemail = document.getElementById("email");

    var ok = true;

    if (verificaEmail(campoemail) === false) {
        ok = false;
    }

    if (verificaPassword()) {
        ok = false;    
    }

    if (campopwd1 != campopwd2) {
        alert("Le password non sono identiche!");     
        ok = false;      
    }

    var pattern = new RegExp(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]).{6,}$/);
    if(pattern.test(campopwd1) === false){
        alert("La password non è abbastanza complessa!");     
        ok = false;    
   }
   
   return ok;    

}