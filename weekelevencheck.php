<?php
  session_start();
                        
          include("perfectplumbingpros/connect.php");
          
          
          $sql = "SELECT Student.ID
                  FROM Student
                  WHERE Student.ID = '" . $_GET["input1"] . "'";
                  
          $result = mysqli_query($conn,$sql);
          
          if(mysqli_num_rows($result) > 0) {
            $_SESSION['studentID'] = $_GET["input1"];
            header('Location: weekelevenphp.php');
            exit;
          }
          else {
            echo '<script>alert("Student ID not found.")
                  window.location.href = "weekelevenform.html";</script>';
          }
?>
