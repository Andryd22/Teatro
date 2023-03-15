function validatePassword() {
    let pwd = document.getElementById('pwd-check').value;
    var min = 6;
    var max = 16;
    var caratteri  = /^[a-zA-Z0-9!?@#$%^&*]{6,16}$/;
    alert(pwd); 
    if(pwd.length < min || pwd.length > max){
        alert("la password è troppo corta o troppo lunga");
        return false;
    }
    if(!caratteri.test(pwd)) {
        alert("la password deve contenere almeno un carattere minuscolo, uno maiuscolo, uno speciale ed un numero");
        return false;
    }
}



