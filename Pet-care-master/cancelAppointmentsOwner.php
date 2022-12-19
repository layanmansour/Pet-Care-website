<?php
if ( !( $database = mysqli_connect( "localhost", "root", "" ) ) )
die( "<p>Could not connect to database</p>" );

if ( !mysqli_select_db($database, "Pet_care" ) )
die( "<p>Could not open URL database");
$id = $_GET['id']; 
$service = $_GET['service'];
$date= $_GET['date'];
$time=$_GET['time'];
//if the owner cancels the appointment bring it back to the available appointment


$res=mysqli_query($database ,"INSERT INTO available_appointments (service,date,time) VALUES ('".$service."','".$date."','".$time."')");
if(!$res)
die(mysqli_error($database ));

mysqli_query($database ,"DELETE FROM appointments_requests WHERE id='".$id."'");
mysqli_close($database);
header("Location: AppointmentRequest.php");
?>