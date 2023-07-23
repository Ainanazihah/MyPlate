<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyPlate/Food Log</title>
    <link rel="icon" href="img/bg5.png" type="img/flower.png" size="20x20">
    <link rel="stylesheet" href="style4.css">
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

if ($_SERVER["REQUEST_METHOD"] === "POST" && !isset($_POST["submitted"])) {
    // Mark the form as submitted
    $_POST["submitted"] = true;

    $userID = $_POST["userID"];
    $foodMenu = $_POST["foodMenu"];
    $foodCalories = $_POST["foodCal"];

    $sql = "INSERT INTO food_log (user_id, food_menu, food_calories, date_added) 
            VALUES ('$userID', '$foodMenu', $foodCalories, NOW())";

    if (mysqli_query($con, $sql)) {
        echo "Data added successfully!";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}

$totalCalories = 0;
$sqlTotalCalories = "SELECT SUM(food_calories) AS total_calories FROM food_log";
$result = mysqli_query($con, $sqlTotalCalories);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $totalCalories = $row["total_calories"];
}

mysqli_close($con);
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
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    
    <div class="container">
        <h1>Food Log</h1>
        <form method="post">

<form action="process_form.php" method="post">
    <label for="userID">User ID:</label>
    <input type="text" name="userID" id="userID" required>

    <label for="foodMenu">Food Menu:</label>
    <input type="text" name="foodMenu" id="foodMenu" required>

    <label for="foodCal">Food Calories:</label>
    <input type="number" name="foodCal" id="foodCal" required>

    <input type="hidden" name="submitted" value="true">

    <button type="submit">Add to Log</button>
</form>

 
 <p>Total Calories: <?php echo $totalCalories; ?></p>

        <table id="foodTable">
            <tr>
                <th>Menu</th>
                <th>Calories</th>
                <th>Date</th>
            </tr>
            <tr>
                <td>Pasta</td>
                <td>400</td>
                <td>2023-07-21</td>
            </tr>
            <tr>
                <td>Burger</td>
                <td>200</td>
                <td>2023-07-21</td>
            </tr>
           
        </table>
    </div>
</body>
</html>

