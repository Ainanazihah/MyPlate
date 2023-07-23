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





if (isset($_GET["id"]))
{
	
	if ($_GET["action"]=="friend")
	{
		$tb=date("Y-m-d");
		
//prevent duplicate
$checkDup=mysqli_query($con, "SELECT userid_1,userid_2 FROM tbl_friends where userid_1 = '$_SESSION[userid]' and userid_2='$_GET[id]'") or die (mysqli_error($con));
$ttl_Dup=mysqli_num_rows($checkDup);


if ($ttl_Dup==0)
{

	mysqli_query ($con, "INSERT INTO  tbl_friends (userid_1, userid_2, friend_date) values ('$_SESSION[userid]','$_GET[id]','$tb')") or die (mysqli_error($con));	
	
$status=1;
}
		
	}
	elseif ($_GET["action"]=="unfriend")
	{
		
	mysqli_query ($con, "DELETE FROM tbl_friends where friend_id='$_GET[id]'") or die (mysqli_error($con));	
	
$status=2;
	
	
		
	}

	
	
	
	
}










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
        <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
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



<?php
if (isset($status))
{
	
if ($status==1)
{echo "<script type='text/javascript'> alert('New Friend Added!')</script>";}	
else	
{echo "<script type='text/javascript'> alert('Unfriend Successfully!')</script>";}		
}
?>


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
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> SEARCH</h4>
                
                
                
                 <form name="search" method="post" class="form-inline">
                          
                          
                          <div class="radio">
						  <label>
						    <input type="radio" name="opt1" id="optionsRadios1" value="username" checked>
						    Username
						  </label>
						</div>
						<div class="radio">
						  <label>
						    <input type="radio" name="opt1" id="optionsRadios2" value="email">
						   Email
						  </label>
						</div>
                          
                          
                          
                          <div class="form-group">
                             
                              <div class="col-sm-6">
                                  <input type="text" name="term" class="form-control" placeholder="Search term">
                              </div>
                          </div>
                          
                          
                          <button type="submit" class="btn btn-theme">Find-IT</button>
                          
                          </form>
                
                
                
                
                </div></div></div>
                
              
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
						   
						   if (isset($_POST["term"]))
{
$getFriends=mysqli_query($con, "SELECT * FROM tbl_user where userid <> '$_SESSION[userid]' and $_POST[opt1] like '%$_POST[term]%' and status <> 1") or die (mysqli_error($con));
}
else
{
$getFriends=mysqli_query($con, "SELECT * FROM tbl_user where userid <> '$_SESSION[userid]' and status <> 1") or die (mysqli_error($con));
						  
}
						  
						  
						  
						  
						  
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
							 
$checkFriends=mysqli_query($con, "SELECT * FROM tbl_friends where userid_1 = '$_SESSION[userid]' and userid_2='$showFriends[userid]'") or die (mysqli_error($con));
$ttl_friends=mysqli_num_rows($checkFriends);
$showfr=mysqli_fetch_array($checkFriends);
							  
							   ?>
                               
                               
                           
                              
                              <tr>
                                  <td>
                                  <a href="view_profile.php?id=<?php echo $showFriends["userid"]; ?>">
                                  <?php
								  echo '<img src="data:'.$showFriends["pictype"].';base64,'.base64_encode($showFriends["picture"]) .'" class="img-thumbnail" width="60" height="60"></a>';
               ?></a>
                                  
                                  
                                  
                                  
                                  </td>
                                  <td class="hidden-phone"><?php echo $showFriends['username']; ?></td>
                                  <td><?php echo $showFriends['email']; ?> </td>
                                  
                                  <td>
                                  <?php
								  if ($ttl_friends==0)
								  {
									?>
<a href="add.php?id=<?php echo $showFriends['userid']; ?>&action=friend" onClick="javascript: return confirm('Add Friend ?')"> <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button></a>
								<?php
								  }
								  else
								  {
								?>
<a href="add.php?id=<?php echo $showfr['friend_id']; ?>&action=unfriend" onClick="javascript: return confirm('Unfriend ?')"> <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
                                
                                <?php
								  }
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
    <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="assets/js/gritter-conf.js"></script>

    <!--script for this page-->
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
