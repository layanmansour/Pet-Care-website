<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
 <title>Edit Pet Profile</title>
 <link rel="stylesheet" href="styles/ownerHeader.css">
 <link rel="stylesheet" href="styles/addPet.css">
 <link href="styles/addPet.css?<?=filemtime("styles/addPet.css")?>" rel="stylesheet" type="text/css" />
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
           <img src="images/logo.png"  class= "logo" alt= "logo of pet care" >


     <?php
      if ( !( $database = mysqli_connect( "localhost", "root", "" ) ) )
      die( "<p>Could not connect to database</p>" );
    
       if ( !mysqli_select_db($database, "Pet_care" ) )
        die( "<p>Could not open URL database</p>" );

        $OwnerEmail = $_SESSION["OwnerEmail"]; 
        $ID=$_GET['ID'];
      
      $query="SELECT * FROM pet WHERE owner_email='$OwnerEmail' AND ID = '$ID' ";
      $result=mysqli_query($database, $query);
      $row = mysqli_fetch_array($result);

      print( "<div class='container'>

      <form method='post' action ="."editPetProfile.php?ID=$ID".">
                    <p><label>Pet name:<input type='text' name='Pname' id='Pname' value='".$row[1]."' required></label></p>
                    <p><label>Birth date: <input type='date' name='PetBD' id='PetBD' value='".$row[3]."' required></label></p>
                     
                    <div class='content'>
                      <div class='radio'>
                       <label for='gender'>Gender: </label>
                          <input type='radio' name='gender' id='gender' value='male' required>

                          <label for='male'>male</label>
                          <input type='radio' name='gender' id='gender' value='female' required>
                          <label for='female'>female</label>
                      </div></div>
      
                      
                      <div class='content'>
                        <div class='radio'>
                         <label for='status'>Status: </label>
                            <input type='radio' name='status' id='status' value='spayed' required>
                            <label for='spayed'>spayed</label>
                            <input type='radio' name='status' id='status' value='neutered' required>
                            <label for='neutered'>neutered</label>
                        </div></div>
      
                      <p><label>Pet breed: <input type='text' name='Pbreed' id='Pbreed'  value='".$row[4]."' required></label></p>
      
                      <p>Pet photo: <input type='file' id='petPhotoFile' name='petPhotoFile' value='".$row[2]."' accept='image/*'  required></p>
      
                      <p>vaccinations list(optional)
                      <input type='file' id='vacFile' name='vacFile' ></p>
                      <p>medical history (optional)
                      <input type='file' id='medFile' name='medFile' ></p>
        
                   <div class='submitbut'>
                   <a href='petProfile.php?ID=$ID'><button class ='Cbutton' type='button'>Cancel</button></a>
                   <a href='editPetProfile.php'><button class ='Dbutton' type='submit'>Save</button></a>
                   

                   </div>
      
                   
                
                </form>
                
           
         
            </div>" );

      
      if ($_SERVER["REQUEST_METHOD"] == "POST") {  
   
         $Pname=$_POST['Pname'];  
         $PetBD=$_POST['PetBD'];
         $gender=$_POST['gender']; 
         $Pbreed=$_POST['Pbreed']; 
         $status=$_POST['status']; 
         $petPhotoFile=$_POST['petPhotoFile']; 
         $vacFile=$_POST['vacFile']; 
         $medFile=$_POST['medFile']; 
      
         $query = "UPDATE pet SET name = '".$Pname."' ,photo ='".$petPhotoFile."' , birthDate='".$PetBD."', breed='".$Pbreed."', pet_status='".$status."', medicalHistory='".$medFile."', vaccinations='".$vacFile."', gender='".$gender."' WHERE owner_email='".$OwnerEmail."' AND ID = '".$ID."';";

        $result = mysqli_query($database, $query);
        if($result)
           header("location: petProfile.php?ID=$ID");
         
        else  
           echo "<script>alert('an error occurred, could not add pet.')</script>";  
     }  
 ?>
 
</div> 

</body>
</html>