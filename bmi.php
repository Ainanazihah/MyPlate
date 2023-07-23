<!DOCTYPE html>
<html>
<head>
    <title>MyPlate/BMI Calculator</title>
    <link rel="icon" href="img/bg5.png" type="img/flower.png" size="20x20">
    <style>
    

        .body {
            background-color: #f0f0f0; 
        }

        .container {
            width: 540px;
            margin: 100px;
            padding: 80px;
            background-color: #DCD0FF; 
            border: 0px solid #ccc;
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
</style>
</head>
    
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
   
</head>
<body>
<body background="img/bg2.png">

<div class="container">
<center><h2>BMI Calculator</h2></center><br><br>

    <form method="post">
        <center><label for="weight_kg">Weight (kg):</label>
        <input type="number" step="0.01" name="weight_kg" required><br></center>

        <center><label for="height_cm">Height (cm):</label>
        <input type="number" step="0.01" name="height_cm" required><br><br></center>

        <center><input type="submit" name="submit" value="Calculate BMI"></center>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $weight_kg = floatval($_POST['weight_kg']);
        $height_cm = floatval($_POST['height_cm']);

        
        $height_m = $height_cm / 100;

        function calculate_bmi($weight, $height) {
            if ($height == 0) {
                return 0;
            }

            return $weight / ($height * $height);
        }

        $bmi = calculate_bmi($weight_kg, $height_m);

        echo "<p><center>Your BMI is: " . round($bmi, 2) . "</center></p>";
    }
    ?>
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
