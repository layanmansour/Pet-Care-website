<!DOCTYPE html>
<html>
  <head>
    <meta charset = "utf-8">
    <title>Services</title>
    <link rel="stylesheet" href="styles/servicesstyle.css">
    <link rel="stylesheet" href="styles/ownerHeader.css">
    <link rel="stylesheet" href="styles/footer.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link href="styles/servicesstyle.css?<?=filemtime("styles/servicesstyle.css")?>" rel="stylesheet" type="text/css" />

  </head>

  <body>
    <div class="navbar">
      
      <a href="logIn.php">Login</a>
     <a href = "mainServices.php">Services </a>
     <a href ="mainAboutus.php">About Us</a>
     <a href = "Pet Care.html">Home</a>
        </div> 
        <div class="fixed-footer" > 
        
        <p class = "footer">  <i class="fa fa-phone"></i>  +966566923332 &nbsp;&nbsp; <i class="fa fa fa-envelope"></i> <a href="mailto:petcare@gmail.com">petcare@gmail.com</a> </p>     
     
     </div>  
        <br>
        <br>
        
   <h2 class = "h1"> <center> We are open for all your pet's veterinary care needs! </center></h2>
 <h1 class = "h1"> <center> Our Services </center> </h1>
 
 
<!--
<div class ="cont">

<div class="container1">
   
     <h4 >Grooming </h4> 
    grooming session consists of the pet being brushed , bathed , and dried. <br> 
    price: 70SR
    <div class = "image1 "> <img  src= "images/grooming.jpeg" alt="grooming pic"> </div>
    </div>
    
    <div class="container2">
    
     <h4 > Boarding </h4>
      providing a palce where your pet can stay overnight or longer.<br>  
      price: 120SR 
      <div class = "image1 "> <img  src= "images/Boarding.jpeg" alt="Boarding pic"> </div>
    </div>
     
      <div class="container3">
     <h4>Checkup </h4> 
      tests that are meant to detect any signs of health issues that your pet may be facing.<br>
      price: 180SR <br>
      <div class = "image1 "> <img  src= "images/cheakup.jpeg" alt="cheakup pic"> </div>
    </div>
  
   </div> 
-->
<?php
  


  if ( !( $database = mysqli_connect( "localhost", "root", "" ) ) )
  die( "<p>Could not connect to database</p>" );

if ( !mysqli_select_db($database, "Pet_care" ) )
  die( "<p>Could not open URL database</p>" );

$query="SELECT * FROM services";
$result=mysqli_query($database, $query);


if ($result) {
   while ($data = mysqli_fetch_row($result)) {
       print(" <div class ='cont'>

       <div class='container1'>
        
          <h4 >".$data[0]. "</h4> "
          .$data[1]. "<br> 
         price:" .$data[2]."SR
         <div class = 'image1 '> <img  src= 'images/".$data[3]."' alt='cheakup pic'> </div>
         </div>
         
       
        </div> <br> "
        
       
       );
   }
}

  ?>
   <img  src= "images/logo.png"  class = "logo" alt="logo of pet care">
  </body>
</html>