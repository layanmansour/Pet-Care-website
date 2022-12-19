
    <!DOCTYPE html>

    <head>
        <meta charset = "utf-8">
        <title>Add a Service</title>
        <link rel="stylesheet" href="styles/addService.css">
           <link href="styles/addService.css?<?=filemtime("styles/addService.css")?>" rel="stylesheet" type="text/css" />

    </head>
    <body>
        <div class="navbar"></div>
        <div class="container">
            <h2>Add a new Service </h2>
            <form method="post" action = "addAService.php">
                Service name :
                <input type="text" name="name" required >

                Description :
                <input type="text" style="height: 80px; width:350px;" name="Description" required >

                Price :
                <input type="text" name="price" required >

                photo: 
                <input type="file" name="profilePhotoFile" required>
    

               <div class="but">
                
                <a href="Services.php"><button class = "Cbutton" type="button">Cancel</button></a>
                <a href="Services.php"><button class = "Dbutton" type="submit">Add</button></a>
               </div>
               
                
            </form>
      
        <?php
             if ($_SERVER["REQUEST_METHOD"] == "POST") {
                 if ( !( $database = mysqli_connect( "localhost", "root", "" ) ) )
                    die( "<p>Could not connect to database</p>" );

                 if ( !mysqli_select_db( $database, "Pet_care") )
                    die( "<p>Could not open URL database</p>" );
                    $name =  $_POST["name"];
                    $Description = $_POST["Description"];
                    $price =  $_POST["price"];
                    $photo =  $_POST["profilePhotoFile"];

                 $query="INSERT INTO services (servicename, description, price , photo ) VALUES ('".$name."','".$Description."' ,'".$price."','".$photo."');";
                 $result=mysqli_query($database, $query);
                 if($result)
                 header("location: Services.php");

                    else
                        echo "An error occured while completing your request.";
             }
        ?>
                 
        </div>




        <img  src= "images/logo.png"  class = "logo" alt="logo of pet care">
       
    </body>
</html>