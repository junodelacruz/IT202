<?php
    include("../perfectplumbingpros/connect.php");

    $username = $_POST["username"];

    $checkSQL = "SELECT * FROM Chat WHERE Chat.Name = '$username'";
    $checkQuery = mysqli_query($conn, $checkSQL);


    if (mysqli_num_rows($checkQuery) > 0) {
        $outputSQL = "SELECT Message FROM Chat WHERE Chat.Name = '$username'";
        $outputQuery = mysqli_query($conn, $outputSQL);

        while ($row = mysqli_fetch_assoc($outputQuery)) {
            echo $row["Message"];
        }
    } else {
        echo "User not found!";
    }
?>
