<?php
if ( !( $database = mysqli_connect( "localhost", "root", "" ) ) )
die( "<p>Could not connect to database</p>" );

if ( !mysqli_select_db($database, "Pet_care" ) )
die( "<p>Could not open URL database");

$ID= $_GET['ID'];
         
$query="DELETE FROM pet WHERE ID = '$ID' ";
mysqli_query($database , $query );
mysqli_close($database);
header("Location: myPets.php");
?>