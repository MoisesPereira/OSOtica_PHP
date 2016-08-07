<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require('./db/Conexao.class.php');


$id = isset($_POST['id']) ? $_POST['id'] : '';
$nome = isset($_POST['nome_cliente']) ? $_POST['nome_cliente'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$telefone = isset($_POST['telefone']) ? $_POST['telefone'] : '';
$celular = isset($_POST['celular']) ? $_POST['celular'] : '';
$idade = isset($_POST['idade']) ? $_POST['idade'] : '';
$data_venda = isset($_POST['data_venda']) ? $_POST['data_venda'] : '';
$data_retirada = isset($_POST['data_retirada']) ? $_POST['data_retirada'] : '';
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

//print_r('condluido');
//print_r($concluido);


$sql = "update ordem_servico
         set
         nome = '{$nome}',
         email = '{$email}',
         telefone = '{$telefone}',
         celular = '{$celular}',
         idade = '{$idade}',
         data_venda = '{$data_venda}',
         data_retirada = '{$data_retirada}',
         armacao = '{$armacao}',
         lente = '{$lente}',
         grau_longe_od = '{$grau_longe_od}',
         grau_longe_oe = '{$grau_longe_oe}',
         grau_perto_od = '{$grau_perto_od}',
         grau_perto_oe = '{$grau_perto_oe}',
         forma_pagamento = '{$forma_pagamento}',
         valor = '{$valor}',
         concluido = '{$concluido}',
         observacao = '{$observacao}'
         where id = {$id}";



$conn = Conexao::getInstace();
$q = mysqli_query($conn, $sql);


            try {

               $q = mysqli_query($conn, $sql);

               if($q){
                  echo "Alterado com sucesso!";
                  echo "<meta HTTP-EQUIV='refresh' CONTENT='2;URL=/detalhesServico.php?id={$id}'>";
               }
               
            } catch (Exception $e) {
               
               print_r($e);
            }
            
         

      

?>