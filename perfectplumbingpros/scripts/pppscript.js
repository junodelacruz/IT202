//email require
const checkbox = document.getElementById("confirm");
const email = document.getElementById("emailDiv");
const emailInput = document.getElementById("email");

//validation and verification
const password = document.getElementById("password");
const idNum = document.getElementById("idnumber");
const phoneNumber = document.getElementById("phonenumber");
let emailRequired = false;


function check()
{
  return validation();
}

function emailRequire() {
    if(checkbox.checked)
    {
        emailDiv.style.display = "inline";
        emailInput.required = true;
        emailRequired = true;
    }
    else
    {
        emailDiv.style.display = "none";
        emailInput.required = false;
        emailRequired = false;
    }
}

function toggle() {
    if(password.type === "password")
    {
        password.type = "text";
        document.getElementById("toggleVisibility").className = "fa fa-eye";
        password.placeholder = "hello";
    }
    else
    {
        password.type = "password";
        document.getElementById("toggleVisibility").className = "fa fa-eye-slash";
        password.placeholder = "*****";
    }
    event.preventDefault();
}

function validation(){
    if(!password.value.match(/^(?=(?:[^A-Z]*[A-Z]){1})(?=(?:[^0-9]*[0-9]){1})(?=(?:[^!@#$%^&*(),.?":{}|<>]*[!@#$%^&*(),.?":{}|<>]){1})[A-Za-z0-9!@#$%^&*(),.?":{}|<>]{1,5}$/))
    {
        alert("Password must be max 5 characters, contain at least one uppercase letter, one special character, and one number. EX) 'Joh1!'");
        return false;
        password.select();
    }
    else if(!idNum.value.match(/^.{4}$/))
    {
        alert("ID Number must contain 4 characters. EX) '1234'");
        return false;
        idNum.select();
    }
    else if(!phoneNumber.value.match(/^(?:\d[ -]?){10}$/))
    {
        alert("Phone number must contain 10 digits, and can be separated with spaces or dashes. EX) '201-321 3241'");
        return false;
        phoneNumber.select();
    }
    else if(emailRequired == true)
    {
        if(!emailInput.value.match(/@([a-zA-Z]{2,4})\./))
            {
                alert("Email must have an @ followed by 2 to 4 characters for the domain and a period. EX) 'johndoe@gmai.com'");
                return false;
                emailInput.select();
            }
    }
    return true;
    
}
