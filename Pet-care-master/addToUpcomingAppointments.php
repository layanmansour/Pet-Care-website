<?php 
          
          
              if ( !( $database = mysqli_connect( "localhost", "root", "" ) ) )
                 die( "<p>Could not connect to database</p>" );

              if ( !mysqli_select_db( $database, "Pet_care") )
                 die( "<p>Could not open URL database</p>" );
                 $id= $_GET['id'];
                
                 mysqli_query($database ,"UPDATE appointments_requests SET status = 'accepted' WHERE id='".$id."'");
                
                     header("location: upcomingAppointments.php");
         
                
      
 
           ?>