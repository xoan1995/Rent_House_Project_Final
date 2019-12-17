function showHidePassword() {
    let x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

function showHidePasswordConfirm() {
    let x = document.getElementById("password-confirm");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
