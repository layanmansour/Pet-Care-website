<!DOCTYPE >
<html> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="styles/allReviews.css?<?=filemtime("styles/allReviews.css")?>" rel="stylesheet" type="text/css" />
    <link href="styles/ownerHeader.css?<?=filemtime("styles/ownerHeader.css")?>" rel="stylesheet" type="text/css" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Reviews</title>

</head>
<body> 
    <img src="images/logo.png"  class= "logo" alt= "logo of pet care" >
    <div class="navbar">
        <a href="Pet Care.html"><img  src="images/logout-32.png " alt="logou icon"> </a>
    
      <a href="availableAppointments.php">Available appointments</a>
        <a href="appointmentRequests.php">Appointments requests</a>
        <a href="Services.php"> Services</a>
        <a href="ManagerAboutUs.php">About us</a>
        <a href="managerHomePage.html">Home</a>
    
        
        
      </div>
    <div class="testimonials">
        <div class="inner">
          <h1>All Reviews</h1>
          <div class="border"></div>
          <div class="row">
         
      <?php
  
    if ( !( $database = mysqli_connect( "localhost", "root", "" ) ) )
      die( "<p>Could not connect to database</p>" );
    if ( !mysqli_select_db($database, "Pet_care" ) )
      die( "<p>Could not open URL database</p>" );
    $query="SELECT * FROM review";

    $result=mysqli_query($database, $query);
    if ($result) {
      while ($data = mysqli_fetch_row($result)) {
       print("
               <div class='col'>
                   <div class='testimonial'>
                   <p> <img class= 'lulu' src= 'images/".$data[4]."' alt='cheakup pic'>  </p>
                     <div class='name'>".$data[1]."'s Owner </div>
                     <p>  ".$data[3]." </p>
                    <p> <a href="."mailto:".$data[2]."".">  Contact ".$data[1]. "'s Owner  </a> </p>
                   </div>
                 </div>
                 ");
   }
        }


      
    
      ?>
      </div>
      </div>

</body>
</html>
