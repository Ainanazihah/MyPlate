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
          	
                
                
                
              
              <! -- KOTAK kedua 1 column MULA XXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
              
                        
                        
                        
                        <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
	                  	  	  <h4><i class="fa fa-angle-right"></i> Friends Zone</h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th><i class="fa fa-bullhorn"></i> #</th>
                                  <th class="hidden-phone"><i class="fa fa-question-circle"></i> Username</th>
                                  <th><i class="fa fa-bookmark"></i> Email Address</th>
                                  <th><i class=" fa fa-edit"></i> Status</th>
                                  <th></th>
                              </tr>
                              </thead>
                              <tbody>
                              
                           
                           <?php
						   //dapatkan data untuk looping
						   
						   $getFriends=mysqli_query($con, "SELECT * FROM tbl_friends where userid_1 = '$_SESSION[userid]'") or die (mysqli_error($con));
						   $bil_friends=mysqli_num_rows($getFriends);
						   
						   //kalau tiada rekod dalam database
						   if ($bil_friends==0)
						   {
						   
						   ?>
                           
                           
                           
                              <tr>
                                  <td colspan="4"> No records currently active.
                                  </td>
                              </tr>
                              
                              <?php
						   }
						   else
						   {
							  //kalau ada rekod semua akan dipaparkan 
							  
							  
							 while ($showFriends=mysqli_fetch_array($getFriends))
							 { 
							 
							 //check friend status
							 
$checkFriends=mysqli_query($con, "SELECT * FROM tbl_user where userid ='$showFriends[userid_2]'") or die (mysqli_error($con));
$ttl_friends=mysqli_num_rows($checkFriends);
$showfr=mysqli_fetch_array($checkFriends);
							  
							   ?>
                               
                               
                           
                              
                              <tr>
                                  <td><a href="basic_table.html#">
                                  
                                  <?php
								  echo '<img src="data:'.$showfr["pictype"].';base64,'.base64_encode($showfr["picture"]) .'" class="img-thumbnail" width="60" height="60"></a>';
               ?>
                                  
                                  
                                  
                                  
                                  </a></td>
                                  <td class="hidden-phone"><?php echo $showfr['username']; ?></td>
                                  <td><?php echo $showfr['email']; ?> </td>
                                  
                                  <td>
                                
                                <?php
								//tempoh berkawan
								$hari_ini=date("Y-m-d"); //tetapkan tarikh untuk hari ini
								$Date1=date_create($showFriends["friend_date"]); //tarikh mula berkawan
								$Date2=date_create($hari_ini); //tarikh hari ini
								$a=date_diff($Date1,$Date2); //cari beza tarikh mula berkawan sampai la hari ini
								echo $a->format("%y tahun %m bulan %d hari"); //boleh padam ikut kesesuaian
		                                
                               ?>
                                 
                                
                                
                                  </td>
                              </tr>
                           
                           
                           
                           
                           
                           
                         
                           
                           
                           
                               
                               
                               <?php
							 } //tutup while
						   }//tutup periksa bilangan baris
						   ?>
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              </tbody>
                          </table>
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
	      				
                
                </div>
                
                
                 <! -- KOTAK kedua 1 column TAMAT XXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
          		</div>
          	</div>
			
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
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
