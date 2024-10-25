<?php
   
   $conn = mysqli_connect("sql1.njit.edu", "jtd43", "h1aYWpeF_0124!", "jtd43"); 
    if(mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

?>