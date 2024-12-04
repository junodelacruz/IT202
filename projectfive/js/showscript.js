$("#listen").on("click", function() {
    refresh();
});


function refresh() {
    $.post("showmessage.php",
        {
            username: $("#usernameCheck").val(),
        },
        function(response) {
            $("#output").html(response);
        }
    )
    setTimeout(refresh, 500);
}
