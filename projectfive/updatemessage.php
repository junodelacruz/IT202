<?php
    include("../perfectplumbingpros/connect.php");
   
    $password = $_POST['password'];
    $message = $_POST['message'];
    $username = $_POST['username'];

    $checkSQL = "SELECT * FROM Chat WHERE Chat.Password = '$password' AND Chat.Name = '$username'";
    $checkQuery = mysqli_query($conn, $checkSQL);

    // Verify username and password
    if (mysqli_num_rows($checkQuery) > 0) {
        // Update database message
        $updateSQL = "UPDATE `Chat` SET `Message`= '$message' WHERE Chat.Password = '$password' AND Chat.Name = '$username'";
        $updateQuery = mysqli_query($conn, $updateSQL);

        echo "Sent";
    } else {
        // Failure
        echo "Failed to send message! Check credentials!";
    }
?>
