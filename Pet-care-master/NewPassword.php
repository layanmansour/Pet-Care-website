<?php

if (!($database = mysqli_connect("localhost", "root", "")))
    die("<p>Could not connect to database</p>");

if (!mysqli_select_db($database, "Pet_care"))
    die("<p>Could not open URL database</p>");
    session_start();

    if(isset($_POST['cahnge'])){
        $pass = $_POST['Password'];
        $rePass = $_POST['rePassword'];
        $email = $_SESSION['Email'];  
        
        
        if ($pass !==  $rePass) {
            function_alert("Password mismatch!, Try again");
        }else{   
            if ($_SESSION['managerOrOwner'] == "manager") {
                $query = "UPDATE manager SET password = '$pass' WHERE email = '$email' ";    
            }else if ( $_SESSION['managerOrOwner'] == "pet_owner"){
                $query = "UPDATE pet_owner SET password = '$pass' WHERE email = '$email' ";    
            }

            $result = mysqli_query($database, $query);
            echo "<script>alert('You have entered incorrect code, try again');</script>";
            header('Location: logIn.php');

            //function_alert("Password has been changed successfully!");
            //redirect error???
        }
         
         
        


    }


    function function_alert($message) {
      
        // Display the alert box
        echo "<script>alert('$message');</script>";
    } 
?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <link rel="stylesheet" href="styles/forgetpassword.css">
    <link href="styles/forgetpassword.css?<?=filemtime("styles/forgetpassword.css")?>" rel="stylesheet" type="text/css" />
    <script src="newpasswordvalidation.js"></script>

  </head>
  <body>
  <div class="navbar">
        <a href= "Pet Care.html">Home </a>

    </div>
    <div class="container2">
      <div class="title"> <h2>New Password</h2></div>

      <form method = "post" action = "NewPassword.php">

        <div >
            <input type="password" size = "15" id = "Password" name ="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at 
            least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
            <label> Password </label>
          </div>
   
        <div>
          <input type="password" size = "15" name ="rePassword"required>
          <label> Re-enter Password </label>
        </div> 

  
    
          <div  >
          <a href="Forget Password.php"><button class = "Cbutton" type="button">Cancel</button></a>
                
                <input  class = "Dbutton" name ="cahnge" type="submit" value="Update">
                

            </div>
            <div id="message">
  <h3>Password must contain the following:</h3>
  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
  <p id="number" class="invalid">A <b>number</b></p>
  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
</div>
        </p>
        </form>
    </div>
    <img  src= "images/logo.png"  class = "logo" alt="logo of pet care">
    <script>
var myInput = document.getElementById("Password");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}
//deleteeeee this 
// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>
  </body>
</html>