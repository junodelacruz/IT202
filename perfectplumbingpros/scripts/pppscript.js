//email require
const checkbox = document.getElementById("confirm");
const email = document.getElementById("emailDiv");
const emailInput = document.getElementById("email");

//validation and verification
const password = document.getElementById("password");
const idNum = document.getElementById("idnumber");
const phoneNumber = document.getElementById("phonenumber");
let emailRequired = false;

function Plumber(firstname, lastname, password, id, phonenumber, email){
    this.firstname = firstname;
    this.lastname = lastname;
    this.password = password;
    this.id = id;
    this.phonenumber = phonenumber;
    this.email = email;
}

const plumbers = [new Plumber("John","Doe","Joh1!","1234","2011234567","johndoe@mail.com"),
                new Plumber("Jane", "Smith", "X2y@z", "2345", "5552345678", "jane.smith@mail.com"),
                new Plumber("Mike", "Johnson", "Q3r$s", "3456", "5553456789", "mike.johnson@mail.com"),
                new Plumber("Emily", "Davis", "R4t&u", "4567", "5554567890", "emily.davis@mail.com"),
                new Plumber("Chris", "Brown", "S5v#w", "5678", "5555678901", "chris.brown@mail.com"),
                new Plumber("Sarah", "Jones", "T6x@y", "6789", "5556789012", "sarah.jones@mail.com"),
                new Plumber("David", "Garcia", "U7z%a", "7890", "5557890123", "david.garcia@mail.com"),
                new Plumber("Laura", "Martinez", "V8b^c", "8901", "5558901234", "laura.martinez@mail.com"),
                new Plumber("James", "Lopez", "W9d&e", "9012", "5559012345", "james.lopez@mail.com"),
                new Plumber("Linda", "Wilson", "Y0f@h", "0123", "5550123456", "linda.wilson@mail.com"),
];

function check()
{
    if(validation())
    {
        verification();
    }
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
        password.select();
    }
    else if(!idNum.value.match(/^.{4}$/))
    {
        alert("ID Number must contain 4 characters. EX) '1234'");
        idNum.select();
    }
    else if(!phoneNumber.value.match(/^(?:\d[ -]?){10}$/))
    {
        alert("Phone number must contain 10 digits, and can be separated with spaces or dashes. EX) '201-321 3241'")
        phoneNumber.select();
    }
    else if(emailRequired == true)
    {
        if(!emailInput.value.match(/@([a-zA-Z]{2,4})\./))
            {
                alert("Email must have an @ followed by 2 to 4 characters for the domain and a period. EX) 'johndoe@gmai.com'")
                emailInput.select();
            }
    }
    else
    {
        return true;
    }
    event.preventDefault();
}

function verification(){
    let found = false;
    for(let i = 0; i < plumbers.length; i++)
    {
        if(document.getElementById("lastname").value == plumbers[i].lastname && document.getElementById("firstname").value == plumbers[i].firstname && password.value == plumbers[i].password && idNum.value == plumbers[i].id && phoneNumber.value == plumbers[i].phonenumber)
        {
                if(emailRequired == true)
                {
                    if(emailInput.value == plumbers[i].email)
                    {
                        alert("Welcome, " + document.getElementById("firstname").value + " " + document.getElementById("lastname").value + "! Transaction chosen: " + document.getElementById("transaction").value);
                        found = true;
                    }
                }
                alert("Welcome, " + document.getElementById("firstname").value + " " + document.getElementById("lastname").value + "! Transaction chosen: " + document.getElementById("transaction").value);
                found = true;
        }
        else
        {
            continue;
        }
    }

    if(!found)
    {
        alert("Account not found!");
    }

    event.preventDefault();
}
