<!DOCTYPE html>
<head>
    <title>Customer Database</title>
    <link rel="stylesheet" href="css/weekelevenstyles.css">
</head>
<body>

<?php
  session_start();
  
  include("perfectplumbingpros/connect.php");
  $ID = $_SESSION['studentID'];
  
  $sql = "SELECT Name, Student.ID, Major, Course, Grade
          FROM Student
          INNER JOIN Transcript ON Student.ID = Transcript.ID
          WHERE Student.ID = '" . $ID . "'";
  $result = mysqli_query($conn,$sql);

  if($result) {
    echo "<table align='center'>
          <tr>
            <th>Student Name</th>
            <th>Student ID</th>
            <th>Major</th>
            <th>Course</th>
            <th>Grade</th>
          </tr>";
              
              
    while($row = mysqli_fetch_array($result)) {
      echo "<tr>";
        echo "<td>" . $row['Name'] . "</td>";
        echo "<td>" . $row['ID'] . "</td>";
        echo "<td>" . $row['Major'] . "</td>";
        echo "<td>" . $row['Course'] . "</td>";
        echo "<td>" . $row['Grade'] . "</td>";
      echo "</tr>";
    }
    echo "</table>";
    
  }
  else {
    echo "alert('Student ID Not Found!')";
  }

?>
<button onclick="history.back()">HOME</button>
</body>
</html>

