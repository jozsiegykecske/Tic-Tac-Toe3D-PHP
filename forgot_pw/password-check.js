let pw1 = document.getElementById('pw');
let pw2 = document.getElementById('confirm');
let button = document.getElementById('button');
button.disabled = true;
let pwtext = document.getElementById('password-feedback');
let title = document.getElementById('title');
if (!title.innerHTML.includes("password") && !title.innerHTML.includes("felhasználó")) {
    let form = document.getElementById('form');
    form.style.display="none";
}
let lang;
if (title.innerHTML.includes("felhasználó")) {
    lang = 1;
}
else {
    lang = 0;
}
function Verify_submit(){
    if(pw1.value != "" && pw2.value != ""){
        if (pw1.value == pw2.value) {
            button.disabled = false;
            if (lang == 1) {
                pwtext.innerText = "A jelszavak egyeznek!";
            }
            else{
                pwtext.innerText = "Passwords match!";
            }
            pwtext.style.color = "greenyellow";
        }
        else{
            button.disabled = true;
            if (lang == 1) {
                pwtext.innerText = "A jelszavak nem egyeznek!";
            }
            else{
                pwtext.innerText = "Passwords don't match!";
            }
            pwtext.style.color = "yellow";
        }
    }
    else{
        if (lang == 1) {
            pwtext.innerText = "Mindkét mező kitöltése kötelező!";
        }
        else{
            pwtext.innerText = "Both fields are required!";
        }
        button.disabled = true;
        pwtext.style.color = "crimson";
    }
    
}