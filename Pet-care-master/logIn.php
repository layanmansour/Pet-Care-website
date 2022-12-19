<?php
    session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset = "utf-8">
    <title>LogIn</title>
    <link rel="stylesheet" href="styles/login.css">
           <link href="styles/ownerHeader.css?<?=filemtime("styles/ownerHeader.css")?>" rel="stylesheet" type="text/css" />
    <link href="styles/login.css?<?=filemtime("styles/login.css")?>" rel="stylesheet" type="text/css" />

  </head>


  <body>
    <div class="navbar">
      <a href= "Pet Care.html">Home </a>

  </div>
  </div>
    <div class="container">
      <h2>Login</h2>
      <form method="post" >
          <input type="text" name="email" id="email" placeholder="email" required>
          <input type="password" name="pass" id="pass" placeholder="password" required>

         <div class="loginbut">
           <a href='Pet Care.html'><button class = 'l' type='button'>Cancel</button></a>
          <a href="ownerHomePage.html"><button class = 'l2' type="submit">Login</button></a>
         </div>
         
          
      </form>
      
       <p>Forgot password?<a href="Forget Password.php">  Click Here</a></p>
       <p>New pet owner?<a href="ownerRegistration.php">   SignUp</a></p>
 

  </div>

 
  <img  src= "images/logo.png"  class = "logo" alt="logo of pet care">
  </body>

  <?php 
     if ($_SERVER["REQUEST_METHOD"] == "POST") {  
    if (!( $database = mysqli_connect( "localhost", "root", "" )))
        die( "<p>Could not connect to database</p>" );

    if (!mysqli_select_db( $database, "Pet_care" ))
        die( "<p>Could not open URL database</p>" );
  
        $email=$_POST['email'];  //correct
        $password=$_POST['pass'];  
        $query="select * from pet_owner WHERE email='$email'AND password='$password'";  
        $result_owner=mysqli_query($database, $query);  
        if($row=mysqli_fetch_row($result_owner)){//owner
         
            header("location: ownerHomePage.html");
            $_SESSION["OwnerEmail"]=$email;
      }
      else {
        $query_m="select * from manager WHERE email='$email'AND password='$password'";  
        $result_manager=mysqli_query($database, $query_m);
        if($row=mysqli_fetch_row($result_manager)){//mangaer
         
          header("location: managerHomePage.html");
         
    }
    else
    echo "<script>alert('Email or password is incorrect!')</script>";
  }
    
      }
        
       
  
   
    
    ?>

</html>
