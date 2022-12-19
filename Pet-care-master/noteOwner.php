<!DOCTYPE html>
<html>
  <head>
    <meta charset = "utf-8">
    <title>note</title>
    <link rel="stylesheet" href="styles/writeReview.css">
       <link href="styles/footer.css?<?=filemtime("styles/footer.css")?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

  </head>
  
  <div class="fixed-footer" > 
        
        <p class = "footer">  <i class="fa fa-phone"></i>  +966566923332 &nbsp;&nbsp; <i class="fa fa fa-envelope"></i> <a href="mailto:petcare@gmail.com">petcare@gmail.com</a> </p>     
     
     </div>  
  
  <body>
  <div class="navbar">
    <a href = "ownerProfile.php"><img src = "images/Profile1.png"  class= "profile"  alt= "Profile image" ></a> 
    <a href="ownerPreviousAppointment.php"> Previous </a>
    <a href="ownerupcoming.php"> Upcoming </a>
    <a href="AppointmentRequest.php"> Requests</a>
 <a href="ownerServices.php">Services</a> 
 <a href="ownerAboutUs.php">About Us</a> 
 <a href="ownerHomePage.html">Home</a> 
 
     </div> 
    <br>
    
 <div class = "container"> 

      <?php
    
      $note= $_GET['note'];
    if($note)
      print("<h2> $note</h2>");
      else
      print("<h2>There is no note!</h2>");?>
   <br><br><br><br><br><br><br><br><br><br><br><br>
     <center> <a href="AppointmentRequest.php"><Button type="button">done</Button></a></center>
     
</div>
<img  src= "images/logo.png"  class = "logo" alt="logo of pet care">
  </body>
</html>