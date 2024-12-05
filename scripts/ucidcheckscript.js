function check() {
    var input = document.getElementById("ucid").value;
    var pattern = /([A-Za-z]+)([0-9]{1,3}$)/;
    var ucids = ["jtd43", "jt232", "j62", "ab32", "ab389", "ea23", "sc43", "shg8"];
    if(input.match(pattern))
    {
        var valid = false;
        for(let i = 0; i<ucids.length; i++)
        {
            if(ucids[i] == input)
            {
                alert("VALID UCID FORMAT AND UCID FOUND");
                valid = true;
                break;
            }
        }
        if(!valid)
        {
            alert("VALID UCID FORMAT BUT INVALID UCID");
        }
    }
    else
    {
        alert("UCID DOES NOT CONFORM TO VALID FORMAT");
    }
}