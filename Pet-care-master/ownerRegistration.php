<?php
    session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset = "utf-8">
    <title>Registration</title> 
    <link rel="stylesheet" href="styles/Registration.css">
    <link href="styles/Registration.css?<?=filemtime("styles/Registration.css")?>" rel="stylesheet" type="text/css" />
    
  </head>

  <body>   
    <div class="navbar"> <a href="Pet Care.html">Home</a></div>
    <div class="container">
      <h3>Register</h3>
        <form method="post" id =  "form">
          
            <input type="text" name="Fname" id="Fname" placeholder="First name" required>
            <input type="text" name="Lname" id="Lname" placeholder="Last name" required>
            <input type="text" name="email" id="email" placeholder="Email" required>
            <input type="text" name="phonenumber" id="phonenumber" placeholder="Phone number" required>
            <input type="password" name="pass" id="pass" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at 
            least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
             
            <div class="content">
              <div class="radio">
               <label for="gender">Gender:</label>
                  <input type="radio" name="gender" id="gender" value="male" required>
                  <label for="male">male</label>
                  <input type="radio" name="gender" id="gender" value="female" required>
                  <label for="female">female</label>
              </div></div>
          

            <p>Add profile photo (optional)</p>
            <input type="file" id="profilePhotoFile" name="profilePhotoFile" accept="image/*">

           <div class="registerbut">
       <a href='logIn.php'><button class = 'l' type='button'>Cancel</button></a>
            <a href="ownerRegisration.php"><button class= "l2" type="submit" id="b">Register</button></a>

           </div>
           
        
        </form>
        
   
 
    </div>
    <img  src= "images/logo.png"  class = "logo" alt="logo of pet care">

    <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {  
      if (!( $database = mysqli_connect( "localhost", "root", "" )))
         die( "<p>Could not connect to database</p>" );
 
      if (!mysqli_select_db( $database, "Pet_care" ))
         die( "<p>Could not open URL database</p>" );
         $Fname=$_POST['Fname'];  
         $Lname=$_POST['Lname'];
         if(strlen($Fname) < 20 && strlen(  $Lname) < 20 ){
         $email=$_POST['email']; 
         if(filter_var(  $email , FILTER_VALIDATE_EMAIL)){
         $phonenumber=$_POST['phonenumber']; 
         if(preg_match('/^[0-9]{10}+$/', $phonenumber))
           {
         $Fname=$_POST['Fname'];  
         $Lname=$_POST['Lname'];
         $email=$_POST['email']; 
         $phonenumber=$_POST['phonenumber']; 
         $pass=$_POST['pass']; 
         $gender=$_POST['gender']; 
         $profilePhotoFile=$_POST['profilePhotoFile']; 

         $query="INSERT INTO pet_owner (email, password, Fname, Lname, gender, phone_no, photo ) VALUES ('".$email."','".$pass."','".$Fname."','".$Lname."','".$gender."','".$phonenumber."','".$profilePhotoFile."');";


        if(mysqli_query($database, $query) )
         {  header("location: login.php");
            }
        else  
         {  echo "<script>alert('an error occurred, could not register.')</script>"; 
          die(mysqli_error($database));
     }
     }
     else 
     echo "<script>alert('Invalid phone number format')</script>"; 
    
    }
    else
    echo "<script>alert('Invalid email format')</script>"; 
  }
  else
    echo "<script>alert('length of name should be less than or equal to 20 characters')</script>";    
    
}
   
 ?>

  </body>

</html>
