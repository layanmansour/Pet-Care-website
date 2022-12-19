<?php
    session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset = "utf-8">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="styles/ownerHeader.css">
    <link rel="stylesheet" href="styles/ownerEditProfile.css">
    <link href="styles/ownerEditProfile.css?<?=filemtime("styles/ownerEditProfile.css")?>" rel="stylesheet" type="text/css" /> 
    <link rel="stylesheet" href="styles/footer.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
     <link href="styles/footer.css?<?=filemtime("styles/footer.css")?>" rel="stylesheet" type="text/css" />

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
      
      $query="SELECT * FROM pet_owner WHERE email='$OwnerEmail' ";
      $result=mysqli_query($database, $query);
      $row = mysqli_fetch_array($result);

      print( "<div class='container'>
        <form method='post'>
          <div class='profilePic'>
            <img src = 'images/profileEdit.png'  class= 'profilePic'  alt= 'Profile image' height='200' width='200'>
           
         
          </div>
          
          <input type='file' id='profilePhotoFile' name='profilePhotoFile' accept='image/*' >
          <div class='phone details'>
           <br><br>
            <p>First name: <br>
            <input type='text' name='Fname' value='".$row[2]."' required> </p>
            <p>Last name:<br>
            <input type='text'  name='Lname' value='".$row[3]."' required> </p>
            <p>Phone number:<br>
            <input type='text'  name='phonenumber'value='0".$row[5]."'required ></p>
            <p>Password:<br>
            <input type='text'  name='pass' value='".$row[1]."' pattern='(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}' title='Must contain at 
            least one number and one uppercase and lowercase letter, and at least 8 or more characters' required ></p>
  
          </div>
          
          
          <br>
          <br>
          
         <div class='editbutton'>
          <a href='ownerProfile.php'><button class='l2' type='button'>Cancel</button></a>
          <a href='ownerEditProfile.php'><button class='l' type='submit'>Save</button></a>
        </div> 

      </div>
      </form>
      <div class='fixed-footer' > 
          <p class = 'footer'>  <i class='fa fa-phone'></i>  +966566923332 &nbsp;&nbsp; <i class='fa fa fa-envelope'></i> <a href='mailto:petcare@gmail.com'>petcare@gmail.com</a> </p>     
       </div>");

      
      if ($_SERVER["REQUEST_METHOD"] == "POST") {  

        if (!mysqli_select_db( $database, "Pet_care" ))
        die( "<p>Could not open URL database</p>" );
        $Fname=$_POST['Fname'];  
        $Lname=$_POST['Lname'];
        if(strlen($Fname) < 20 && strlen(  $Lname) < 20 ){ 
        if(filter_var(  $OwnerEmail , FILTER_VALIDATE_EMAIL)){
        $phonenumber=$_POST['phonenumber']; 
        if(preg_match('/^[0-9]{10}+$/', $phonenumber))
          {

         $Fname=$_POST['Fname'];  
         $Lname=$_POST['Lname']; 
         $phonenumber=$_POST['phonenumber']; 
         $pass=$_POST['pass']; 
         $profilePhotoFile=$_POST['profilePhotoFile']; 

         $query = "UPDATE pet_owner SET password = '".$pass."',Fname = '".$Fname."', Lname = '".$Lname."',phone_no = '".$phonenumber."', photo = '".$profilePhotoFile."' WHERE email =  '$OwnerEmail'"; 
       
        $result = mysqli_query($database, $query);
        if($result)
           header("location: ownerProfile.php");
         
        else  
           echo "<script>alert('an error occurred, could not edit profile.')</script>";  
     }
     else 
     echo "<script>alert('Invalid phone number format')</script>"; 
    
    }
    else
    echo "<script>alert('Invalid email format')</script>"; 
  }
  else
    echo "<script>alert('length of name should be less than or equal to 20 characters')</script>";    
    
}  
 ?>

  </body>
</html>