<!DOCTYPE html>
<html>
  <head>
    <meta charset = "utf-8">
    <title>View Review</title>
    <link rel="stylesheet" href="styles/viewReview.css">


  </head>

  <body>
    <div class="navbar">
      <a href="Pet Care.html"><img  src="images/logout-32.png " alt="logou icon"> </a>
      <a href="managerContactUs.php">Contact Us</a>

      <a href="availableAppointments.php">Available appointments</a>
        <a href="appointmentRequests.php">Appointments requests</a>
        <a href="Services.php"> Services</a>
        <a href="ManagerAboutUs.php">About us</a>
    <a href="managerHomePage.html">Home</a>
        </div> 
        </div> 
    <br>
    
   
    <div class = 'container'> 
      <?php
  
  if ( !( $database = mysqli_connect( "localhost", "root", "" ) ) )
  die( "<p>Could not connect to database</p>" );

if ( !mysqli_select_db($database, "Pet_care" ) )
  die( "<p>Could not open URL database</p>" );
   $id =$_GET['id'];
$query="SELECT * FROM review WHERE review_id=$id"; // specify by id 
$result=mysqli_query($database, $query);


if ($result) {
   while ($data = mysqli_fetch_row($result)) {
       print(" 
      
       <p> <img class='petPic' src= 'images/".$data[4]."' alt='cheakup pic'>  </p>
       <div id='p'>".$data[1]."'s Owner </div>
       <div class='subcontainer'>
       <p>  ".$data[3]." </p>
      </div>
      <p> <a href="."mailto:".$data[2]."'".">  Contact ".$data[1]. "'s Owner  </a> </p>
      <p class='editbut'>
      <a href='previousAppointments.php'><button type='Save'>Back</button></a>
     </p>

      ");
      }
}
// <img src="data:image;base64,'.base64_encode($data['image'//]).'>   
?>

</div>
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