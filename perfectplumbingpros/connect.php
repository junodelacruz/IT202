<?php
    //Makes DB connection
    $servername = "sql1.njit.edu";
    $username = "jtd43";
    $password = "h1aYWpeF_0124!";
    $dbname = "jtd43";
    $conn = mysqli_connect($servername,$username,$password,$dbname);
    if (mysqli_connect_errno())
    {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>