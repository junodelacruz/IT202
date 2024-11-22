<?php
    
  include('../connect.php');
  session_start();
  
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $street = $_POST['street'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zipcode = $_POST['zipcode'];
    $phonenumber = $_POST['phonenumber'];
    $id = $_POST['id'];
    
    $sql = "SELECT * FROM CustomerPersonal WHERE IDNumber = '$id'";
    $result = mysqli_query($conn, $sql);
  
     if(mysqli_num_rows($result) > 0) {
       echo "<script>
  var confirm = confirm('You are about to update the record of the customer. Are you sure you want to do so?');
    if(confirm) {
        window.location.href = 'update.php?street=" . $street . "&city=" . $city . "&state=" . $state . "&zipcode=" . $zipcode . "&phonenumber=" . $phonenumber . "&id=" . $id . "';
    }
    else {
      history.back();
    }</script>";
     }
     else {
       echo "<script>alert('Customer does not exists. You will be redirected to create a client account form.');</script>";
     }
  } 
  if (isset($_GET['street']) AND isset($_GET['city']) AND isset($_GET['state']) AND isset($_GET['zipcode']) AND isset($_GET['phonenumber']) AND isset($_GET['id'])) {
  echo "true";
    $street = $_GET['street'];
    $city = $_GET['city'];
    $state = $_GET['state'];
    $zipcode = $_GET['zipcode'];
    $phonenumber = $_GET['phonenumber'];
    $id = $_GET['id'];
    
    $updateFields = [];

    if (!empty($street)) {
        $updateFields[] = "`Street` = '$street'";
    }
    if (!empty($city)) {
        $updateFields[] = "`City` = '$city'";
    }
    if (!empty($state)) {
        $updateFields[] = "`State` = '$state'";
    }
    if (!empty($zipcode)) {
        $updateFields[] = "`ZipCode` = '$zipcode'";
    }
    if (!empty($phonenumber)) {
        $updateFields[] = "`PhoneNumber` = '$phonenumber'";
    }

    if (!empty($updateFields)) {
        $updateQuery = "UPDATE `CustomerPersonal` SET " . implode(", ", $updateFields) . " WHERE `IDNumber` = '$id'";
    }
    
    $update = mysqli_query($conn,$updateQuery);
    
    if ($update) {
        echo "<script>alert('Customer Updated.');
              window.location.href = 'update.php'; </script>";
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
        <h1>UPDATE CUSTOMER INFO FORM</h1>
   </div>
   <div class="form">
       <form method="post" action="update.php">
        
            <label for = "street">Customer Street Address: </label>
            <input type="text" id="street" name="street" placeholder="123 Something Street"> <p>*</p>

            <label for = "city">Customer City: </label>
            <input type="text" id="city" name="city" placeholder="Springfield"> <p>*</p>

            <label for = "state">Customer State: </label>
            <input type="text" id="state" name="state" placeholder="TX"> <p>*</p>
            
            <label for = "zipcode">Customer Zipcode: </label>
            <input type="text" id="zipcode" name="zipcode" placeholder="78632"> <p>*</p>
            
            <label for = "phonenumber">Customer Phone Number: </label>
            <input type="text" id="phonenumber" name="phonenumber" placeholder="201 898 9782"> <p>*</p>
            
            <label for = "id">Customer ID: </label>
            <input type="text" id="id" name="id" placeholder="001"> <p>*</p>
              
            <br>
            <input type="submit" id="submit" name="submit">

        </form>
    </div>
        
</body>
</html>

