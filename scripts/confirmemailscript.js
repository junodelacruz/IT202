var emailMsg = $("#emailMsg");
var confirmMsg = $("#confirmMsg");

function check() {
    var emailVal = $("#email").val();
    var confirmVal = $("#confirm").val();

    if(emailVal == "") {
        emailMsg.html("This is a required field.");
    }
    else {
        emailMsg.html("");
    }

    if(confirmVal == "") {
        confirmMsg.html("This is a required field.");
    }
    else {
        confirmMsg.html("");
    }

    if(emailVal == confirmVal && confirmVal != "" && emailVal != "") {
        alert("Email confirmation successful");
    }
    else if(emailVal != confirmVal) {
        confirmMsg.html("The email addresses must match.");
    }
}