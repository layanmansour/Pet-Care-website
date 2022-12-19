<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="styles/appointmentDetails.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles/appointmentDetails.css?<?=filemtime("styles/appointmentDetails.css")?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
       <link href="styles/footer2.css?<?=filemtime("styles/footer2.css")?>" rel="stylesheet" type="text/css" />
    <title>Edit Appointment Request</title>

</head>


    <body>
     

    <div class="fixed-footer" > 
        
        <p class = "footer">  <i class="fa fa-phone"></i>  +966566923332 &nbsp;&nbsp; <i class="fa fa fa-envelope"></i> <a href="mailto:petcare@gmail.com">petcare@gmail.com</a> </p>     
     
     </div> 
     
        <div class = "container">
        <h2>Edit an appointment <br> </h2>
        <?php $id = $_GET['id'];  ?>
        <form method='POST' action= <?php 'appointmentDetails.php?id='.$id ?>>
        <p><label>Pet name: <select name = "pet_name" style="width:170px;">
        <?php 
         if ( !( $database = mysqli_connect( "localhost", "root", "" ) ) )
         die( "<p>Could not connect to database</p>" );

      if ( !mysqli_select_db( $database, "Pet_care") )
         die( "<p>Could not open URL database</p>" );
        
          $query="SELECT * FROM appointments_requests WHERE id= $id";
          $result=mysqli_query($database, $query);
          $data = mysqli_fetch_row($result);
           //retrive all pet names 
        $owner_email = $_SESSION["OwnerEmail"];
        $query2="SELECT * FROM pet WHERE owner_email=  '$owner_email' ";
        $result2= mysqli_query($database, $query2);
        while ($data2= mysqli_fetch_row( $result2)){
            print("<option>".$data2[1]."</option>");

        }
  
        print("
        </select></label></p>
     <p> <label> Note :  <input name= 'note' type ='text' value='".$data[6]."'> </label> 
     <a href='appointmentDetails.php'><button class ='l2'type='submit'>Cancel</button></a>
     <a href='appointmentDetails.php'><button class ='l'type='submit'>Save</button></a> 
    </form>
    </div>
    ");
          
          if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
                $pet_name = $_POST["pet_name"];
                 $note =  $_POST["note"];
                 $id =  $_GET['id'];
                 $query = "UPDATE appointments_requests SET pet_name ='".$pet_name."',note ='".$note."' WHERE id='".$id."'";
              $result=mysqli_query($database, $query);
                if($result)
                       header("location: AppointmentRequest.php");
           
                   else
                       echo "An error occured while completing your request.";
            }
   
             ?>
                 
                  <!--<img  src= "images/dog-layan (1).png"  class = "dog" alt="dog"> -->
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
      
          
  
    
</body>
</html>