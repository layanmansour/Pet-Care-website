<?php
if (!($database = mysqli_connect("localhost", "root", "")))
    die("<p>Could not connect to database</p>");

if (!mysqli_select_db($database, "Pet_care"))
    die("<p>Could not open URL database</p>");
    session_start();

    if(isset($_POST['validate'])){

      $code = $_POST['Code'];
      $emaill = $_SESSION['Email'];  
      
      if ($_SESSION['managerOrOwner'] == "manager") {
      $check_code = "SELECT Verification FROM manager WHERE email = '$emaill'"; 
      }
      else if ( $_SESSION['managerOrOwner'] == "pet_owner"){
      $check_code = "SELECT Verification FROM pet_owner WHERE email = '$emaill' ";
      }

      $result=mysqli_query($database,$check_code);
      $singleRow = mysqli_fetch_row($result);
      $OTP = $singleRow['0'];

      // move the user to next page 
      if ($OTP == $code)
      header('Location: NewPassword.php');
      
      else {
      echo "<script>alert('You have entered incorrect code, try again');</script>";

    }


  }

    function isEmailExists($db, $tableName, $email){
        
        $sql = "SELECT * FROM ".$tableName." WHERE email='".$email."'";
        
        $results = $db->query($sql);
       
        $row = $results->fetch_assoc();
       
        return (is_array($row) && count($row)>0);
      }


      function function_alert($message) {
      
        
        echo "<script>alert('$message');</script>";
    }
?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

   
    <link href="styles/forgetpassword.css?<?=filemtime("styles/forgetpassword.css")?>" rel="stylesheet" type="text/css" />
  </head>
  <body>
  <div class="navbar">
        <a href= "Pet Care.html">Home </a>

    </div>
    <div class="container1">
      <div ><h2>Reset Password</h2></div>

      <form method = "post" action = "OTP.php">
      
       <label>Verification code has been sent to your email to reset your password , enter it:</label>

        <div>
          <input class = "otpcode" type="text" size = "10" name ="Code"required>

          <label>Received Code</label>
        </div>

  

        <div>
        <a href="Forget Password.php"><button class = "Cbutton" type="button">Cancel</button></a>
        <input  type="submit" class = "Dbutton" class = "update" name= "validate" value="reset password">

              

            </div>
        </p>
        </form>
    </div>
    <img  src= "images/logo.png"  class = "logo" alt="logo of pet care">
  </body>
</html>