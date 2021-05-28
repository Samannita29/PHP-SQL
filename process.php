<?php
$insert=false;
if(isset($_POST['name'])){
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";
$name=$_POST['name'];
$age=$_POST['age'];
$gender=$_POST['gender'] ;
$email=$_POST['email'] ;
$phone=$_POST['phone'] ;
$other=$_POST['other'] ;
$sql="INSERT INTO `trip`.`Trip` ( `name`, `age`, `gender`, `email`, `phone`, `other`, `date`) VALUES ( '$name', '$age', '$gender','$email', '$phone', '$other', current_timestamp());";
//echo $sql;
if($conn->query($sql)== true){
  //echo "succesfully inserted";
  $insert=true;
}
else{
  echo "ERROR: $sql <br> $conn->error";
}

$conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel form</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Pattaya&display=swap" rel="stylesheet">
</head>
<body>
    <img  class="bg"   src="pic.jpg" alt="college">
    <div class="container">
        <h1>Welcome to Maldives Trip form</h1>
        <p>Confirm your Stay in the trip</p>
       
        <?php
        if($insert==true){
          echo "<p class='sub'>Thanks for submitting the form</p>";
        }
        ?>


        <form action="process.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <!-- <input type="radio" name="gender" id="gen1">
            <label for="gen2">Male</label>
            <input type="radio" name="gender" id="gen2">
            <label for="gen2">Female</label>
            <input type="radio" name="gender" id="gen3">
            <label for="gen3">Other</label> -->
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone number">
            <textarea name="other" id="other" cols="30" rows="5" placeholder="enter any other information here"></textarea>
            <button class="btn">Submit</button>
            <button class="btn">Reset</button>


        </form>


    </div>
    <script src="index.js"></script>
</body>
</html>
 