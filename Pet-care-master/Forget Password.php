
<!DOCTYPE html>
<html>
  <head>
    <meta charset = "utf-8">
    <title>Forget Password </title>
    <link rel="stylesheet" href="styles/forgetpassword.css">
    <link href="styles/forgetpassword.css?<?=filemtime("styles/forgetpassword.css")?>" rel="stylesheet" type="text/css" />

  </head>

  <body>
    <div class="navbar">
        <a href= "Pet Care.html">Home </a>

    </div>
    <div class="container">

      <h2>Forgot your Password ? </h2>
      <form method="post" action = "Forget Password.php">
      <p> Enter the email address associated with your account <br><br>
      <label> 
        <input id = "email "type="email" name="Email"  placeholder="email" size = "33">
        </label></p>
         
        <div>
          <a href="logIn.php"><button class = "Cbutton"type="button">Cancel</button></a>
        <input class = "Dbutton" class = "update" name ="reset" type="submit" value="reset password">
    </div> 
      </form>
      </div> 
      <img  src= "images/logo.png"  class = "logo" alt="logo of pet care">
      <?php

    require "mail.php";

  if (!($database = mysqli_connect("localhost", "root", "")))
    die("<p>Could not connect to database</p>");

  if (!mysqli_select_db($database, "Pet_care"))
    die("<p>Could not open URL database</p>");

    if (isset($_POST['reset'])) {
      session_start();

        //check if the email already exist in owner or manager?
        $email = $_POST['Email'];

        $isExist = isEmailExists($database, "pet_owner", $email);
        $manager = false;
        $_SESSION['managerOrOwner'] = "pet_owner";  

        if($isExist != 1){
            $isExist = isEmailExists($database, "manager", $email);

            if($isExist != 1){            
            function_alert("Email dosent exist, Pet Owner ? sign up ! ");
            exit();}

            $manager = true;
            $_SESSION['managerOrOwner'] = "manager";  

          }


        //if its already exist, create random number and store it as verifaction code in the database
        //manager
        $OTP = generateNumericOTP();
       
        if ($manager){
            $query = "UPDATE manager SET Verification = '$OTP' WHERE email = '$email' ";

        }else{ //owner
            $query = "UPDATE pet_owner SET Verification = '$OTP' WHERE email = '$email' ";
        }

        $result = mysqli_query($database, $query);

        //send it to this email 
        $subject = "Password Reset Code";
        $message = "Your password reset code for Pet Care Website is : " . $OTP;
        send_mail($email,$subject,$message);
        $_SESSION['Email'] = $_POST['Email'];  
        //ask the user to enter this number, if its correct allow him to change the password
        header('Location: OTP.php');
      }
   
    function isEmailExists($db, $tableName, $email){
      
        $sql = "SELECT * FROM ".$tableName." WHERE email='".$email."'";
       
        $results = $db->query($sql);
        
        $row = $results->fetch_assoc();
            
        return (is_array($row) && count($row)>0);
      }

      function generateNumericOTP(){
          $generator = "1357902468";
          $result = "";
          for ($i = 1; $i <= 4; $i++) {
              $result .= substr($generator, (rand() % (strlen($generator))), 1);
            }
            
            return $result;
        }

        function function_alert($message) {
      
          
            echo "<script>alert('$message');</script>";
        }
?>
  </body>
</html>