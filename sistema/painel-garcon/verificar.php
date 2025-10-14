<?php 
@session_start();

if(@$_SESSION['nivel'] != 'Garçon'){
	echo "<script language='javascript'> window.location='../' </script>";

	exit();
}
 ?>
