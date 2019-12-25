
function showHidePassword() {
    let password = document.getElementById("password");

    if (password.type === "password") {
        password.type = "text";
        $("#show").hide();
        $("#hide").show();
    } else {
        password.type = "password";
        $("#show").show();
        $("#hide").hide();
    }
}

function showHidePasswordConfirm() {
    let passwordConfirm = document.getElementById("password-confirm");
    if (passwordConfirm.type === "password") {
        passwordConfirm.type = "text";
        $("#show_confirm").hide();
        $("#hide_confirm").show();
    } else {
        passwordConfirm.type = "password";
        $("#show_confirm").show();
        $("#hide_confirm").hide();
    }
}
