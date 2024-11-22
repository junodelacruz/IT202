<?php
    
  include('../connect.php');
  session_start();
  
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $id = $_POST['id'];
    $sql = "SELECT * FROM CustomerRecords WHERE IDNumber = '$id'";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) > 0) {
          echo "<script> alert('Customer already has an account');
          window.location.href = 'createrecord.php';
                </script>";
    }
    else {
      echo "<script>alert('Customer account created. You will be redirected to a form to enter the personal information for the customer.');
      window.location.href = 'createrecord.php?firstname=" . $firstname . "&lastname=" . $lastname . "&id=" . $id . "';</script>";
    }
    
  }
  if (isset($_GET['firstname']) AND isset($_GET['lastname']) AND isset($_GET['id'])) {
    $firstname = $_GET['firstname'];
    $lastname = $_GET['lastname'];
    $id = $_GET['id'];
  
    $request = "INSERT INTO `CustomerRecords`(`FirstName`, `LastName`, `IDNumber`) VALUES ('$firstname','$lastname','$id')";
    
    $insert = mysqli_query($conn,$request);
    
    if ($insert) {
        echo "<script>window.location.href = 'createpersonal.php'; </script>";
        $_SESSION['createIDNum'] = $id;
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
       <form method="post" action="createrecord.php">
        
            <label for = "firstname">Customer First Name: </label>
            <input type="text" id="firstname" name="firstname" placeholder="Michael" required> <p>*</p>

            <label for = "lastname">Customer Last Name: </label>
            <input type="text" id="lastname" name="lastname" placeholder="Smith"  required> <p>*</p>

            <label for = "id">Customer ID: </label>
            <input type="text" id="id" name="id" placeholder="001" required> <p>*</p>
            
            <br>
            <input type="submit" id="submit" name="submit">

        </form>
    </div>
        
</body>
</html>

