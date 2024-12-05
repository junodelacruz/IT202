function hideShow(){
    var input = document.getElementById("input");
    if(input.type === "password")
    {
        input.type = "text";
        input.style = "background-color: rgb(237, 237, 255)";
    }
    else
    {
        input.type = "password";
        input.style = "background-color: rgb(211, 245, 211)";
    }
}