
    <!DOCTYPE html>

    <head>
        <meta charset = "utf-8">
        <title>Edit About Us </title>
        <link rel="stylesheet" href="styles/editaboutus.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
                <link href="styles/editaboutus.css?<?=filemtime("styles/editaboutus.css")?>" rel="stylesheet" type="text/css" />

        <script src="editAboutUs.js"></script>

    </head>
    <body>
        <?php
         
        
        
    
            if ( !( $database = mysqli_connect( "localhost", "root", "" ) ) )
               die( "<p>Could not connect to database</p>" );

            if ( !mysqli_select_db( $database, "Pet_care") )
               die( "<p>Could not open URL database</p>" );
               $query="SELECT * FROM aboutus";
       $result=mysqli_query($database, $query);


if ($result) {
   while ($data = mysqli_fetch_row($result)) {  
print("
        <div class='navbar'></div>
        <div class='container'>
            <h2>Edit About us </h2>
            <form method='POST' action = 'editAboutUs.php'>
                Label:
                <input type='text' name ='label' value ='".$data[0]."' >

                Description:
                <input type='text' name ='Description' style='height: 80px; width:350px;'value='".$data[1]."'> 
               
                    photo 1 : 
                    <input type='file' id='PhotoFile' name='Photo1' value='".$data[2]."'>
                    photo 2 : 
                    <input type='file' id='PhotoFile' name='Photo2' value='".$data[3]."'>
                    Location :
                
                 <input type='text' name ='location' value='".$data[4]."'> 


    
               <div class='editbut'>
                <a href='ManagerAboutUs.php'><button class ='Cbutton' type='button'>Cancel</button></a>
                <a href='ManagerAboutUs.php'><button class ='Dbutton'type='submit'>Update</button></a>

               </div>
                
            </form>
            ");}}
            
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $label = $_POST["label"];
                    $description =  $_POST["Description"];
                    $photo1 = $_POST["Photo1"];
                    $photo2 = $_POST["Photo2"];
                    $location =$_POST["location"];
                    $query = "UPDATE aboutus SET label ='".$label."',description = '".$description."',photo ='".$photo1."',photo1 ='".$photo2. "',location='".$location."' WHERE id=1;";
                // $query=" UPDATE aboutus SET ( label = '.$label ' , description = '.$description ' , photo = '.$photo ' , location = '.$location ' );" ;
                 $result = mysqli_query($database, $query);
                 if($result)
                        header("location: ManagerAboutUs.php");
            
                    else
                        echo "An error occured while completing your request.";
             }
        ?>
       
     
        </div>
        <img  src= "images/logo.png"  class = "logo" alt="logo of pet care">
       
    
  </body>
</html>