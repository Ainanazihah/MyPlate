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

//KIRA PERCENTAGE ANDA BERKAWAN

$data_get=$_GET["id"];

//Dapatkan rekod pengguna yang sedang login
$dataSQL1=mysqli_query($con,"SELECT * from tbl_user where userid='$data_get'") or die (mysqli_error($con));	
$showDataSQL1=mysqli_fetch_array($dataSQL1)or die (mysqli_error($con));	






//STEP 1:DAPATKAN BILANGAN SEMUA PENGGUNA
$TuSER=mysqli_query($con, "SELECT * FROM tbl_user where userid <> '$data_get' and status <>1") or die (mysqli_error($con));
$ttlUser=mysqli_num_rows($TuSER);

//STEP 2: DAPATKAN BILANGAN KAWAN ANDA
$TKawan=mysqli_query($con, "SELECT * FROM tbl_friends where userid_1 = '$data_get'") or die (mysqli_error($con));
$ttlFr=mysqli_num_rows($TKawan);

//STEP 3: KIRA PERCENTAGE

$jumlahA=number_format(($ttlFr/$ttlUser)*100,0);
$jumlahB=100-$jumlahA;


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
          		
                <!-- ############# KOTA PERTAMA MULA ################################### -->
                <div class="col-md-4 mb">
							<!-- WHITE PANEL - TOP USER -->
							<div class="white-panel pn">
								<div class="white-header">
									<h5>USER PROFILE</h5>
								</div>
								<p>
                                
                                <?php echo     '<img src="data:'.$showDataSQL1["pictype"].';base64,'.base64_encode($showDataSQL1["picture"]) .'" class="img-circle" width="80"></a>';
                  
                ?>
                                
                 
                 
                  
                  
                              
                                
                                </p>
								<p><b><?php echo $showDataSQL1["username"]; ?></b></p>
								<div class="row">
									<div class="col-md-6">
										<p class="small mt">MEMBER ID</p>
										<p>MB-<?php echo $showDataSQL1["userid"]; ?></p>
									</div>
									<div class="col-md-6">
										<p class="small mt">EMAIL</p>
										<p><?php echo $showDataSQL1["email"]; ?></p>
									</div>
								</div>
							</div>
						</div><!-- /col-md-4 -->
                
                 <!-- ############# KOTA PERTAMA TAMAT ################################### -->
                
                
                
                 <!-- ############# KOTA KEDUA MULA ################################### -->
                	<div class="col-md-4 col-sm-4 mb">
                      		<div class="white-panel pn donut-chart">
                      			<div class="white-header">
						  			<h5>FRENZ-RATER</h5>
                      			</div>
								<div class="row">
									<div class="col-sm-6 col-xs-6 goleft">
										<p><i class="fa fa-database"></i> Homogeneity Index: <?php echo $jumlahA; ?>%</p>
									</div>
	                      		</div>
								<canvas id="serverstatus01" height="120" width="120"></canvas>
								<script>
									var doughnutData = [
											{
												value: <?php echo $jumlahA; ?>,
												color:"#68dff0"
											},
											{
												value : <?php echo $jumlahB; ?>,
												color : "#fdfdfd"
											}
										];
										var myDoughnut = new Chart(document.getElementById("serverstatus01").getContext("2d")).Doughnut(doughnutData);
								</script>
	                      	</div><! --/grey-panel -->
                      	</div><!-- /col-md-4-->
                
                
                
                   <!-- ############# KOTA KEDUA TAMAT ################################### -->
                
                <!-- ############# KOTA KETIGA MULA ################################### -->
                <div class="col-lg-4 col-md-4 col-sm-4 mb">
							<div class="content-panel pn">
                            
                            
                            
                            
                            
								<div style="background-image: url(<?php echo 'data:'.$showDataSQL1["pictype"].';base64,'.base64_encode($showDataSQL1["picture"]).'"'; ?>)" id="spotify">
									<div class="col-xs-4 col-xs-offset-8">
										<button class="btn btn-sm btn-clear-g">FOLLOW</button>
									</div>
									<div class="sp-title">
										<h3><?php echo $showDataSQL1["username"]; ?></h3>
									</div>
									
								</div>
								
							</div>
						</div><! --/col-md-4-->
                
                
                 <!-- ############# KOTA KETIGA TAMAT ################################### -->
                
                
                
                
                
                
          		</div>
          	</div>
			
            
            
            
            <div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> User Profile</h4>
                      <form class="form-horizontal style-form" method="get">
                        
                          
                           <div class="form-group">
                              <label class="col-lg-2 col-sm-2 control-label">Username</label>
                              <div class="col-lg-10">
                                  <p class="form-control-static"><?php echo $showDataSQL1["username"]; ?></p>
                              </div>
                          </div>
                          
                          
                          
                                                 
                          
                          
                          
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Name</label>
                              <div class="col-sm-10">
                                 <p class="form-control-static"><?php echo $showDataSQL1["name"]; ?></p>
                              </div>
                          </div>
                         
                         
                         
                         <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Email</label>
                              <div class="col-sm-10">
                                 <p class="form-control-static"><?php echo $showDataSQL1["email"]; ?></p>
                              </div>
                          </div>
                         
                         <br>
                         
                         
                         
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
