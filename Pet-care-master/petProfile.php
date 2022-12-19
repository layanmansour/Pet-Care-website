<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
 <title>Pet Profile</title>
 <link rel="stylesheet" href="styles/ownerHeader.css">
 <link rel="stylesheet" href="styles/petProfile.css">
 <link rel="stylesheet" href="styles/footer.css">
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
       <link href="styles/footer.css?<?=filemtime("styles/footer.css")?>" rel="stylesheet" type="text/css" />
       <link href="styles/petProfile.css?<?=filemtime("styles/petProfile.css")?>" rel="stylesheet" type="text/css" />


</head>

<body>
     <div class="navbar">
       <a href = "ownerProfile.php"><img src = "images/Profile1.png"  class= "profile"  alt= "Profile image" ></a>
     <a href = "myPets.php">My Pets</a>
     <a href = "AppointmentRequest.php">My Appointments</a>
     <a href = "bookAppointment.php">Book Appointment</a>
     <a href="ownerServices.php" class= "active"> Services</a>
     <a href="OwnerAboutUs.php">About us</a>
     <a href="ownerHomePage.html">Home</a>

        </div> 
           <img src="images/logo.png"  class= "logo" alt= "logo of pet care" >
    
    
<div class="container">
  
         <?php
  
        if ($_SERVER["REQUEST_METHOD"] == "POST") {  
          if (!( $database = mysqli_connect( "localhost", "root", "" )))
          die( "<p>Could not connect to database</p>" );}


         if ( !( $database = mysqli_connect( "localhost", "root", "" ) ) )
         die( "<p>Could not connect to database</p>" );
       
          if ( !mysqli_select_db($database, "Pet_care" ) )
           die( "<p>Could not open URL database</p>" );
   
           $OwnerEmail = $_SESSION["OwnerEmail"]; 
           $ID= $_GET['ID'];
         
         $query="SELECT * FROM pet WHERE owner_email='$OwnerEmail' AND ID = '$ID' ";
         $result=mysqli_query($database, $query);
         $row = mysqli_fetch_array($result);
         echo "<p> <img src= 'images/" .$row[2]. "' class= 'petPic' alt='Pet Picture'>  </p>";
         echo "<p> ".$row[1]."</p>";
         echo "<p> Date of birth : ".$row[3]."</p>";
         echo "<p> Gender : ".$row[8]."</p>";
         echo "<p> Breed: ".$row[4]."</p>";
         echo "<p> Status: ".$row[5]."</p>";
         
         ?>
    
    
    
      <?php
      print("<div class='editbut'>
      <a href = 'myPets.php'><button class ='Cbutton' type='button'>Cancel</button></a>
      <a href='editPetProfile.php?ID=$ID'><button class ='Dbutton' Classtype='button'>Edit</button></a>
      </div>");
      ?>


     

  
</div> 
    <div class="fixed-footer" > 
          <p class = "footer">  <i class="fa fa-phone"></i>  +966566923332 &nbsp;&nbsp; <i class="fa fa fa-envelope"></i> <a href="mailto:petcare@gmail.com">petcare@gmail.com</a> </p>     
    </div> 

</body>
</html>