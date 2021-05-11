// Login error
var username = document.getElementById("username");
var userInput = document.getElementById("userInput")
var passwordError = document.getElementById("passwordError");
var passInput = document.getElementById("passInput");


function errorValidate() {
    if (userInput.value == '') {
        username.innerHTML = "U moet nog een gebruikersnaam invoeren!";
        return false;
    }
    if (passInput.value == '') {
        passwordError.innerHTML = "U moet nog een wachtwoord invoeren!";
        return false;
    } else {
        return true;
    }
}