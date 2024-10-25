<?php

    $conn = mysqli_connect('sql1.njit.edu', 'jtd43', 'h1aYWpeF_0124!', 'jtd43');   
    if(mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }


    $sql = "SELECT * From 'Customer records'
            INNER JOIN 'Customer Personal Information' ON 'Customer records'.IDNumber = 'Customer Personal Information'.IDNumber
            INNER JOIN 'Customer Service Information' ON 'Customer records'.IDNumber = 'Customer Service Information'.IDNumber
            INNER JOIN 'Customer Supplies Information' ON 'Customer records'.IDNumber = 'Customer Supplies Information'.IDNumber";
    $result = $conn->query($sql);
    $con->close();

    
?>