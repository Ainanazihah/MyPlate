<!DOCTYPE html>
<html>
<head>
    <title>MyPlate/Dietaryplan</title>
    <link rel="icon" href="img/bg5.png" type="img/flower.png" size="20x20">
    <style>
       
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 60%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 5px solid #997070;
            padding: 0px;
            text-align: center;
        }

        .body {
            background-color: #f0f0f0; 
        }

        .container {
            width: 80px;
            margin: 100px;
            padding: 80px;
            background-color: #F3E3C3; 
            border: 0px solid #F4A460;
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
</style>
</head>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    
<body>
<body background="img/bg4.jpg">
    
<?php

$host = "localhost:3306"; 
$user = "root"; 
$pwd = ""; 
$db = "mukabuku"; 


$con = mysqli_connect($host, $user, $pwd, $db) or die(mysqli_connect_error());

$dietaryPlan = array(
    "Monday" => array("breakfast" => "", "lunch" => "", "dinner" => ""),
    "Tuesday" => array("breakfast" => "", "lunch" => "", "dinner" => ""),
    "Wednesday" => array("breakfast" => "", "lunch" => "", "dinner" => ""),
    "Thursday" => array("breakfast" => "", "lunch" => "", "dinner" => ""),
    "Friday" => array("breakfast" => "", "lunch" => "", "dinner" => ""),
    "Saturday" => array("breakfast" => "", "lunch" => "", "dinner" => ""),
    "Sunday" => array("breakfast" => "", "lunch" => "", "dinner" => "")
);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach ($dietaryPlan as $day => $meals) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $user_id = (int) $_POST["User_ID"];

}
       
        $breakfast = htmlspecialchars($_POST[strtolower($day) . "_breakfast"]);
        $lunch = htmlspecialchars($_POST[strtolower($day) . "_lunch"]);
        $dinner = htmlspecialchars($_POST[strtolower($day) . "_dinner"]);

        $sql = "INSERT INTO dietary_plan_data (user_id, day, breakfast, lunch, dinner) VALUES ('$user_id', '$day', '$breakfast', '$lunch', '$dinner') ON DUPLICATE KEY UPDATE breakfast='$breakfast', lunch='$lunch', dinner='$dinner';";

        mysqli_query($con, $sql);
    }
}
?>

    <?php

    $dietaryPlan = array(
        "Monday" => array("breakfast" => "", "lunch" => "", "dinner" => ""),
        "Tuesday" => array("breakfast" => "", "lunch" => "", "dinner" => ""),
        "Wednesday" => array("breakfast" => "", "lunch" => "", "dinner" => ""),
        "Thursday" => array("breakfast" => "", "lunch" => "", "dinner" => ""),
        "Friday" => array("breakfast" => "", "lunch" => "", "dinner" => ""),
        "Saturday" => array("breakfast" => "", "lunch" => "", "dinner" => ""),
        "Sunday" => array("breakfast" => "", "lunch" => "", "dinner" => "")
    );

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $dietaryPlan["Monday"]["breakfast"] = htmlspecialchars($_POST["monday_breakfast"]);
        $dietaryPlan["Monday"]["lunch"] = htmlspecialchars($_POST["monday_lunch"]);
        $dietaryPlan["Monday"]["dinner"] = htmlspecialchars($_POST["monday_dinner"]);

        $dietaryPlan["Tuesday"]["breakfast"] = htmlspecialchars($_POST["tuesday_breakfast"]);
        $dietaryPlan["Tuesday"]["lunch"] = htmlspecialchars($_POST["tuesday_lunch"]);
        $dietaryPlan["Tuesday"]["dinner"] = htmlspecialchars($_POST["tuesday_dinner"]);
        
        $dietaryPlan["Wednesday"]["breakfast"] = htmlspecialchars($_POST["wednesday_breakfast"]);
        $dietaryPlan["Wednesday"]["lunch"] = htmlspecialchars($_POST["wednesday_lunch"]);
        $dietaryPlan["Wednesday"]["dinner"] = htmlspecialchars($_POST["wednesday_dinner"]);

        $dietaryPlan["Thursday"]["breakfast"] = htmlspecialchars($_POST["thursday_breakfast"]);
        $dietaryPlan["Thursday"]["lunch"] = htmlspecialchars($_POST["thursday_lunch"]);
        $dietaryPlan["Thursday"]["dinner"] = htmlspecialchars($_POST["thursday_dinner"]);

        $dietaryPlan["Friday"]["breakfast"] = htmlspecialchars($_POST["friday_breakfast"]);
        $dietaryPlan["Friday"]["lunch"] = htmlspecialchars($_POST["friday_lunch"]);
        $dietaryPlan["Friday"]["dinner"] = htmlspecialchars($_POST["friday_dinner"]);

        $dietaryPlan["Saturday"]["breakfast"] = htmlspecialchars($_POST["saturday_breakfast"]);
        $dietaryPlan["Saturday"]["lunch"] = htmlspecialchars($_POST["saturday_lunch"]);
        $dietaryPlan["Saturday"]["dinner"] = htmlspecialchars($_POST["saturday_dinner"]);

        $dietaryPlan["Sunday"]["breakfast"] = htmlspecialchars($_POST["sunday_breakfast"]);
        $dietaryPlan["Sunday"]["lunch"] = htmlspecialchars($_POST["sunday_lunch"]);
        $dietaryPlan["Sunday"]["dinner"] = htmlspecialchars($_POST["sunday_dinner"]);

    }
    ?>

<div class="container">
<h1>Your Weekly Dietary Plan</h1>
    <center><h2>Plan for the Week</h2></center><br><br>
    
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <center><label for="User_ID">User ID:</label></center>
    <center><input type="number" name="User_ID" required><br></center><br><br>

        <center><table>
            <tr>
                <th>Day</th>
                <th>Breakfast</th>
                <th>Lunch</th>
                <th>Dinner</th>
            </tr>

            <?php

            foreach ($dietaryPlan as $day => $meals) {
                echo "<tr>";
                echo "<td>" . $day . "</td>";
                echo "<td><input type='text' name='" . strtolower($day) . "_breakfast' value='" . $meals['breakfast'] . "'></td>";
                echo "<td><input type='text' name='" . strtolower($day) . "_lunch' value='" . $meals['lunch'] . "'></td>";
                echo "<td><input type='text' name='" . strtolower($day) . "_dinner' value='" . $meals['dinner'] . "'></td>";
                echo "</tr>";
            }
            ?>
        </center></table><br><br>
        <input type="submit" name="submit" value="Save Plan">
    </form>
    </div>

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

</body>
</html>
