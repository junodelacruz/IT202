<?php
    
  include('../connect.php');
  session_start();
  
  if (!isset($_SESSION['CustomerIDNumber'])) {
    echo "<script>alert('You must verify customer and book an appointment first');
    window.location.href = 'book.php';</script>";
    exit;
  }
  
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $idnumber = $_SESSION['CustomerIDNumber'];
  $date = $_POST['date'];
  $time = $_POST['time'];
  $type = $_POST['type'];
  $cost = $_POST['cost'];
  $appNumber = rand(100, 999);
  
  $sql = "INSERT INTO `CustomerService`(`Date`, `Time`, `Type`, `Cost`, `IDNumber`, `AppointmentID`) VALUES ('$date','$time','$type','$cost','$idnumber','$appNumber')";
  $result = mysqli_query($conn, $sql);
  
  if($result) {
      $_SESSION['appNumber'] = $appNumber;
        echo "<script>alert('Service appointment made. Your appointment ID is: " . $appNumber . ". You will now be redirected to indicate supplies needed for the job.');
  window.location.href = 'requestsupplies.php';</script>";
  }
  else {
    echo "<script>alert('There was an error processing your request. Please try again later.');</script>";
  }
}
  
?>


<!DOCTYPE html>
<head>
    <title>Request Service</title>
    <link rel="stylesheet" href="../css/pppstyles.css">
</head>
<body>
  <nav class="navbar">
        <ul class="navbar-list">
            <li><a href="../dropdownppp.html">Home</a></li>
            <li><a href="search.php">Search A Plumber Account</a></li>
            <li><a href="requestservice.php">Schedule A Customer Service Appointment</a></li>
            <li><a href="cancel.php">Cancel A Customer Service Appointment</a></li>
            <li><a href="update.php">Update A Customer Personal Record</a></li>
            <li><a href="requestsupplies.php">Request Supplies</a></li>
            <li><a href="createrecord.php">Create A New Customer Account</a></li>
        </ul>
    </nav>
   <div class = "header">
        <h1>REQUEST SERVICE FORM</h1>
   </div>
   <div class="form">
       <form method="post" action="requestservice.php">
        
            <label for = "date">Service Appointment Date: </label>
            <input type="text" id="date" name="date" placeholder="yyyy-mm-dd" required> <p>*</p>

            <label for = "time">Service Appointment Time: </label>
            <input type="text" id="time" name="time" placeholder="10AM"  required> <p>*</p>

            <label for = "type">Service Type: </label>
            <input type="text" id="type" name="type" placeholder="Clogged Sink" required> <p>*</p>
            
            <label for = "cost">Cost: </label>
            <input type="text" id="cost" name="cost" placeholder="100" required> <p>*</p>
              
            <br>
            <input type="submit" id="submit" name="submit">

        </form>
    </div>
        
</body>
</html>

