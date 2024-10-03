function emailRequire() {
    var checkbox = document.getElementById("confirm");
    var requireEmail = document.getElementById("requireEmail");
    var emailInput = document.getElementById("email");
    if(checkbox.checked)
    {
        requireEmail.style.display = "inline";
    }
    else
    {
        requireEmail.style.display = "none";
    }
}
