<?php
    
  include('../connect.php');
  session_start();
  
  if (!isset($_SESSION['CustomerIDNumber'])) {
    echo "<script>alert('You must verify customer and book an appointment first');
    window.location.href = 'book.php';</script>";
    exit;
  }

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $appID = $_POST['servAppID'];
    $sql = "SELECT * FROM CustomerService WHERE AppointmentID = '" . $appID . "'";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) > 0) {
          echo "<script>
  var confirm = confirm('You are about to request supplies for your customer. Are you sure you want to do so?');
    if(confirm) {
        window.location.href = 'requestsupplies.php?appID=" . $appID . "&need=" . $_POST['need'] . "&order=" . $_POST['order'] . "&received=" . $_POST['received'] . "';
    }
    else {
      history.back();
    }</script>";
    }
    else {
      echo "<script>alert('Customer information cannot be found. Recheck data entered otherwise you need to make sure the customer has a service appointment');</script>";
    }
    
  }
  if (isset($_GET['appID']) AND isset($_GET['need']) AND isset($_GET['order']) AND isset($_GET['received'])) {
    $appID = $_GET['appID'];
    $need = $_GET['need'];
    $order = $_GET['order'];
    $received = $_GET['received'];
    $idnumber = $_SESSION['CustomerIDNumber'];
  
    $request = "INSERT INTO `CustomerSupplies`(`SuppliesNeeded`, `SuppliesOrdered`, `SuppliesReceived`, `IDNumber`, `AppointmentID`) VALUES ('$need','$order','$received','$idnumber','$appID')";
    
    $insert = mysqli_query($conn,$request);
    
    if ($insert) {
        echo "<script>alert('Supplies Added.');
              window.location.href = 'book.php'; </script>";
    } else {
        echo "<script>alert('Error occurred while adding supplies.');</script>";
    }
  
  }

?>


<!DOCTYPE html>
<head>
    <title>Request Supplies</title>
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
        <h1>REQUEST SUPPLIES FORM</h1>
   </div>
   <div class="form">
       <form method="post" action="requestsupplies.php">
        
            <label for = "need">Supplies Needed: </label>
            <input type="text" id="need" name="need" placeholder="Pipe" required> <p>*</p>

            <label for = "order">Supplies Onsite/Ordered: </label>
            <input type="text" id="order" name="order" placeholder="On Order or On Site"  required> <p>*</p>

            <label for = "recieved">Date Supplies Recieved: </label>
            <input type="text" id="received" name="received" placeholder="2024-10-05" required> <p>*</p>
            
            <label for = "servAppID">Service Appointment ID: </label>
            <input type="text" id="servAppID" name="servAppID" placeholder="792" required> <p>*</p>
              
            <br>
            <input type="submit" id="submit" name="submit">

        </form>
    </div>
        
</body>
</html>

