<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: /");
  exit;
}
 
// Include config file
require_once "dbConn.php";
 
// Define variables and initialize with empty values
$idNum = $pass = "";
$idNum_err = $pass_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
  // Check if idNum is empty
  if(empty(trim($_POST['idNum']))){
    $idNum_err = "Please enter ID Number.";
  } else{
    $idNum = mysqli_real_escape_string($link, trim($_POST["idNum"]));
  }
  
  // Check if pass is empty
  if(empty(trim($_POST["pass"]))){
    $pass_err = "Please enter your password.";
  } else{
    $pass = mysqli_real_escape_string($link, $_POST["pass"]);
  }
  
  // Validate credentials
  if(empty($idNum_err) && empty($pass_err)){
    // Prepare a select statement
    $sql = "SELECT account_ID, ID_number, password FROM account WHERE ID_number = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "s", $param_idNum);
      
      // Set parameters
      $param_idNum = $idNum;
      
      // Attempt to execute the prepared statement
      if(mysqli_stmt_execute($stmt)){
        // Store result
        mysqli_stmt_store_result($stmt);
        
        // Check if idNum exists, if yes then verify pass
        if(mysqli_stmt_num_rows($stmt) == 1){                    
          // Bind result variables
          mysqli_stmt_bind_result($stmt, $id, $idNum, $hashed_pass);
          if(mysqli_stmt_fetch($stmt)){
              if(password_verify($pass, $hashed_pass)){
                // pass is correct, so start a new session
                $sql1 = "SELECT * FROM account WHERE ID_number = '".$idNum."'";
                $result = mysqli_query($link, $sql1);
                // $sql2 = "SELECT req_approved FROM account_request WHERE req_idNum = $idNum";
                // $result2 = mysqli_query($link, $sql2);
                if(mysqli_num_rows($result) == 1)
                {
                  while($row = mysqli_fetch_assoc($result)) {
                    $first = $row['first_name'];
                    $last = $row['last_name'];
                    $div_current = $row['division_curr'];
                    $dept = $row['department'];
                    $vl = $row['avail_VL'];
                    $sl = $row['avail_SL'];
                    $spl = $row['avail_SPL'];
                    $pos = $row['position'];
                    $distrib = $row['distribution'];
                    $emp_stat = $row['employment_status'];
                    $sex = $row['sex'];
                    $bday = $row['birthdate'];
                    $acc_type = $row['account_type'];
                 }
                }
                // if(mysqli_num_rows($result2) == 1)
                // {
                //   while($row1 = mysqli_fetch_assoc($result2)) {
                //    $approved = $row1['req_approved'];
                //  }
                //   if(empty(trim($approved))){
                //   session_destroy();
                //   $_SESSION['approved']= false;
                //   header('location: /');
                //   exit();
                // }
                // }
                // Store data in session variables
                $_SESSION["loggedin"] = true;
                $_SESSION["id"] = $id;
                $_SESSION["idNum"] = $idNum;                            
                $_SESSION["first"] = $first;
                $_SESSION["last"] = $last;
                $_SESSION["div_current"] = $div_current;
                $_SESSION["dept"] = $dept;
                $_SESSION["vl"] = $vl;
                $_SESSION["sl"] = $sl;
                $_SESSION["spl"] = $spl;
                $_SESSION["pos"] = $pos;
                $_SESSION["distrib"] = $distrib;
                $_SESSION["emp_stat"] = $emp_stat;
                $_SESSION["sex"] = $sex;
                $_SESSION["bday"] = $bday;
                $_SESSION["acc_type"] = $acc_type;


                // Redirect user to welcome page
                header("location: / ");

              } else{
                // Display an error message if pass is not valid
                // $pass_err = "The pass you entered was not valid.";
                echo "The pass you entered was not valid.";
              }
          }
        } else{
          // Display an error message if idNum doesn't exist
          // $idNum_err = "No account found with that idNum.";
          echo "No account found with that idNum.";
        }
      } else{
        echo "Oops! Something went wrong. Please try again later.";
      }
    }
    
    // Close statement
    mysqli_stmt_close($stmt);
  }
  
  // Close connection
  mysqli_close($link);
}else{
  header('location: /');
}
?>