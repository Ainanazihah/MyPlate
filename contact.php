<!DOCTYPE html>
<html>
<head>
    <title>MyPlate/Contact Us</title>
    <link rel="icon" href="img/bg5.png" type="img/flower.png" size="20x20">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style3.css">
   
</head>
<body>

<?php

$host = "localhost";
$user = "root";
$pwd = "";
$db = "mukabuku";

$con = mysqli_connect($host, $user, $pwd, $db);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost:3306"; 
    $username = "root";     
    $password = "";     
    $dbname = "mukabuku";       

    
    $conn = new mysqli($servername, $username, $password, $dbname);

    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $first_name = $_POST["firstname"];
    $last_name = $_POST["lastname"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];

    
    $stmt = $conn->prepare("INSERT INTO contact_messages (first_name, last_name, email, subject) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $first_name, $last_name, $email, $subject);

    if ($stmt->execute()) {
        echo "Message submitted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

  
    $stmt->close();
    $conn->close();
}
?>

<div class="navbar">
        <div class="icon">
        <h2 class="logo">MyPlate</h2>
        </div>

        <div class="menu">
        <ul>
        <li><a href="index2.php">HOME</a></li>
        <li><a href="about.php">ABOUT</a></li>
        <li><a href="#">SERVICES▼</a>
        <ul class="dropdown">
        <li><a href="bmi.php">BMI Calculation</a></li>
        <li><a href="caloriecount.php">Calorie</a></li>
        <li><a href="usergoals.php">Diet Goals</a></li>
        <li><a href="dietaryplan.php">Dietary Planning</a></li>
        <li><a href="foodlog.php">Food Log</a></li>
        <li><a href="food.php">Food Intake</a></li>
        </ul>
        <li><a href="news.php">NEWS</a></li>
        <li><a href="contact.php">CONTACT</a></li>
        </ul>
        </div>
        <div class="search">
        <input class="srch" type="search" name="" placeholder="Search here">
        <a href="#"> <button class="btn">Search</button></a>
        </div>
        </div> 
        
    
    <div class="contact-form">
    <h1>Contact Us</h1><br><br>
    <form action="contact.php" method="POST"> 
    <label for="fname">First Name:</label>
    <input type="text" id="fname" name="firstname" placeholder="Your name.."><br><br><br>

    <label for="lname">Last Name:</label>
    <input type="text" id="lname" name="lastname" placeholder="Your last name.."><br><br><br>

    <label for="email">Email:</label>
    <input type="text" id="email" name="email" placeholder="Enter your email.."><br><br><br>

    <label for="subject">Subject:</label>
    <textarea id="subject" name="subject" placeholder="Write something.."></textarea><br><br><br>
  
    <input type="submit" value="Submit">

</form>
</div>
</div>
</body>
</html>
