<?php 
          
          
              if ( !( $database = mysqli_connect( "localhost", "root", "" ) ) )
                 die( "<p>Could not connect to database</p>" );

              if ( !mysqli_select_db( $database, "Pet_care") )
                 die( "<p>Could not open URL database</p>" );
                 $id= $_GET['id'];
                
                 mysqli_query($database ,"UPDATE appointments_requests SET status = 'completed' WHERE id='".$id."'");
                // $query= "INSERT INTO previous_requests(pet_name,service, date,time,owner_email) VALUES ('".$pet_name."','".$service."','".$date."','".$time."','".$owner_email."');";
                // $result=mysqli_query($database, $query);
                
                     header("location: previousAppointments.php");
         
                
      
 
           ?>