<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>MyPlate/Food Intake</title>
    <link rel="icon" href="img/bg5.png" type="img/flower.png" size="20x20">


    <link rel="stylesheet" href="">

    <style>
        .body {
            background-color: #f0f0f0; 
        }
        .container {
            width: 80px;
            margin: 100px;
            padding: 80px;
            background-color: #E2A76F; 
            border: 20px solid #E2A76F;
        }


</style>
</head>

    </style>
</head>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<?php

session_start();

$host = "localhost:3306";
$user = "root";
$pwd = "";
$db = "mukabuku";

$con = mysqli_connect($host, $user, $pwd, $db) or die(mysqli_connect_error());

function addFoodIntake($con, $userId, $foodId, $foodName, $calories)
{
    $foodName = mysqli_real_escape_string($con, $foodName);
    $calories = intval($calories);

    $query = "INSERT INTO food_intake_data (user_id, food_id, food_name, calories) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, 'iisi', $userId, $foodId, $foodName, $calories);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function getFoodIntake($con)
{
    $foodIntake = array();

    $query = "SELECT food_name, calories FROM food_intake_data";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $foodIntake[] = array('food_name' => $row['food_name'], 'calories' => $row['calories']);
        }
    }

    return $foodIntake;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = intval($_POST['User_ID']);
    $foodId = intval($_POST['Food_ID']);
    $foodName = $_POST['food_name'];
    $calories = intval($_POST['calories']);

    addFoodIntake($con, $userId, $foodId, $foodName, $calories);
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
     width: 40%;
  
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

<body>
    <body background="img/bg1.png">
    <div class="container">
        <center><h1>Food Intake</h1></center>
        <form method="post" action="">
            <center><label for="User_ID">User ID:</label></center>
            <center><input type="number" name="User_ID" required><br></center>

            <center><label for="Food_ID">Food ID:</label></center>
            <center><input type="text" name="Food_ID" required><br></center>

            <center><label for="food_name">Food Name:</label></center>
            <center><input type="text" name="food_name" required><br></center>

            <center><label for="calories">Calories:</label></center>
            <center><input type="number" name="calories" required></center><br>

            <center><input type="submit" value="Add Food Intake"></center>
        </form>

        <h2>Calorie Per Serving</h2>
        <?php 
        $foodIntake = getFoodIntake($con);
        if (!empty($foodIntake)) : ?>
            
                <?php foreach ($foodIntake as $foodItem) : ?>
                    <li>
                        <?php echo $foodItem['food_name']; ?> - <?php echo $foodItem['calories']; ?> Kcal
                    </li>
                <?php endforeach; ?>
            
        <?php endif; ?>
    </div>
</body>
</html>
