<!DOCTYPE html>
<html>
<head>
    <title>MyPlate/Register</title>
    <link rel="icon" href="img/bg5.png" type="img/flower.png" size="20x20">
    <meta charset="utf-8">
    
</head>
<?php
session_start();

/*###############[DASHGUM BASIC TEMPLATE BY ALVAREZ - POWERED BY ADAM SMITH @ 2020]########################################
#                                                                                                                       #
#																														#
#																														#
#            All right reserved to the respective owners. Full template can be downloaded from the developer website	#
#            PHP Codes modified and developed by Adam Smith 2020. Contact me for more details							#
#            jasc.studio66@gmail.com																					#
#																														#
#########################################################################################################################*/

//masukkan semua include yang penting disini terutama connection kepada database
include "include/db.php";
include "include/setting.php";
include "include/clean.php";
include "include/main_function.php";

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="<?php echo $keywords; ?>">

    <title><?php echo $web_title; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	  <div id="login-page">
	  	<div class="container">
	  	
        
        
      
		      <form class="form-login" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
		        
               
                
                
                <h2 class="form-login-heading">New User Account</h2>
		        <div class="login-wrap">
		            
                    <?php
		
		if (!isset($_POST["username"]))
		{
		?> 
                   <!-- Data Pertama Bagi Username - Mula ##################################################### -->
              
                    <label class="checkbox">
		                <span class="pull-left">
		                  Username <font color="red">*</font>
		
		                </span>
		            </label>
                    
                    
                    <input type="text" class="form-control" placeholder="Username" autofocus name="username" autocomplete="off" required>
		            <br>
                    
                    
                    <!-- Data Pertama Bagi Username - Tamat ##################################################### -->   
                    
                    
                       <!-- Data Pertama Bagi Password - Mula ##################################################### -->
                    <label class="checkbox">
		                <span class="pull-left">
		                  Password <font color="red">*</font>
		
		                </span>
		            </label>
                    
		            <input type="password" class="form-control" placeholder="Password" name="password1" autocomplete="off" required autocomplete="off">
		           <br>
                   
                    <!-- Data Pertama Bagi Password - Tamat -->
                    
                    
                     <!-- Data Pertama Bagi Confirm Password - Mula ##################################################### -->
                     <label class="checkbox">
		                <span class="pull-left">
		                 Confirm Password <font color="red">*</font>
		
		                </span>
		            </label>
                    
		            <input type="password" class="form-control" placeholder="Confirm Password" name="password2" autocomplete="off" required autocomplete="off">
		           <br>
                   
                       <!-- Data Pertama Bagi Confirm Password - Tamat ##################################################### -->
                   
                   
                   
                       <!-- Data Pertama Bagi Nama - Mula ##################################################### -->
                    <label class="checkbox">
		                <span class="pull-left">
		                  Name <font color="red">*</font>
		
		                </span>
		            </label>
                    
                    
                    <input type="text" class="form-control" placeholder="Name" name="name" autocomplete="off" required autocomplete="off">
		            <br>
                   
                     <!-- Data Pertama Bagi Nama - Tamat ##################################################### -->
                     
                      
                      
                       <!-- Data Pertama Bagi Email - Mula ##################################################### -->
                   
                     <label class="checkbox">
		                <span class="pull-left">
		                  Email Address <font color="red">*</font>
		
		                </span>
		            </label>
                    
                    
                    <input type="email" class="form-control" placeholder="Email Address" name="email" autocomplete="off" required autocomplete="off">
		            <br>
                   
                   
                   
                   <!-- Data Pertama Bagi Email - Tamat ##################################################### -->
                   
                   
                   
                   
                     
                       <!-- Data Pertama Bagi Gambar - Mula ##################################################### -->
                   
                     <label class="checkbox">
		                <span class="pull-left">
		                  Photo <font color="red">*</font>
		
		                </span>
		            </label>
                    
                    
                    <input type="file" class="form-control" name="photo" required autocomplete="off" accept="image/jpeg,image/x-png">
		            <br>
                   
                   
                   
                   <!-- Data Pertama Bagi Gambar - Tamat ##################################################### -->
                   
                   
                   
                   
                   
                   
		            <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> REGISTER</button>
		            <hr>
		            
		         
		            <div class="registration">
		                Do you have an account with us?<br/>
		                <a class="" href="index.php">
		                    Click here to login
		                </a>
		            </div>
		
            <?php
		}
		else
		{
		?>
        
        	<?php
							 daftar(cucidata($_POST["username"]),cucidata($_POST["password1"]),cucidata($_POST["password2"]),cucidata($_POST["name"]),cucidata($_POST["email"]),$_FILES["photo"]["name"],$con,$_FILES["photo"]["tmp_name"]);
							 
		}
                        ?> 
        
        
        
		        </div>
		
		          	
		      </form>	 
              
          
    
              
              
              
              
              
               	
	  	
	  	</div>
	  </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("img/bgregister.png", {speed: 500});
    </script>


  </body>
</html>
