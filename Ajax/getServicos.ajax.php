<?php
require('../model/db/Conexao.class.php');


$conn = Conexao::getInstace();

$query = "select * from tipo_servico";
$q = mysqli_query($conn, $query);

$dados = array();
$i = 0;

while($t = mysqli_fetch_assoc($q)){

    $dados[$i] = $t;
    $i ++;
}

print_r(json_encode($dados));

