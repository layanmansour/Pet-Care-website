<!DOCTYPE html>
<html>
  <head>
    <meta charset = "utf-8">
    <title>Write Review</title>
    <link rel="stylesheet" href="styles/writeReview.css">
       <link href="styles/writeReview.css?<?=filemtime("styles/writeReview.css")?>" rel="stylesheet" type="text/css" />
 <link href="styles/footer.css?<?=filemtime("styles/footer.css")?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

  </head>

  <div class="fixed-footer" > 
        
        <p class = "footer">  <i class="fa fa-phone"></i>  +966566923332 &nbsp;&nbsp; <i class="fa fa fa-envelope"></i> <a href="mailto:petcare@gmail.com">petcare@gmail.com</a> </p>     
     
     </div>  
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
    <br>
    
 <div class = "container" > 

  
 <center> <h2>Thank you for visiting <br> please leave under your review on pet care!</h2></center>
      <?php
      $id = $_GET['id'];
      $pet_name = $_GET['pet_name'];
      $owner_email = $_GET['owner_email'];?>
      
      <form method = "POST" action = <?php echo "\"writeReview.php?id=".$id."&pet_name=".$pet_name."&owner_email=".$owner_email."\"" ?>>
    
       <input name = "review" type = "text" style="height:100px; width:350px;"> 
      <br><br><br><br><br><br>
        <div class="loginbut">    
            <a href="ownerPreviousAppointment.php"><Button class= "l" type="submit">Cancel</Button></a>
 <a href="ownerPreviousAppointment.php"><Button class= "l2" >Submit</Button></a>

     </div>

</form>

   
</div>
<?php
             if ($_SERVER["REQUEST_METHOD"] == "POST") {
                 if ( !( $database = mysqli_connect( "localhost", "root", "" ) ) )
                    die( "<p>Could not connect to database</p>" );

                 if ( !mysqli_select_db( $database, "Pet_care") )
                    die( "<p>Could not open URL database</p>" );
                    $id = $_GET['id'];
                    $pet_name = $_GET['pet_name'];
                    $owner_email = $_GET['owner_email'];
                    $review = $_POST['review'];  
                    $photo_query = "SELECT photo from pet WHERE name ='$pet_name' AND owner_email='$owner_email'";
                   $photo_result  =mysqli_query($database, $photo_query); 
                   $photo_data = mysqli_fetch_row($photo_result);
                   $photo = $photo_data[0];
                 $query="INSERT INTO review (review_id,pet_name, owner_email, review , photo ) VALUES ('".$id."','".$pet_name."','".$owner_email."','".$review."','".$photo."');";
                 $result=mysqli_query($database, $query);
                 if($result)
                 header("location:ownerPreviousAppointment.php");
                

               
             }
        ?>
    
    <br>
    <br>
    <br>

   
    <br>
    <br> <br>
    <br>
    <br> <br>
    <br>
    <br> <br></div>
</p>
<img  src= "images/logo.png"  class = "logo" alt="logo of pet care">
  </body>
</html>