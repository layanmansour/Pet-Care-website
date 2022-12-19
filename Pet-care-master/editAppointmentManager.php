
<!DOCTYPE html>
<html>
<head>
    <meta charset = "utf-8">
    <title>Set Appointment</title>
    <link rel="stylesheet" href="styles/editApp.css">
        <link href="styles/editApp.css?<?=filemtime("styles/editApp.css")?>" rel="stylesheet" type="text/css" />

</head>

<body>
    
    <div class="navbar">
        <a href="Pet Care.html"><img  src="images/logout-32.png " alt="logou icon"> </a>
      <a href="appointmentRequests.php">Appointment requests</a>
      <a href="Services.php"> Services</a>
      <a href="ManagerAboutUs.php">About us</a>
      <a href="managerHomePage.html"> Home</a>
       
          </div> 
    <div class = "container">
        <h2>Edit an appointment</h2>
        <?php $id = $_GET['id']; ?>
        <form method='POST' action= <?php 'editAppointmentManager.php?id='.$id ?>>
        <?php 
          if ( !( $database = mysqli_connect( "localhost", "root", "" ) ) )
          die( "<p>Could not connect to database</p>" );

       if ( !mysqli_select_db( $database, "Pet_care") )
          die( "<p>Could not open URL database</p>" );
          //available_appointments
          $query="SELECT * FROM available_appointments WHERE appointment_id= $id";
          $result=mysqli_query($database, $query);
          $data = mysqli_fetch_row($result);
          //form
          print(" 
          <p><label>Service: <select name = 'services'>");
          //retrive all services
          $query_allServices="SELECT * FROM services";
          $result_allServices= mysqli_query($database, $query_allServices);
          while ($dataS = mysqli_fetch_row( $result_allServices)){
              print("<option>".$dataS[0]."</option>");

          }
print("
        </select></label></p>
       <br>
       <p><label>Date: <input name = 'date' type='date' value='".$data[1]."'></label></p>
       <br>
       <p><label>Time: <input name= 'time' type ='time'value='".$data[2]."'></label>
       <a href='availableAppointments.php'><button class = 'l' type='button'>Cancel</button></a>
       <a href='editAppointmentManager.php'><button class = 'l2' type='submit'>Edit</button></a>
    
    </form>
    </div>
");
    
          
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
        

                   $service =  $_POST["services"];
                   $date =   $_POST["date"];
                   $time =  $_POST["time"];
                   $id =  $_GET['id'];
                   $query = "UPDATE available_appointments SET service ='".$service."',date= '".$date."',time ='".$time."' WHERE appointment_id='".$id."'";
                $result=mysqli_query($database, $query);
                if($result)
                       header("location: availableAppointments.php");
           
                   else
                       echo "An error occured while completing your request.";
            }
   
             ?>
      
    
    <img  src= "images/logo.png"  class = "logo" alt="logo of pet care">
   
</body>
</html>