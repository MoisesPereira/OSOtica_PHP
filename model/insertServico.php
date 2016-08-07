<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require('./db/Conexao.class.php');
//require('../WideImage/lib/WideImage.php');

$nome_cliente = isset($_POST['nome_cliente']) ? $_POST['nome_cliente'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$telefone = isset($_POST['telefone']) ? $_POST['telefone'] : '';
$celular = isset($_POST['celular']) ? $_POST['celular'] : '';
$idade = isset($_POST['idade']) ? $_POST['idade'] : '';
$data_venda = isset($_POST['data_venda']) ? $_POST['data_venda'] : '';
if($data_venda != ''){$data_venda = explode('/', $data_venda); $data_venda = $data_venda[2].'-'.$data_venda[1].'-'.$data_venda[0];}

$data_retirada = isset($_POST['data_retirada']) ? $_POST['data_retirada'] : '';
if($data_retirada != ''){$data_retirada = explode('/', $data_retirada); $data_retirada = $data_retirada[2].'-'.$data_retirada[1].'-'.$data_retirada[0];}

$armacao = isset($_POST['armacao']) ? $_POST['armacao'] : '';
$lente = isset($_POST['lente']) ? $_POST['lente'] : '';
$grau_longe_od = isset($_POST['grau_longe_od']) ? $_POST['grau_longe_od'] : '';
$grau_longe_oe = isset($_POST['grau_longe_oe']) ? $_POST['grau_longe_oe'] : '';
$grau_perto_od = isset($_POST['grau_perto_od']) ? $_POST['grau_perto_od'] : '';
$grau_perto_oe = isset($_POST['grau_perto_oe']) ? $_POST['grau_perto_oe'] : '';
$forma_pagamento = isset($_POST['forma_pagamento']) ? $_POST['forma_pagamento'] : '';
$valor = isset($_POST['valor']) ? $_POST['valor'] : '';
$concluido = isset($_POST['concluido']) ? $_POST['concluido'] : '';
$observacao = isset($_POST['observacao']) ? $_POST['observacao'] : '';

$conn = Conexao::getInstace();

$sql = "insert into ordem_servico(
   data_venda, data_retirada, nome, idade, armacao, lente, grau_longe_od, grau_longe_oe, 
   grau_perto_od, grau_perto_oe, valor, forma_pagamento, observacao, concluido, email, telefone, celular, data_cadastro
)values(
   '{$data_venda}', '{$data_retirada}', '{$nome_cliente}', '{$idade}', '{$armacao}', '{$lente}',
   '{$grau_longe_od}', '{$grau_longe_oe}', '{$grau_perto_od}', '{$grau_perto_oe}', '{$valor}', '{$forma_pagamento}',
   '{$observacao}', '{$concluido}', '{$email}', '{$telefone}', '{$celular}', now()
)";


try {

      $q = mysqli_query($conn, $sql);

      $returnId = mysqli_insert_id($conn);
   
} catch (Exception $e) {
   print_r($e);
}


echo "cadastro realizado com sucesso!";
echo "<meta HTTP-EQUIV='refresh' CONTENT='2;URL=/detalhesServico.php?id={$returnId}'>";


?>