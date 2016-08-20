<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

require('./db/Conexao.class.php');
//require('../WideImage/lib/WideImage.php');

$osmanual = isset($_POST['osmanual']) ? $_POST['osmanual'] : '';
$nome_cliente = isset($_POST['nome_cliente']) ? $_POST['nome_cliente'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$telefone = isset($_POST['telefone']) ? $_POST['telefone'] : '';
$celular = isset($_POST['celular']) ? $_POST['celular'] : '';
$idade = isset($_POST['idade']) ? $_POST['idade'] : '';
$data_venda = isset($_POST['data_venda']) ? $_POST['data_venda'] : '';
//if($data_venda != ''){$data_venda = explode('/', $data_venda); $data_venda = $data_venda[2].'-'.$data_venda[1].'-'.$data_venda[0];}

$data_retirada = isset($_POST['data_retirada']) ? $_POST['data_retirada'] : '';
//if($data_retirada != ''){$data_retirada = explode('/', $data_retirada); $data_retirada = $data_retirada[2].'-'.$data_retirada[1].'-'.$data_retirada[0];}


$armacao = isset($_POST['armacao']) ? $_POST['armacao'] : '';
$lente = isset($_POST['lente']) ? $_POST['lente'] : '';
$grau_longe_od = isset($_POST['grau_longe_od']) ? $_POST['grau_longe_od'] : '';
$grau_longe_oe = isset($_POST['grau_longe_oe']) ? $_POST['grau_longe_oe'] : '';
$grau_perto_od = isset($_POST['grau_perto_od']) ? $_POST['grau_perto_od'] : '';
$grau_perto_oe = isset($_POST['grau_perto_oe']) ? $_POST['grau_perto_oe'] : '';

$tipo_armacao = isset($_POST['tipo_armacao']) ? $_POST['tipo_armacao'] : '';
$atraves = isset($_POST['atraves']) ? $_POST['atraves'] : '';

$dp = isset($_POST['dp']) ? $_POST['dp'] : '';
$altura = isset($_POST['altura']) ? $_POST['altura'] : '';

$forma_pagamento = isset($_POST['forma_pagamento']) ? $_POST['forma_pagamento'] : '';
$valor = ($_POST['valor'] == '') ? 0 : $_POST['valor'];
$valor = str_replace(',','.',str_replace('.','',$valor));

$endereco = isset($_POST['endereco']) ? $_POST['endereco'] : '';
$bairro = isset($_POST['bairro']) ? $_POST['bairro'] : '';
$vendedor = isset($_POST['vendedor']) ? $_POST['vendedor'] : '';

$observacao = isset($_POST['observacao']) ? $_POST['observacao'] : '';

$conn = Conexao::getInstace();

$sqlOS = "select * from ordem_servico where os_manual = '{$osmanual}'";

$qOs = mysqli_query($conn, $sqlOS);

if($qOs->num_rows > 0){

      echo "OS já cadastrada!";
      echo "<meta HTTP-EQUIV='refresh' CONTENT='2;URL=/cadastrarServico.php'>";

   exit;

}



$sql = "insert into ordem_servico(
   data_venda, data_retirada, nome, idade, armacao, lente, grau_longe_od, grau_longe_oe, 
   grau_perto_od, grau_perto_oe, valor, forma_pagamento, observacao, email, telefone, celular, 
   data_cadastro, os_manual, tipo_armacao, atraves_de, dp, altura, endereco, bairro, vendedor
)values(
   '{$data_venda}', '{$data_retirada}', '{$nome_cliente}', '{$idade}', '{$armacao}', '{$lente}',
   '{$grau_longe_od}', '{$grau_longe_oe}', '{$grau_perto_od}', '{$grau_perto_oe}', '{$valor}', '{$forma_pagamento}',
   '{$observacao}', '{$email}', '{$telefone}', '{$celular}', now(), '{$osmanual}', '{$tipo_armacao}', '{$atraves}',
   '{$dp}', '{$altura}', '{$endereco}', '{$bairro}', '{$vendedor}'
)";


try {

      $q = mysqli_query($conn, $sql);

      $returnId = mysqli_insert_id($conn);

      echo "cadastro realizado com sucesso!";
      echo "<meta HTTP-EQUIV='refresh' CONTENT='2;URL=/detalhesServico.php?id={$returnId}'>";
   
} catch (Exception $e) {
   print_r($e);
}





?>