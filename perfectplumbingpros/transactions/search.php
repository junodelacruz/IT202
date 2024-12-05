

<!DOCTYPE html>
<head>
    <title>Search</title>
    <link rel="stylesheet" href="../css/dropdownpppstyles.css">
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
<?php
    include('../connect.php');
    session_start();
    
    $sql = "SELECT PlumberRecord.FirstName, PlumberRecord.LastName, PlumberRecord.IDNumber, PlumberRecord.PhoneNumber, PlumberRecord.Email, CustomerRecords.FirstName AS CustomerFirstName, CustomerRecords.LastName AS CustomerLastName, CustomerRecords.IDNumber AS CustomerIDNumber, Street, City, State, ZipCode, CustomerPersonal.PhoneNumber AS CustomerPhoneNumber, Date, Time, Type, SuppliesNeeded, SuppliesReceived, Cost, CustomerService.AppointmentID
                    FROM PlumberRecord
                    INNER JOIN CustomerService ON PlumberRecord.AppointmentID = CustomerService.AppointmentID
                    INNER JOIN CustomerPersonal ON CustomerService.IDNumber = CustomerPersonal.IDNumber
                    INNER JOIN CustomerRecords ON CustomerPersonal.IDNumber = CustomerRecords.IDNumber
                    INNER JOIN CustomerSupplies ON CustomerRecords.IDNumber = CustomerSupplies.IDNumber
                    WHERE PlumberRecord.IDNumber = '" . $_SESSION['idnumber'] . "'";
                    
    $result = mysqli_query($conn,$sql);
    
    if($result) {
              echo "<div class='table-wrapper'> <table align='center'>
               <tr>
                   <th>Plumber First Name</th>
                   <th>Plumber Last Name</th>
                   <th>Plumber ID</th>
                   <th>Plumber Phone Number</th>
                   <th>Plumber Email</th>
                   <th>Customer First Name</th>
                   <th>Customer Last Name</th>
                   <th>Customer ID Number</th>
                   <th>Customer Street</th>
                   <th>Customer City</th>
                   <th>Customer State</th>
                   <th>Customer Zip Code</th>
                   <th>Customer Phone Number</th>
                   <th>Date of Service</th>
                   <th>Time of Service</th>
                   <th>Type of Service</th>
                   <th>Supplies Needed</th>
                   <th>Supplies Received</th>
                   <th>Cost</th>
                   <th>Appointment ID</th>
              </tr>";
              
              
                while($row = mysqli_fetch_array($result))
                {
                    echo "<tr>";
                    
                        echo "<td>" . $row['FirstName'] . "</td>";
                        echo "<td>" . $row['LastName'] . "</td>";
                        echo "<td>" . $row['IDNumber'] . "</td>";
                        echo "<td>" . $row['PhoneNumber'] . "</td>";
                        echo "<td>" . $row['Email'] . "</td>";
                        echo "<td>" . $row['CustomerFirstName'] . "</td>";
                        echo "<td>" . $row['CustomerLastName'] . "</td>";
                        echo "<td>" . $row['CustomerIDNumber'] . "</td>";
                        echo "<td>" . $row['Street'] . "</td>";
                        echo "<td>" . $row['City'] . "</td>";
                        echo "<td>" . $row['State'] . "</td>";
                        echo "<td>" . $row['ZipCode'] . "</td>";
                        echo "<td>" . $row['CustomerPhoneNumber'] . "</td>";
                        echo "<td>" . $row['Date'] . "</td>";
                        echo "<td>" . $row['Time'] . "</td>";
                        echo "<td>" . $row['Type'] . "</td>";
                        echo "<td>" . $row['SuppliesNeeded'] . "</td>";
                        echo "<td>" . $row['SuppliesReceived'] . "</td>";
                        echo "<td>" . $row['Cost'] . "</td>";
                        echo "<td>" . $row['AppointmentID'] . "</td>";
                    
                    echo "</tr>";
                }
                echo "</table> </div>";
            }
            else {
                echo "No records, SQL query error: " . mysqli_error($conn);
            }
    
?>
</body>
</html>
