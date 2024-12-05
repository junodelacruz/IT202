<?php
  
  if($_SERVER['REQUEST_METHOD'] === 'POST') {
  
    include("../perfectplumbingpros/connect.php");
    $name = $_POST['input1'];
    $name = mysqli_real_escape_string($conn,$name);
  
    $sql = "SELECT Name, Student.ID, Major
            FROM Student
            WHERE Student.Name = '$name'";
    $result = mysqli_query($conn,$sql);

   
      echo "<table align='center'>
          <tr> 
            <th>Student Name</th>
            <th>Student ID</th>
            <th>Major</th>
          </tr>";
          
      while($row = mysqli_fetch_array($result)) {
        echo "<tr>";
          echo "<td>" . $row['Name'] . "</td>";
          echo "<td>" . $row['ID'] . "</td>";
          echo "<td>" . $row['Major'] . "</td>";
        echo "</tr>";
      }
      echo "</table>";
      echo "$sql";
    

    
  }

?>

<!DOCTYPE html>
  <html>
    <head>
          <link rel = 'stylesheet' href='../css/weekelevenstyles.css'>
          <title>Week Eleven Form</title>
          
    </head>
    <body>
      <form action='preventSQLi.php' method='post'>
        <label for='input1'>Enter Student Name: </label>
        <input type='text' id= 'input1' name='input1'>
        <input type='submit' name='submit' id='submit' value='SUBMIT'>
      </form> 
    </body>
  </html>