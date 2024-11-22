<?php
    
  include('../connect.php');
  session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $sql = "SELECT *
          FROM CustomerRecords
          WHERE CustomerRecords.IDNumber = '" . $_POST['idnumber'] . "' AND CustomerRecords.FirstName = '" . $_POST['firstname'] . "' AND CustomerRecords.LastName = '" . $_POST['lastname'] . "'";
  $result = mysqli_query($conn, $sql);
  
  $_SESSION['CustomerIDNumber'] = $_POST['idnumber'];
  
  if(mysqli_num_rows($result) > 0) {
      header('Location: requestservice.php');
  }
  else {
    echo "<script>alert('Customer cannot be found. Did you enter the data correctly? If not, you will be redirected to create an account for a customer so a secondary check can occur.');
    var confirm = confirm('Would you like to re-enter data?');
    if(confirm) {
      history.back();
    }
    else {
      window.location.href = 'create.php';
    }
    </script>";
  }

}
  
?>


<!DOCTYPE html>
<head>
    <title>Book</title>
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
        <h1>VERIFY CUSTOMER FORM</h1>
   </div>
   
   <div class = "form">
       <form method="post" action="book.php">
        
            <label for = "firstname">Customer&apos;s First Name: </label>
            <input type="text" id="firstname" name="firstname" placeholder="John" required> <p>*</p>

            <label for = "lastname">Customer&apos;s Last Name: </label>
            <input type="text" id="lastname" name="lastname" placeholder="Doe"  required> <p>*</p>

            <label for = "idnumber">Customer&apos;s ID Number: </label>
            <input type="text" id="idnumber" name="idnumber" placeholder="#001" required> <p>*</p>
              
            <br>
            <input type="submit" id="submit" name="submit">

        </form>
        
    </div>
        
</body>
</html>