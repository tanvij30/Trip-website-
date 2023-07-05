<?php
$insert = false;
if(isset($_POST['name'])){

    //set connection variables 
    $server = "localhost";
    $username = "root";
    $password= "";


    //create dbms connection
    $con = mysqli_connect($server, $username, $password);

    //check for connection sucesss
    if(!$con)
    {
        die("connection to this db failed due to". mysqli_connect_error());
    }
    
    //collect post variables 
    $name= $_POST['name'];
    $gender= $_POST['gender'];
    $mail= $_POST['mail'];
    $division= $_POST['div'];
    $Roll= $_POST['rollno'];
    

    $sql= "INSERT INTO `trip_viit`.`trip` ( `name`, `gender`, `mail`, `division`, `Roll`, `dt`) VALUES
     ( '$name', '$gender', '$mail', '$division', '$Roll', current_timestamp())";
    
    
    //execute the query
    if($con-> query($sql)== TRUE){

        //flag for sucessfull insertion 
       $insert = true;
    }
    else{
        echo "ERROR : $sql <br> $con->error";
    }

    //close the db connection
    $con->close();
   
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to travel form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="bg2.jpg" alt="VIIT">
     <div class="container">
        <h3>Welcome to VIIT-Pune</h3>
        <p class="submitmsg">Please fill the form to confirm your participation in this trip</p>
        <?php 
            if($insert == true)
            {
                echo "<p class='submitmsg'>Thanks for submitting your form. we are happy to see you joining this trip </p>";
            }
        ?>
        
        <form action="index.php" method="post" >
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="mail" id="mail" placeholder="Enter your mail">
            <input type="text" name="div" id="div" placeholder="Enter your division">
            <input type="text" name="rollno" id="rollno" placeholder="Enter your PRN number">
            <button class="btn">Submit</button>
            
        </form>
        <!--INSERT INTO `trip` (`srno`, `name`, `gender`, `mail`, `division`, `Roll`, `dt`) VALUES ('1', 'abc abc abc', 'F', 'abc@gmail.com', 'B', '25', current_timestamp());-->

     </div>
     <script src="index.js"></script>
</body>
</html>