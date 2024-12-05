$("#chatbox").keyup(function() {
    $.post("updatemessage.php",
        {
            message: $("#chatbox").val(),
            username: $("#username").val(),
            password: $("#password").val()
        },
        function(response) {
            $("#check").html(response);
        }
    )
});
