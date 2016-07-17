<?php
require('../model/db/Conexao.class.php');

$desc_img = $_GET['img'];

$conn = Conexao::getInstace();

$link = "../uploads/{$desc_img}";

echo $link;

$query = "delete from tb_imagem where descricao = '{$desc_img}'";

$q = mysqli_query($conn, $query);

unlink("../uploads/{$desc_img}");

if($q){
	echo "Removido com sucesso!";
}else{
	echo "Ocorreu algum problema para remover a imagem!";
}
