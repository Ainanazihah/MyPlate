<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>MyPlate/Diet Goals List</title>
    <link rel="icon" href="img/bg5.png" type="img/flower.png" size="20x20">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
    <style>
        
        .container {
            width: 50%;
            margin: 100px;
            padding: 30px;
            background-color: #D5D6EA;
            border: 1px solid #ccc;
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


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    

</head>
<body>

<body background="img/bg4.jpg">
    <div class="container">
        <center><h1>Diet Goals List</h1></center><br><br>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
           <center><label for="User_ID">User ID:</label>
            <input type="number" name="User_ID" required><br><br>
            <label for="goal">Enter your goal:</label>
            <input type="text" name="goal" required>
            <input type="submit" name="submit" value="Submit"></center>
        </form>
        <hr>
        <h2>Your Diet Goals:</h2>
        <ul>
            <?php
            $host = "localhost:3306";
            $user = "root";
            $pwd = "";
            $db = "mukabuku";

            $con = mysqli_connect($host, $user, $pwd, $db) or die(mysqli_connect_error());

            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["goal"])) {
                $user_id = (isset($_POST["User_ID"])) ? (int)$_POST["User_ID"] : 0; 
                $user_goal = mysqli_real_escape_string($con, $_POST["goal"]);

                $query = "INSERT INTO diet_goals (user_id, goal) VALUES ('$user_id', '$user_goal')";
                mysqli_query($con, $query) or die(mysqli_error($con));
            }

            if (isset($_POST["User_ID"])) {
                $user_id = (int)$_POST["User_ID"];
                $query = "SELECT goal FROM diet_goals WHERE user_id = '$user_id'";
                $result = mysqli_query($con, $query);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<li>" . htmlspecialchars($row['goal']) . "</li>";
                    }
                } else {
                    echo "<li>No diet goals found for User ID: " . htmlspecialchars($user_id) . "</li>";
                }
            }
            mysqli_close($con);
            ?>
        </ul>
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
        gap: 0px;
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
