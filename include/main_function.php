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

//################### [coding pendaftaran pengguna ###############################
function daftar ($user,$pwd,$pwd2,$name,$email,$photo,$con,$photoinfo)
{

//periksa sama ada pengguna telah wujud
$daftarSQL=mysqli_query($con,"SELECT username from tbl_user where username='$user'") or die (mysqli_error($con));	
$bil_rekod_daftar=mysqli_num_rows($daftarSQL);


	if ($pwd<>$pwd2)
	echo '<strong>Status!</strong> Password did not match. Click <a href="register.php">here</a> to try again.';
						
	

	elseif ($bil_rekod_daftar==0)
	{
	//secure the password
	$pwd=md5($pwd);
	
	//save the profile picture to blob
	$imageFileType = strtolower(pathinfo($photo,PATHINFO_EXTENSION)); //dapatkan jenis gambar
	$imgData =addslashes(file_get_contents($photoinfo));
	$imageProperties = getimageSize($photoinfo);
	
	
	
	mysqli_query($con,"INSERT INTO tbl_user (username,pwd,name,email,picture,pictype) values ('$user','$pwd','$name','$email','{$imgData}','{$imageProperties['mime']}')") or die (mysqli_error($con));
	
	echo '<strong>Status!</strong> New user account created. Click <a href="index.php">here</a> to login';
	
	
	
	
	
		
	}
	else
	{
		//sekiranya rekod telah wujud
		
		
		echo '
						  <strong>Status!</strong> Username already exists. Click <a href="register.php">here</a> to try again.
						';
		
		
		
		
	}
	
	
}


//######################################[T A M A T]######################################################



//###############################[Coding Login - Mula]#############################################################

function login ($user,$pwd,$con)
{

//periksa sama ada pengguna telah wujud
$pwd=md5($pwd);
$loginSQL=mysqli_query($con,"SELECT username,pwd,userid from tbl_user where username='$user' and pwd='$pwd'") or die (mysqli_error($con));	
$bil_rekod_login=mysqli_num_rows($loginSQL);
$papar_rekod_login=mysqli_fetch_array($loginSQL);

	

	if ($bil_rekod_login==0)
	{
	//secure the password
		echo '<div class="alert alert-danger alert-dismissable">
						  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						  <strong>Status</strong> Wrong username or password!
						</div>'    ;
	
	
	}
	else
	{
		//sekiranya rekod telah wujud
	//session_start();
	$_SESSION["userid"]=$papar_rekod_login['userid'];
	header ("location: index2.php");	
		
		echo '
						  <strong>Status!</strong> Login accepted. Redirecting....
						';
		
		
		
		
	}
	
	
}

//######################################[T A M A T]######################################################




//######################################MULA - BUAT NMBR RANDOM]######################################################
function getPwd($n) { 
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
    $randomString = ''; 
  
    for ($i = 0; $i < $n; $i++) { 
        $index = rand(0, strlen($characters) - 1); 
        $randomString .= $characters[$index]; 
    } 
  
    return $randomString; 
} 



?>