<?php
  
  include("connect.php");
  session_start();

  $sql = "SELECT *
          FROM PlumberRecord
          WHERE PlumberRecord.IDNumber = '" . $_POST['idnumber'] . "'";
  $result = mysqli_query($conn, $sql);
  $check = false;

//------------- VERIFY INFORMATION ----------------
  if(mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_array($result)) {
          if ($_POST['lastname'] !== $row['LastName'])  {
              echo "<script>alert('Account not found! Please check last name!')
                    history.back();
                    </script>";
                    
          }
          else if ($_POST['password'] !== $row['Password'])  {
              echo "<script>alert('Account not found! Please check password!')
                    history.back();
                    </script>";
                    
          }
          else if ($_POST['firstname'] != $row['FirstName'])  {
              echo "<script>alert('Account not found! Please check first name!')
                    history.back();
                    </script>";
                    
          }
          else if ($_POST['phonenumber'] !== $row['PhoneNumber'])  {
              echo "<script>alert('Account not found! Please check phone number!')
                    history.back();
                    </script>";
                    
          }
          else if (isset($_POST['confirm']) && $_POST['email'] !== $row['Email'])  {
              echo "<script>alert('Account not found! Please check email!')
                    history.back();
                    </script>";
          }
          else {
              $check = true;
          }

      }
  }
  
  else {
    echo "<script>alert('Account not found! Please check ID number!')
          history.back(); 
          </script>";
  }
  //-----------------------------------------------
  
  
  //--------------- REDIRECTION -------------------
  if($check){
        $transaction = $_POST['transaction'];
       
        if($transaction === 'Default') {
           echo "<script>alert('Please select a transaction method!')
                history.back(); 
                </script>";
        }
        else if($transaction === 'Search') {
          $_SESSION['idnumber'] = $_POST['idnumber'];
           header("Location: transactions/search.php");
           exit();
        }
        else if($transaction === 'Book') {
           header("Location: transactions/book.php");
           exit();
        }
        else if($transaction === 'Cancel') {
           header("Location: transactions/cancel.php");
           exit();
        }
        else if($transaction === 'Request') {
           header("Location: transactions/requestservice.php");
           exit();
        }
        else if($transaction === 'Update') {
           header("Location: transactions/update.php");
           exit();
        }
        else if($transaction === 'Create') {
           header("Location: transactions/createrecord.php");
           exit();
        }
  }
  //-----------------------------------------------

?>