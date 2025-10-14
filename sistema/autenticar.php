<?php 
require_once("../conexao.php");
@session_start();
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$query = $pdo->prepare("SELECT * FROM usuarios WHERE (email = :usuario or cpf = :usuario) and senha = :senha");
$query->bindValue(":usuario", "$usuario");
$query->bindValue(":senha", "$senha");
$query->execute();

$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){
	$_SESSION['nome'] = $res[0]['nome'];
	$_SESSION['email'] = $res[0]['email'];
	$_SESSION['cpf'] = $res[0]['cpf'];
	$_SESSION['nivel'] = $res[0]['nivel'];
	$_SESSION['id'] = $res[0]['id'];

	//REDIRECIONAR O USUÁRIO CONFORME O NÍVEL
	if($res[0]['nivel'] == 'Administrador'){
		echo "<script language='javascript'> window.location='painel-admin' </script>";
	}

	if($res[0]['nivel'] == 'Chef'){
		echo "<script language='javascript'> window.location='painel-chef' </script>";
	}

	if($res[0]['nivel'] == 'Recepcionista'){
		echo "<script language='javascript'> window.location='painel-recep' </script>";
	}


	if($res[0]['nivel'] == 'Garçon'){
		echo "<script language='javascript'> window.location='painel-garcon' </script>";
	}

	if($res[0]['nivel'] == 'Tela'){
		echo "<script language='javascript'> window.location='painel-tela' </script>";
	}



}else{
	echo "<script language='javascript'>window.alert('Dados Incorretos!')</script>";

	echo "<script language='javascript'>window.location='index.php'</script>";
}


 ?>