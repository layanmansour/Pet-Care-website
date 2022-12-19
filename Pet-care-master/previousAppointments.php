<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Previous Appointments </title>
    <link rel="stylesheet" href="styles/datatable.css">
    <link href="styles/ownerHeader.css?<?=filemtime("styles/ownerHeader.css")?>" rel="stylesheet" type="text/css" />
        <link href="styles/datatable.css?<?=filemtime("styles/datatable.css")?>" rel="stylesheet" type="text/css" />

   </head>

<body>

  <div class="navbar">
    <a href="Pet Care.html"><img  src="images/logout-32.png " alt="logout icon"> </a>
    <a href="allReviews.php"> Reviews</a>
    <a href="previousAppointments.php"> Previous</a>
    <a href="upcomingAppointments.php"> Upcoming</a>
      <a href="appointmentRequests.php"> Requests</a>
    <a href="Services.php">Services</a>
    <a href="ManagerAboutUs.php">About Us</a>
 <a href="managerHomePage.html">Home</a>

</div>

    

    <table class="content-table" id= "center">
      <br>
      <h2>   Previous Appointments <br></h2>
      <thead>
      <tr>
        <th scope="col">Pet name</th>
        <th scope="col">Service</th>
        <th scope="col">Date</th>
        <th scope="col">Time</th>
        <th scope="col">Contact owner</th>
       


      </tr>
    </thead>
    <tbody>

      <?php
      if ( !( $database = mysqli_connect( "localhost", "root", "" ) ) )
  die( "<p>Could not connect to database</p>" );

if ( !mysqli_select_db($database, "Pet_care" ) )
  die( "<p>Could not open URL database</p>" );

$query="SELECT * FROM appointments_requests WHERE status='completed'";
$result=mysqli_query($database, $query);


if ($result) {
   while ($data = mysqli_fetch_row($result)) {
       print("<tr>      
       <th scope='row'><p>".$data[0]."</p>
       <td>".$data[1]."</td>
       <td>".$data[2]."</td>
       <td>".$data[3]."</td>
       <th>  <a href="."mailto:".$data[4].""."> Contact ".$data[0]. "'s Owner  </a> </th>");
   }
}

  ?>



    </tbody>
    <img src="images/logo.png" alt= "logo of pet care" class= "logo" >
  </table>
  <html>
