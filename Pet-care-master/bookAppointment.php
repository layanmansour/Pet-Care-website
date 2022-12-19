<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   
    <title>Book New Appointment</title>
    <link rel="stylesheet" href="styles/datatable.css">
    <link href="styles/ownerHeader.css?<?=filemtime("styles/ownerHeader.css")?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="styles/footer2.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
           <link href="styles/datatable.css?<?=filemtime("styles/datatable.css")?>" rel="stylesheet" type="text/css" />
       <link href="styles/footer2.css?<?=filemtime("styles/footer2.css")?>" rel="stylesheet" type="text/css" />

   
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
         <div class="fixed-footer" > 
        
        <p class = "footer">  <i class="fa fa-phone"></i>  +966566923332 &nbsp;&nbsp; <i class="fa fa fa-envelope"></i> <a href="mailto:petcare@gmail.com">petcare@gmail.com</a> </p>     
     
     </div> 
        
      <img src="images/logo.png"  class= "logo" alt= "logo of pet care" >
      <table class="content-table" id= "center">
     <br>
     <h2>Book Appointments <br> </h2>
  <thead>

      <tr>
        <th scope="col">Service</th>
        <th scope="col">Date</th>
        <th scope="col">Time</th>
        <th scope="col">Book</th>
       
         
      </tr>
</thead>

<tbody>


      <?php
  


  if ( !( $database = mysqli_connect( "localhost", "root", "" ) ) )
  die( "<p>Could not connect to database</p>" );

  if ( !mysqli_select_db($database, "Pet_care" ) )
  die( "<p>Could not open URL database</p>" );

$query="SELECT * FROM available_appointments";
$result=mysqli_query($database, $query);


/*if ($result) {
   while ($data = mysqli_fetch_row($result)) {
       print("<tr> <th scope='row'>".$data[0]."</th>
       <td>".$data[1]."</td>
       <td>".$data[2]."</td>
       <td> <a href=\"deleteToEdit.php?id=".$data[2]."\"><h3>Book Appointment<h3></a></td><tr>);
*/

if ($result) {
  while ($data = mysqli_fetch_row($result)) {
      print("<tr> <th scope='row'>".$data[0]."</th>
      <td>".$data[1]."</td>
      <td>".$data[2]."</td>
      <td> <a href=\"newAppointment.php?service=".$data[0]."&date=".$data[1]."&time=".$data[2]."&id=".$data[3]."\"><h4>Book now </h4></a></td></tr>");
  }
}

  ?>
  
  </tbody>
    </table>

    


</body>
</html>