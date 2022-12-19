<!DOCTYPE html>
<html>
  <head>
    <meta charset = "utf-8">
    <title>About Us</title>
    <link rel="stylesheet" href="styles/manageraboutusatyle.css">
    <link href="styles/ownerHeader.css?<?=filemtime("styles/ownerHeader.css")?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="styles/footer.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link href="styles/manageraboutusatyle.css?<?=filemtime("styles/manageraboutusatyle.css")?>" rel="stylesheet" type="text/css" />

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
      <!-- 
    <div class= "about"> <h2> About us </h2>  </div> 
    <br>
    
 <div class = "container" > 
  <br>
Welcome to our Petcare Veterinary Clinic! Where animals and their owners are valued and cherished. 
The clinic first opened its doors in Riyadh in January 2022. In Saudi Arabia, our clinic is the first of its kind. Our staff has been offering unique veterinary medical services and compassion to pets as a primary focus. 
We are here to keep your pets healthy by treating each client as if they were family and each pet as if it were our own. <br>
Our mission is to provide quality, caring, and compassionate veterinary care to pet owners in addition to detecting diseases and providing outstanding health care.<br> We specislize in the care of cats , dogs, rabbits, birds, fish, and turtles.
<br>  
Our location :
</div>
   


<div class = "map" >
  
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3622.7256444722366!2d46.68682081516388!3d24.77059418409634!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2efd3fc8ec4aeb%3A0x605baa975e4243f9!2sAdvanced%20Pet%20Clinic!5e0!3m2!1sen!2ssa!4v1645211168968!5m2!1sen!2ssa" width="200" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
</div>
  --> 
  <?php


  if ( !( $database = mysqli_connect( "localhost", "root", "" ) ) )
  die( "<p>Could not connect to database</p>" );

if ( !mysqli_select_db($database, "Pet_care" ) )
  die( "<p>Could not open URL database</p>" );

$query="SELECT * FROM aboutus";
$result=mysqli_query($database, $query);



if ($result) {
  
   while ($data = mysqli_fetch_row($result)) {
    print(" <div class = 'container' >  
    <div class= 'about'> <h2> ".$data[0]." </h2> </div> 

  <br>".$data[1]."
  <br> 
  
  Our location :
  <div class = 'map'>
<iframe src='".$data[4]."' width='200' height='250' style='border:0;' allowfullscreen='' loading='lazy'></iframe></div>

</div>



<div class='cont'>

       <div class='container1'>         
         <div id = 'image1 '> <img  src= 'images/".$data[2]."' alt='cheakup pic'> </div>
         </div>
         <div class='container2'>
         <div id = 'image1 '> <img  src= 'images/".$data[3]."' alt='cheakup pic'> </div>
         </div>
         
       </div>
        

");



   }
}

  ?>
<img  src= "images/logo.png"  class = "logo" alt="logo of pet care">
  </body>
</html>