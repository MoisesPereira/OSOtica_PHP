<?php
require('../model/db/Conexao.class.php');

$nome = $_GET['nome'];
$email = $_GET['email'];
$celular = $_GET['celular'];

get($nome, $email, $celular);

function get($nome, $email, $celular){

	$conn = Conexao::getInstace();

	$qnome = ($nome != '')  ? "and nome like '%{$nome}%' " : '';
	$qemail = ($email != '') ? "and email like '%{$email}%' " : '';
	$qcelular = ($celular != '') ? "and celular like '%{$celular}%' " : '';

	$query = "select * from tb_cliente where 1 = 1 {$qnome} {$qemail} {$qcelular}";

    $q = mysqli_query($conn, $query);

    $dados = array();
    $i = 0;

    while($t = mysqli_fetch_assoc($q)){

        $dados[$i] = $t;
        $i ++;
    }

    print_r(json_encode($dados));

}