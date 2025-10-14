<?php 
require_once("../../../conexao.php");

$id = $_POST['id'];

$pdo->query("UPDATE itens_pedidos SET status = 'Pronto' WHERE id = '$id'");


echo 'Baixado com Sucesso!';
?>