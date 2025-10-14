<?php 
@session_start();

if(@$_SESSION['nivel'] != 'Tela' and @$_SESSION['nivel'] != 'Admin'){
	echo "<script language='javascript'> window.location='../' </script>";

	exit();
}
 ?>
