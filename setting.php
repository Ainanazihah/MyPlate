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
include "include/security.php";
include "include/dataPengguna.php";


//kemaskini profile
if (isset($_POST["title"]))
{
	//encrypt pwd

$a1=cucidata($_POST["title"]);
$a2=cucidata($_POST["abbre"]);
$a3=cucidata($_POST["copyright"]);
$a4=cucidata($_POST["smtp_user"]);

$a5=cucidata($_POST["smtp_pwd"]);
$a6=cucidata($_POST["smtp_host"]);
$a7=cucidata($_POST["smtp_name"]);
$a8=cucidata($_POST["smtp_email"]);
$a9=cucidata($_POST["key1"]);

$a10=cucidata($_POST["smtp_port"]);
$a11=cucidata($_POST["smtp_mode"]);
$a12=cucidata($_POST["smtp_auth"]);
$a13=cucidata($_POST["logo"]);



mysqli_query ($con, 
"UPDATE tbl_setting set title='$a1',
abbre='$a2',copyright='$a3',

smtp_user='$a4', smtp_pwd='$a5',smtp_host='$a6',smtp_name='$a7',smtp_email='$a8',key1='$a9',smtp_port='$a10',
smtp_mode='$a11',smtp_auth='$a12',logo='$a13'
where setid='1'") or die (mysqli_error($con));

$status=1;
	
	
}

//include pengguna



//dapatkan data setting
//Dapatkan rekod pengguna yang sedang login
$dataSQL1=mysqli_query($con,"SELECT * from tbl_setting where setid='1'") or die (mysqli_error($con));	
$showDataSQL1=mysqli_fetch_array($dataSQL1)or die (mysqli_error($con));	








?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

     <title><?php echo $web_title; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    

    <script src="assets/js/chart-master/Chart.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="index2.php" class="logo"><b> <?php echo $web_title2; ?></b></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <ul class="nav top-menu">
                    <!-- settings start -->
                  
                    <!-- settings end -->
                    <!-- inbox dropdown start-->
                   
                   <?php
				   
				   include ("include/noti.php");
				   
				   include ("include/message.php");
				   ?>
                   
                   
                    <!-- inbox dropdown end -->
                </ul>
                <!--  notification end -->
            </div>
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="logout.php">Logout</a></li>
            	</ul>
            </div>
        </header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="profile.php">
<?php echo     '<img src="data:'.$showDataSQL["pictype"].';base64,'.base64_encode($showDataSQL["picture"]) .'" class="img-circle" width="120"></a>';
                  
                ?>
	
                  
                  
                  </p>
              	  <h5 class="centered"><?php echo $showDataSQL['username']; ?></h5>
              	  	
                 <!-- Menu Sistem -->
                
                
                
                
                
 
 <?php
 include ("include/menu.php");
 ?>
                
                
                
                
                
                
                
                
                

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
          	<h3><i class="fa fa-angle-right"></i> Welcome [<?php echo $showDataSQL['username']; ?>]</h3>
          
            
            
            
            <div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> Setting</h4>
                    
                     <?php
					 if (isset($status)){echo "Successfully Updated your data!";}
					 ?>
                    
                    
                      <form class="form-horizontal style-form" method="post" name="update">
                        
                          
                          
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Page Title</label>
                              <div class="col-sm-10">
                                  <input type="text"  name="title" value="<?php echo $showDataSQL1["title"]; ?>" class="form-control" placeholder="Page Title" required>
                              </div>
                          </div>
                          
                          
                          
                              <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Page Abbreviation</label>
                              <div class="col-sm-10">
                                  <input type="text"  name="abbre" value="<?php echo $showDataSQL1["abbre"]; ?>" class="form-control" placeholder="Page Abbreviation" required>
                              </div>
                          </div>
                          
                          
                          
                          
                          
                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Page Keywords</label>
                              <div class="col-sm-10">
                                  <input type="text"  name="key1" value="<?php echo $showDataSQL1["key1"]; ?>" class="form-control" placeholder="Page Keywords" required>
                              </div>
                          </div>
                          
                          
                          
                          
                         
                             <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Copyright</label>
                              <div class="col-sm-10">
                                  <input type="text"  name="copyright" value="<?php echo $showDataSQL1["copyright"]; ?>" class="form-control" placeholder="Copyright statement" required>
                              </div>
                          </div>
                         
                         
                         
                             <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">SMTP Username</label>
                              <div class="col-sm-10">
                                  <input type="text"  name="smtp_user" value="<?php echo $showDataSQL1["smtp_user"]; ?>" class="form-control" placeholder="SMTP Username">
                              </div>
                          </div>
                         
                         
                         
                         
                              <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">SMTP Password</label>
                              <div class="col-sm-10">
                                  <input type="password"  name="smtp_pwd" value="<?php echo $showDataSQL1["smtp_pwd"]; ?>" class="form-control">
                              </div>
                          </div>
                         
                         
                         
                         
                              <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">SMTP Host</label>
                              <div class="col-sm-10">
                                  <input type="text"  name="smtp_host" value="<?php echo $showDataSQL1["smtp_host"]; ?>" class="form-control" placeholder="SMTP Host">
                              </div>
                          </div>
                         
                         
                         
                         
                         
                         
                         
                              <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Email From</label>
                              <div class="col-sm-10">
                                  <input type="text"  name="smtp_name" value="<?php echo $showDataSQL1["smtp_name"]; ?>" class="form-control" placeholder="Email From">
                              </div>
                          </div>
                         
                         
                              <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Email Name</label>
                              <div class="col-sm-10">
                                  <input type="text"  name="smtp_email" value="<?php echo $showDataSQL1["smtp_email"]; ?>" class="form-control" placeholder="Email Name">
                              </div>
                          </div>
                         
                         
                         
                         
                         
                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">SMTP Mode</label>
                              <div class="col-sm-10">
                                  <input type="text"  name="smtp_mode" value="<?php echo $showDataSQL1["smtp_mode"]; ?>" class="form-control" placeholder="SMTP Mode">
                              </div>
                          </div>
                          
                          
                          
                          
                          
                            <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">SMTP Authentication</label>
                              <div class="col-sm-10">
                                  <input type="text"  name="smtp_auth" value="<?php echo $showDataSQL1["smtp_auth"]; ?>" class="form-control" placeholder="Authentication SMTP">
                              </div>
                          </div>
                         
                         
                         
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">SMTP port</label>
                              <div class="col-sm-10">
                                  <input type="text"  name="smtp_port" value="<?php echo $showDataSQL1["smtp_port"]; ?>" class="form-control" placeholder="SMTP Port">
                              </div>
                          </div>
                         
                         
                         
                         
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Logo</label>
                              <div class="col-sm-10">
                                  <input type="text"  name="logo" value="<?php echo $showDataSQL1["logo"]; ?>" class="form-control" placeholder="Logo URL">
                              </div>
                          </div>
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         <br>
                          <button type="submit" class="btn btn-theme btn-block">Update</button>
                         
                         
                      </form>
                  </div>
          		</div><!-- col-lg-12-->      	
          	</div><!-- /row -->
            
            
            
            
            
            
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              <?php echo $copyright; ?>
              <a href="#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="assets/js/jquery.ui.touch-punch.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="assets/js/sparkline-chart.js"></script>
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
