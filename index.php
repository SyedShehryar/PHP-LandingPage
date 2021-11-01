<?php

$insert= false;

if(isset($_POST['name'])){
    
    $server= "localhost";
    $username= "root";
    $password= "";
    
    $con = mysqli_connect($server, $username, $password );

    if(!$con){
        die("Connection to databse failed due to" . mysqli_connect_error());
    }

    // echo "Success Connecting to the DB";

    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];


    $sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `desc`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";

    //echo $sql;

    if($con->query($sql) == true){
        //echo "successfully inserted";
        $insert = true;
    }
    else{
        echo "ERROR : $sql <br> $con->error";
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel  Form</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,300;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <img class="bg" src="bg.jpg" alt="uol">
</head>

<body>
    <div class="container">
        <h1>Welcome to The University of Lahore</h1>
        <p>Enter your details and submit the form to confirm your participation</p>
        
        
        <?php
        
        if ($insert == true){

        echo "<p class='submitmsg'> Thanks for submiting the form. We are happy to see you joining the US  Trip </p>";
        
        }
        ?>


        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter Your Name">
            <input type="text" name="age" id="age" placeholder="Enter Your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter Your Gender">
            <input type="email" name="email" id="email" placeholder="Enter Your Email">
            <input type="phone" name="phone" id="phone" placeholder="Enter Your Phone">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter Any Other Information Here"></textarea>
            <button class="btn">Submit</button>

        </form>

    </div>

<script src="index.js"></script>
</body>
</html>