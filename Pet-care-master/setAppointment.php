<!DOCTYPE html>
<html>
<head>
    <meta charset = "utf-8">
    <title>Set New Appointment</title>
    <link rel="stylesheet" href="styles/setApp.css">
    <link href="styles/ownerHeader.css?<?=filemtime("styles/ownerHeader.css")?>" rel="stylesheet" type="text/css" />
    <link href="styles/setApp.css?<?=filemtime("styles/setApp.css")?>" rel="stylesheet" type="text/css" />

</head>
<body>
    
    <div class="navbar">
        <a href="Pet Care.html"><img  src="images/logout-32.png " alt="logou icon"> </a>
  
        <a href="availableAppointments.php">Available appointments</a>
          <a href="appointmentRequests.php">Appointments requests</a>
          <a href="Services.php"> Services</a>
          <a href="ManagerAboutUs.php">About us</a>
      <a href="managerHomePage.html">Home</a>
  
       
          </div> 
         
    <div class = "container">
        <h2>Set an appointment</h2>
        <form method="POST" action="setAppointment.php">
        <p><label>Service: <select name = "services">
        <?php 
       if ( !( $database = mysqli_connect( "localhost", "root", "" ) ) )
       die( "<p>Could not connect to database</p>" );

      if ( !mysqli_select_db( $database, "Pet_care") )
       die( "<p>Could not open URL database</p>" );
        //retrive all services
        $query_allServices="SELECT * FROM services";
        $result_allServices= mysqli_query($database, $query_allServices);
        while ($dataS = mysqli_fetch_row( $result_allServices)){
            print("<option>".$dataS[0]."</option>");

        }

        ?>
         </select></label></p>
       <br>
       <p><label>Date: <input name = "date" type="date" required></label></p>
       <br>
       <p><label>Time: <input name= "time" type ="time" required></label>
    <a href="availableAppointments.php"><button class = "l"type="button">Cancel</button></a>
    <a href="availableAppointments.php"><button class = "l2" type="submit">Add</button></a>

    </form>
    <?php
             if ($_SERVER["REQUEST_METHOD"] == "POST") {
                
                    $service =  $_POST["services"];
                    $date =   $_POST["date"];
                    $time =  $_POST["time"];

                 $query="INSERT INTO available_appointments (service, date, time) VALUES ('".$service."','".$date."','".$time."');";
                 $result=mysqli_query($database, $query);
                 if($result)
                        header("location: availableAppointments.php");
            
                    else
                        echo "An error occured while completing your request.";
             }
        ?>
    </div>
    
    <img  src= "images/logo.png"  class = "logo" alt="logo of pet care">
   
</body>
</html>