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

$dataSetting=mysqli_query($con,"SELECT * from tbl_setting where setid='1'") or die (mysqli_error($con));	
$showSetting=mysqli_fetch_array($dataSetting)or die (mysqli_error($con));	


$web_title=$showSetting['title'];
$web_title2=$showSetting['abbre'];
$keywords=$showSetting['key1'];
$copyright=date("Y"). $showSetting['copyright'];;

//SMTP 
$smtp_user=$showSetting['smtp_user'];
$smtp_pwd=$showSetting['smtp_pwd'];
$smtp_host=$showSetting['smtp_host'];
$smtp_name=$showSetting['smtp_name'];
$smtp_email=$showSetting['smtp_email'];
$smtp_port=$showSetting['smtp_port'];
$smtp_mode=$showSetting['smtp_mode'];
$smtp_auth=$showSetting['smtp_auth'];
$logo=$showSetting['logo'];

?>