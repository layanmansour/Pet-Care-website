<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upcoming Appointments  </title>
    <link rel="stylesheet" href="styles/AppointmentRequest.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="styles/ownerHeader.css?<?=filemtime("styles/ownerHeader.css")?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="styles/footer2.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
       <link href="styles/datatable.css?<?=filemtime("styles/datatable.css")?>" rel="stylesheet" type="text/css" />
       <link href="styles/footer2.css?<?=filemtime("styles/footer2.css")?>" rel="stylesheet" type="text/css" />


    </head>
</head>
<body>
  
  <div class="navbar">
    <a href = "ownerProfile.php"><img src = "images/Profile.png"  class= "profile"  alt= "Profile image" ></a> 
  
    <a href="ownerPreviousAppointment.php"> Previous </a>
    <a href="ownerupcoming.php"> Upcoming </a>
    <a href="AppointmentRequest.php"> Requests</a>
 <a href="ownerServices.php">Services</a> 
 <a href="ownerAboutUs.php">About Us</a> 
 <a href="ownerHomePage.html">Home</a> 
 
 <img src="images/logo.png"  class= "logo" alt= "logo of pet care" >
 
     </div> 
     <div class="fixed-footer" > 
        
        <p class = "footer">  <i class="fa fa-phone"></i>  +966566923332 &nbsp;&nbsp; <i class="fa fa fa-envelope"></i> <a href="mailto:petcare@gmail.com">petcare@gmail.com</a> </p>     
     
     </div>  

       <table class="content-table" id= "center">
        <thead>
          
        <tr>
          <th scope="col">Pet name</th>
          <th scope="col">Service </th>
          <th scope="col">Date</th>
          <th scope="col">Time</th>
          <th scope="col">Note</th>
         
          
    
           
        </tr>
      </thead>
      <tbody>
        <br>
        <h2>Upcoming Appointment<br> </h2>
        
        <?php
  


  if ( !( $database = mysqli_connect( "localhost", "root", "" ) ) )
  die( "<p>Could not connect to database</p>" );

if ( !mysqli_select_db($database, "Pet_care" ) )
  die( "<p>Could not open URL database</p>" );
  $owner_email = $_SESSION["OwnerEmail"];
$query="SELECT * FROM appointments_requests WHERE status='accepted' and  owner_email='$owner_email'";
$result=mysqli_query($database, $query);


if ($result) {
   while ($data = mysqli_fetch_row($result)) {
       print("<tr>      
       <th scope='row'><p>".$data[0]."</p>
       <td>".$data[1]."</td>
       <td>".$data[2]."</td>
       <td>".$data[3]."</td>
       <td> <a href=\"noteOwner.php?note=".$data[6]."\"><img src= 'images/sticky-note.png' ></a></td>
      ");
   }
}
else
echo "An error occured while completing your request.";

  ?>
         
      
      </tbody>
    </table>
   </body>
    </html>