<!DOCTYPE html>
<head>
    <title>Customer Database</title>
    <link rel="stylesheet" href="css/pppformstyles.css">
</head>
<body>
<div class="content">
    <?php
        include("connect.php");
        
        if($_GET["type"]  === "CustomerDB")
        {
            $sql = "SELECT CustomerRecords.IDNumber, FirstName, LastName, Street, City, State, ZipCode, PhoneNumber, Type, Date, Cost, SuppliesNeeded, SuppliesOrdered, SuppliesReceived
                    FROM CustomerRecords
                    INNER JOIN CustomerPersonal ON CustomerRecords.IDNumber = CustomerPersonal.IDNumber
                    INNER JOIN CustomerService ON CustomerRecords.IDNumber = CustomerService.IDNumber
                    INNER JOIN CustomerSupplies ON CustomerRecords.IDNumber = CustomerSupplies.IDNumber";
            $result = mysqli_query($conn,$sql);
            
            if($result)
            {
              echo "<table align='center'>
               <tr>
                   <th>ID Number</th>
                   <th>First Name</th>
                   <th>Last Name</th>
                   <th>Street Address</th>
                   <th>City</th>
                   <th>State</th>
                   <th>Zip Code</th>
                   <th>Phone Number</th>
                   <th>Type of Service</th>
                   <th>Date of Service</th>
                   <th>Cost of Service</th>
                   <th>Supplies Needed</th>
                   <th>Supplies Ordered/On-site</th>
                   <th>Supplies Received</th>
              </tr>";
              
              
                while($row = mysqli_fetch_array($result))
                {
                    echo "<tr>";
                    
                        echo "<td>" . $row['IDNumber'] . "</td>";
                        echo "<td>" . $row['FirstName'] . "</td>";
                        echo "<td>" . $row['LastName'] . "</td>";
                        echo "<td>" . $row['Street'] . "</td>";
                        echo "<td>" . $row['City'] . "</td>";
                        echo "<td>" . $row['State'] . "</td>";
                        echo "<td>" . $row['ZipCode'] . "</td>";
                        echo "<td>" . $row['PhoneNumber'] . "</td>";
                        echo "<td>" . $row['Type'] . "</td>";
                        echo "<td>" . $row['Date'] . "</td>";
                        echo "<td>" . $row['Cost'] . "</td>";
                        echo "<td>" . $row['SuppliesNeeded'] . "</td>";
                        echo "<td>" . $row['SuppliesOrdered'] . "</td>";
                        echo "<td>" . $row['SuppliesReceived'] . "</td>";
                    
                    echo "</tr>";
                }
                echo "</table>";
            }
            else {
                echo "No records, SQL query error: " . mysqli_error($conn);
            }
        }
        
        if($_GET["type"] === "PlumberDB")
        {
            $sql = "SELECT * FROM PlumberRecord";
            $result = mysqli_query($conn,$sql);
            
            if($result)
            {
              echo "<table align='center'>
               <tr>
                   <th>First Name</th>
                   <th>Last Name</th>
                   <th>Password</th>
                   <th>ID Number</th>
                   <th>Phone Number</th>
                   <th>Email</th>
              </tr>";
              
              
                while($row = mysqli_fetch_array($result))
                {
                    echo "<tr>";
                    
                        echo "<td>" . $row['FirstName'] . "</td>";
                        echo "<td>" . $row['LastName'] . "</td>";
                        echo "<td>" . $row['Password'] . "</td>";
                        echo "<td>" . $row['IDNumber'] . "</td>";
                        echo "<td>" . $row['PhoneNumber'] . "</td>";
                        echo "<td>" . $row['Email'] . "</td>";
            
                    echo "</tr>";
                }
                echo "</table>";
            }
            else {
                echo "No records, SQL query error: " . mysqli_error($conn);
            }
        }
    ?>

<button onclick="history.back()">HOME</button>
</div>
</body>
</html>