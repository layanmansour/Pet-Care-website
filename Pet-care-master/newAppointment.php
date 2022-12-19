<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book New Appointment</title>
    <link rel="stylesheet" href="styles/setApp.css">
    <link rel="stylesheet" href="styles/footer.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
       <link href="styles/ownerHeader.css?<?=filemtime("styles/ownerHeader.css")?>" rel="stylesheet" type="text/css" />
       <link href="styles/setApp.css?<?=filemtime("styles/setApp.css")?>" rel="stylesheet" type="text/css" />

</head>
<body>
  <!--<h1 id="Book">Book Now</h1>-->
           
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

                 </div> 
       <div class="fixed-footer" > 
        
        <p class = "footer">  <i class="fa fa-phone"></i>  +966566923332 &nbsp;&nbsp; <i class="fa fa fa-envelope"></i> <a href="mailto:petcare@gmail.com">petcare@gmail.com</a> </p>     
     
     </div>  


                 
    <div class = "container">
        <h2>Book appointment</h2>
        <?php      $service= $_GET['service'];
                    $date = $_GET['date'];
                    $time = $_GET['time']; 
                    $id =  $_GET['id']; ?>

        <form method="POST" action=<?php echo "newAppointment.php?service=".$service."&date=".$date."&time=".$time."&id=".$id ?>> 
       <br>
       
       <p><label>Pet name: <select name = "PetName">
       <?php 
       if ( !( $database = mysqli_connect( "localhost", "root", "" ) ) )
       die( "<p>Could not connect to database</p>" );

      if ( !mysqli_select_db( $database, "Pet_care") )
       die( "<p>Could not open URL database</p>" );
        //retrive all pet names 
        $owner_email = $_SESSION["OwnerEmail"];
        $query="SELECT * FROM pet WHERE owner_email=  '$owner_email' ";
        $result= mysqli_query($database, $query);
        while ($data= mysqli_fetch_row( $result)){
            print("<option>".$data[1]."</option>");

        }

        ?>
         </select></label></p>
       <br>
       <p><label>Note    : <input name= "note" type ="text" ></label>
       <br><br><br>
      
       <p>  <a href="bookAppointment.php"><button class= "l" type="submit">Cancel</button></a> 
       <a href="bookAppointment.php"><button class= "l2" type="submit">Book</button></a>
      

    </form>



    <?php 
       if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ( !( $database = mysqli_connect( "localhost", "root", "" ) ) )
           die( "<p>Could not connect to database</p>" );

        if ( !mysqli_select_db( $database, "Pet_care") )
           die( "<p>Could not open URL database</p>" );

          
           if(filter_var(  $owner_email , FILTER_VALIDATE_EMAIL))
           {
           
            $name =  $_POST["PetName"];
            $note =   $_POST["note"];
            $owner_email = $_SESSION["OwnerEmail"];
            $service= $_GET['service'];
            $date = $_GET['date'];
            $time = $_GET['time'];
            $id =  $_GET['id'];
            
            mysqli_query($database ,"DELETE FROM available_appointments WHERE appointment_id='".$id."'");
         $query="INSERT INTO appointments_requests (pet_name, service, date , time ,owner_email , note ) VALUES ('".$name."','".$service."','".$date."','".$time."','".$owner_email."','".$note."');";
         $result=mysqli_query($database, $query);
         if($result)
         header("location:AppointmentRequest.php");
        
          } 
          else {
            echo(" invalid email");

          }
        }
        ?>
        
        
    </div>
              

    
</body>
</html>