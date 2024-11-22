<?php
    
  include('../connect.php');
  
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $appID = $_POST['appID'];
    $sql = "SELECT * FROM CustomerService WHERE AppointmentID = '" . $_POST['appID'] . "'";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) > 0) {
          echo "<script>
  var confirm = confirm('You are about to cancel this service appointment. Canceling this service appointment will also cancel any supplies ordered for the service. Are you sure you want to do so?');
    if(confirm) {
        window.location.href = 'cancel.php?appID=" . $appID . "';
    }
    else {
      history.back();
    }</script>";
    }
    else {
      echo "<script>alert('Service Appointment ID Does not exist for the customer. Please check and re-enter service appointment ID.');</script>";
    }
    
  }
  if (isset($_GET['appID'])) {
    $appID = $_GET['appID'];

    $deleteServiceSQL = "DELETE FROM CustomerService WHERE AppointmentID = '$appID'";
    $deleteSuppliesSQL = "DELETE FROM CustomerSupplies WHERE AppointmentID = '$appID'";

    if (mysqli_query($conn, $deleteServiceSQL) && mysqli_query($conn, $deleteSuppliesSQL)) {
        echo "<script>alert('Cancelled.');</script>";
    } else {
        echo "<script>alert('Error occurred while canceling the appointment. Please try again.');</script>";
    }
}

?>


<!DOCTYPE html>
<head>
    <title>Cancel</title>
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
        <h1>CANCEL A SERVICE FORM</h1>
   </div>
   <div class="form">
       <form method="post" action="cancel.php">
        
            <label for = "appID">Customer&apos;s Appointment ID: </label>
            <input type="text" id="appID" name="appID" placeholder="123" required> <p>*</p>

            <br>
            <input type="submit" id="submit" name="submit">

        </form>
    </div>
        
</body>
</html>

