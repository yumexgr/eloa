<?php

// Include config file
require_once "dbConn.php";
 
// Define variables and initialize with empty values
$idNum = $pass = $passConfirm = "";
$idNum_err = $pass_err = $passConfirm_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate idNum
    if(empty(trim($_POST["idNum"]))){
        $idNum_err = "Please enter a idNum.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM account WHERE idNum = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_idNum);
            
            // Set parameters
            $param_idNum = trim($_POST["idNum"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) >= 1){
                    $idNum_err = "This ID Number is already taken.";
                } else{
                    $idNum = trim($_POST["idNum"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Validate pass
    if(empty(trim($_POST["pass"]))){
        $pass_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["pass"])) < 6){
        $pass_err = "Password must have at least 6 characters.";
    } else{
        $pass = mysqli_real_escape_string($link, $_POST["pass"]);
    }
    
    // Validate confirm pass
    if(empty(trim($_POST["confirmPass"]))){
        $passConfirm_err = "Please confirm password.";     
    } else{
        $passConfirm = trim($_POST["confirmPass"]);
        if(empty($pass_err) && ($pass != $passConfirm)){
            $passConfirm_err = "Passwords did not match.";
        }
    }

    //validate first name
    if(empty(trim($_POST["first"]))){
        $first_err = "Please enter your first name.";
    }else{
        $first = mysqli_real_escape_string($link,$_POST["first"]);
    }

    //validate last name
    if(empty(trim($_POST["last"]))){
        $last_err = "Please enter your last name.";
    }else{
        $last = mysqli_real_escape_string($link,$_POST["last"]);
    }
    
    // Check input errors before inserting in database
    if(empty($idNum_err) && empty($pass_err) && empty($passConfirm_err) && empty($first_err) && empty($last_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO account_request (req_idNum, req_password, req_first, req_last, req_dateTime) VALUES (?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "issss", $param_idNum, $param_pass, $param_first, $param_last, $param_dateTime);
            
            // Set parameters
            $param_idNum = $idNum;
            $param_pass = password_hash($pass, PASSWORD_DEFAULT); // Creates a pass hash
            $param_first = $first;
            $param_last = $last;
            $param_dateTime = date('Y-m-d h:i:s');
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                $_SESSION['request']=true;
                header("location: /");

            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($idNum_err)) ? 'has-error' : ''; ?>">
                <label>idNum</label>
                <input type="text" name="idNum" class="form-control" value="<?php echo $idNum; ?>">
                <span class="help-block"><?php echo $idNum_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($pass_err)) ? 'has-error' : ''; ?>">
                <label>pass</label>
                <input type="pass" name="pass" class="form-control" value="<?php echo $pass; ?>">
                <span class="help-block"><?php echo $pass_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($passConfirm_err)) ? 'has-error' : ''; ?>">
                <label>Confirm pass</label>
                <input type="pass" name="passConfirm" class="form-control" value="<?php echo $passConfirm; ?>">
                <span class="help-block"><?php echo $passConfirm_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>    
</body>
</html>