<!DOCTYPE html>
<html>
<html lang="en">
<meta charset="utf-8">
<title>MyPlate/Calorie Count Calculator</title>
<link rel="icon" href="img/bg5.png" type="img/flower.png" size="20x20">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<head>
    
<title>Calorie Calculator</title>


 
<style>
    

.body {
            background-color: #f0f0f0; 
        }

.container {
            width: 80px;
            margin: 100px;
            padding: 80px;
            background-color: #E2A76F; 
            border: 20px solid #F4A460;
        }


</style>
</head>

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
        <ul class="dropdown">
        <li><a href="bmi.php">BMI Calculation</a></li>
        <li><a href="caloriecount.php">Calorie</a></li>
        <li><a href="usergoals.php">Diet Goals</a></li>
        <li><a href="dietaryplan.php">Dietary Planning</a></li>
        <li><a href="foodlog.php">Food Log</a></li>
        <li><a href="food.php">Food Intake</a></li>
        </ul>
        </ul>
        </li>
        <li><a href="news.php">NEWS</a></li>
        <li><a href="contact.php">CONTACT</a></li>
        </ul>
    </div>

    <div class="search">
        <input class="srch" type="search" name="" placeholder="Search here">
        <a href="#"> <button class="btn">Search</button></a>
    </div>

</div>

<?php

$host="localhost";
$user="root";
$pwd="";
$db="mukabuku";

$con = mysqli_connect($host,$user,$pwd,$db) or die (mysqli_connect_errno());

?>
    
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    
<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $weight = floatval($_POST['weight']);
    $height = floatval($_POST['height']);
    $age = intval($_POST['age']);
    $gender = $_POST['gender'];
    $activityLevel = floatval($_POST['activity_level']);

    $calorie = calculateCalorie($weight, $height, $age, $gender, $activityLevel);


    $query = "INSERT INTO user_calorie_data (weight, height, age, gender, activity_level, calorie)
              VALUES ('$weight', '$height', '$age', '$gender', '$activityLevel', '$calorie')";

    mysqli_query($con, $query) or die(mysqli_error($con));
}


function calculateCalorie($weight, $height, $age, $gender, $activityLevel)
{
    if ($gender === 'male') {
        $bmr = 88.362 + (13.397 * $weight) + (4.799 * $height) - (5.677 * $age);
    } else {
        $bmr = 447.593 + (9.247 * $weight) + (3.098 * $height) - (4.330 * $age);
    }

    $calorie = $bmr * $activityLevel;

    return $calorie;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
    $weight = floatval($_POST['weight']);
    $height = floatval($_POST['height']);
    $age = intval($_POST['age']);
    $gender = $_POST['gender'];
    $activityLevel = floatval($_POST['activity_level']);

   
    $calorie = calculateCalorie($weight, $height, $age, $gender, $activityLevel);
}



?>

<body>

<body background="img/bg1.png">

<div class="container">
    <center><h1>Calorie Calculator</h1><br><br>
    <form method="post" action=""></center>
    <center><label for="weight">Your Weight (kg):</label>
    <input type="number" name="weight" step="0.01" required></center><br>

    <center><label for="height">Your Height (cm):</label>
    <input type="number" name="height" step="0.01" required></center><br>

    <center><label for="age">Your Age:</label>
    <input type="number" name="age" required></center><br>

    <center><label for="gender">Gender:</label></center>
    <center><input type="radio" name="gender" value="male" required> Male
    <input type="radio" name="gender" value="female" required> Female<br><br>

    <center><label for="activity_level">Activity Level:</label></center>
    <center><select name="activity_level" required>
            <option value="1.2">Not active</option>
            <option value="1.375">Lightly active</option>
            <option value="1.55">Moderately active</option>
            <option value="1.725">Very active</option>
            <option value="1.9">Extra active</option>
        </select></center><br>

        <input type="submit" value="Calculate"><br><br>

    <?php

    if (isset($calorie)) {
        echo "<h2>Your Calories is: " . round($calorie, 2) . " kcal</h2>";
    }
    ?>

<style>
    


    
    .navbar{
      position: fixed;
      top: 0;
      width: 100%;
      height: 75px;
      margin: auto;
      display: flex;
      align-items: center;
      background-color: rgba(0, 0, 0, 0.8);
    }
    
    .icon{
        width: 20%;
    }
    
    .logo{
        color: #ff7200;
        font-size: 35px;
        font-family: Arial;
        padding-left: 20px;
         width: 20%;
    }
    
    .menu{
         width: 30%;
    }
    
    ul{
        gap: 30px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    
    ul li{
        list-style: none;
        font-size: 14px;
    }
    
    ul li a{
        text-decoration: none;
        color: #fff;
        font-family: Arial;
        font-weight: bold;
        transition: 0.4s ease-in-out;
    }
    
    ul li a:hover{
        color: #ff7200;
    }
    
    ul li ul.dropdown li {
        display: block;
    }
    
    
    ul li ul.dropdown {
        min-width: 120px;
        border-radius: 3px;
        background: rgba(255,255,255);
        position: absolute;
        display: none;
         padding: 0;
    }
    
    .dropdown li{
        margin-top: 0px;
        margin-left: 0px;
    }
    
    .dropdown li a{
        margin: 0;
        color: #000;
        display: block;
        padding: 15px 10px 15px 10px;
    }
    
    ul li a:hover {
        background-color: #fffefe;
    }
    ul li:hover ul.dropdown {
        display:block;
    
    }
    
    .search{
        width: 330px;
        display: flex;
    }
    
    .srch{
        font-family: 'Times New Roman';
        width: 200px;
        height: 40px;
        background: transparent;
        border: 1px solid #ff7200;
        color: #fff;
        border-right: none;
        font-size: 16px;
        padding: 10px;
        border-bottom-left-radius: 5px;
        border-top-left-radius: 5px;
    }
    
    .btn{
        width: 100px;
        height: 40px;
        background: #ff7200;
        border: 2px solid #ff7200;
        color: #fff;
        font-size: 15px;
        border-bottom-right-radius: 5px;
        border-bottom-right-radius: 5px;
        transition: 0.2s ease;
        cursor: pointer;
    }
    .btn:hover{
        color: #000;
    }
    
    .btn:focus{
        outline: none;
    }
    
    .srch:focus{
        outline: none;
    }
    </style>
</div>
</form>
</body>
</html>

