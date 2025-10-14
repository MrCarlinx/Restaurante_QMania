<?php 
require_once("conexao.php");

$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$data = $_POST['data'];
$pessoas = $_POST['pessoas'];
$mensagem = $_POST['mensagem'];

$data = implode('/', array_reverse(explode('-', $data)));

$destinatario = $email_adm;
$assunto = 'Nova Reserva';
$mensagem = 'Nome: '.$nome. "\r\n"."\r\n" .'Telefone: '.$telefone. "\r\n"."\r\n" .'Email: '.$email. "\r\n"."\r\n" .'Data Reserva: '.$data. "\r\n"."\r\n" .'Nº Pessoas: '.$pessoas. "\r\n"."\r\n" .'Mensagem: '.$mensagem;
$cabecalhos = "From: ".$email;
mail($destinatario, $assunto, $mensagem, $cabecalhos);


//SALVAR NA TABELA DE RESERVAS EMAIL
$data_post = $_POST['data'];
$mensagem_post = $_POST['mensagem'];
$query = $pdo->prepare("INSERT INTO reservas_email SET nome = :nome, email = :email, telefone = :telefone, pessoas = :pessoas, mensagem = :mensagem, data = :data, reservado = 'Não'");

$query->bindValue(":nome", "$nome");
$query->bindValue(":email", "$email");
$query->bindValue(":telefone", "$telefone");
$query->bindValue(":pessoas", "$pessoas");
$query->bindValue(":mensagem", "$mensagem_post");
$query->bindValue(":data", "$data_post");
$query->execute();

//CADASTRAR O CLIENTE
$query = $pdo->query("SELECT * FROM clientes where email = '$email'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if(@count($res) == 0){
	$query = $pdo->prepare("INSERT INTO clientes SET nome = :nome, email = :email, telefone = :telefone");

$query->bindValue(":nome", "$nome");
$query->bindValue(":email", "$email");
$query->bindValue(":telefone", "$telefone");

$query->execute();
}



 ?>

<script>alert('Enviado com Sucesso.'); </script>

<meta http-equiv="refresh" content="0; url=index.php#mu-reservation">
