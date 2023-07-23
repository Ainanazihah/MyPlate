<?php 
/*###############[DASHGUM BASIC TEMPLATE BY ALVAREZ - POWERED BY ADAM SMITH @ 2020]########################################
#                                                                                                                       #
#																														#
#																														#
#            All right reserved to the respective owners. Full template can be downloaded from the developer website	#
#            PHP Codes modified and developed by Adam Smith 2020. Contact me for more details							#
#            jasc.studio66@gmail.com																					#
#																														#
#########################################################################################################################*/

//Dapatkan rekod pengguna yang sedang login
$dataSQL=mysqli_query($con,"SELECT * from tbl_user where userid='$_SESSION[userid]'") or die (mysqli_error($con));	
$showDataSQL=mysqli_fetch_array($dataSQL)or die (mysqli_error($con));	
$Bil_DataSQL=mysqli_num_rows($dataSQL)or die (mysqli_error($con));	


?>