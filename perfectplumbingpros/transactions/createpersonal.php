<?php
    
  include('../connect.php');
  session_start();
  
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $street = $_POST['street'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zipcode = $_POST['zipcode'];
    $phonenumber = $_POST['phonenumber'];
    $id = $_SESSION['createIDNum'];
  
    $request = "INSERT INTO `CustomerPersonal`(`Street`, `City`, `State`, `ZipCode`, `PhoneNumber`, `IDNumber`) VALUES ('$street','$city','$state','$zipcode','$phonenumber','$id')";
    
    $insert = mysqli_query($conn,$request);
    
    if ($insert) {
        echo "<script>alert('Personal Information Successfully Inserted');
        window.location.href = 'createrecord.php'; </script>";
    } else {
        echo "<script>alert('Error occurred while creating an account.');</script>";
    }

}

?>


<!DOCTYPE html>
<head>
    <title>Create</title>
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
        <h1>CREATE AN ACCOUNT</h1>
   </div>
   <div class="form">
       <form method="post" action="createpersonal.php">
            
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
            
            <br>
            <input type="submit" id="submit" name="submit">

        </form>
    </div>
        
</body>
</html>

