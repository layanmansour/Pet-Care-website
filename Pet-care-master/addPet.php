<?php
    session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset = "utf-8">
    <title>add a Pet</title>
    <link rel="stylesheet" href="styles/ownerHeader.css">
    <link rel="stylesheet" href="styles/addPet.css">
      <link href="styles/addPet.css?<?=filemtime("styles/addPet.css")?>" rel="stylesheet" type="text/css" />
  

  <body>

    <div class="navbar">
      <a href = "ownerProfile.php"><img src = "images/Profile1.png"  class= "profile"  alt= "Profile image" ></a>
   <a href = "myPets.php">My Pets</a>
   <a href = "AppointmentRequest.php">My Appointments</a>
   <a href="ownerServices.php" class= "active"> Services</a>
   <a href="ownerAboutUs.php">About us</a>
   <a href = "ownerHomePage.html">Home</a>
   
       </div> 
       
       <img src="images/logo.png"  class= "logo" alt= "logo of pet care" >


      <div class="container">
          <h2>Add Pet</h2>
          <form method="post" action = "addPet.php">
              <p><label>Pet name:<input type="text" name="Pname" id="Pname"  required></label></p>
              <p><label>Birth date: <input type="date" name="PetBD" id="PetBD"  required></label></p>
               
              <div class="content">
                <div class="radio">
                 <label for="gender">Gender: </label>
                    <input type="radio" name="gender" id="gender" value="male" required>
                    <label for="male">male</label>
                    <input type="radio" name="gender" id="gender" value="female" required>
                    <label for="female">female</label>
                </div></div>

                
                <div class="content">
                  <div class="radio">
                   <label for="status">Status: </label>
                      <input type="radio" name="status" id="status" value="spayed" required>
                      <label for="spayed">spayed</label>
                      <input type="radio" name="status" id="status" value="neutered" required>
                      <label for="neutered">neutered</label>
                  </div></div>

                <p><label>Pet breed: <input type="text" name="Pbreed" id="Pbreed"  required></label></p>

                <p>Pet photo: <input type="file" id="petPhotoFile" name="petPhotoFile" accept="image/*" required></p>

                <p>vaccinations list(optional)
                <input type="file" id="vacFile" name="vacFile" ></p>
                <p>medical history (optional)
                <input type="file" id="medFile" name="medFile" ></p>
  
             <div class="submitbut">
              
              <a href="myPets.php"><button class = "Cbutton"type="button">Cancel</button></a>
               <a href = "addPet.php"><input class = "Dbutton" type = "submit" value="Add"></a>

             </div>

             
          
          </form>
          
     
   
      </div>

      <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {  
      if (!( $database = mysqli_connect( "localhost", "root", "" )))
         die( "<p>Could not connect to database</p>" );
 
      if (!mysqli_select_db( $database, "Pet_care" ))
         die( "<p>Could not open URL database</p>" );
   
         $Pname=$_POST['Pname'];  
         $PetBD=$_POST['PetBD'];
         $gender=$_POST['gender']; 
         $Pbreed=$_POST['Pbreed']; 
         $status=$_POST['status']; 
         $petPhotoFile=$_POST['petPhotoFile']; 
         $vacFile=$_POST['vacFile']; 
         $medFile=$_POST['medFile']; 

         $OwnerEmail = $_SESSION["OwnerEmail"];

         $query="INSERT INTO pet (name, photo, birthDate, breed, pet_status, medicalHistory, vaccinations, gender , owner_email)VALUES ('".$Pname."','".$petPhotoFile."','".$PetBD."','".$Pbreed."','".$status."','".$medFile."','".$vacFile."','".$gender."','".$OwnerEmail."')";
        
        $result = mysqli_query($database, $query);
        if($result)
           header("location: myPets.php");
         
        else  
        die(mysqli_error($database ));
         echo "<script>alert('an error occurred, could not add pet.')</script>";  
     }  
 ?>

  </body>
</html>