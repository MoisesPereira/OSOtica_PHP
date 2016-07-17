<?php
require('./db/Conexao.class.php');
require('../config.php');

$getUrl = URL;


$nome = isset($_POST['fname']) ? $_POST['fname'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$cpf_cnpj = isset($_POST['cpf_cnpj']) ? $_POST['cpf_cnpj'] : '';
$telefone = isset($_POST['phone']) ? $_POST['phone'] : '';
$celular = isset($_POST['celular']) ? $_POST['celular'] : '';
$celular2 = isset($_POST['celular2']) ? $_POST['celular2'] : '';
$celular3 = isset($_POST['celular3']) ? $_POST['celular3'] : '';
$endereco = isset($_POST['endereco']) ? $_POST['endereco'] : '';
$bairro = isset($_POST['bairro']) ? $_POST['bairro'] : '';
$cidade = isset($_POST['cidade']) ? $_POST['cidade'] : '';
$estado = isset($_POST['estado']) ? $_POST['estado'] : '';
$bairro = isset($_POST['bairro']) ? $_POST['bairro'] : '';
$cidade = isset($_POST['cidade']) ? $_POST['cidade'] : '';
$cep = isset($_POST['cep']) ? $_POST['cep'] : '';
$referencia = isset($_POST['referencia']) ? $_POST['referencia'] : '';
$observacao = isset($_POST['observacao']) ? $_POST['observacao'] : '';


      try {
         $conn = Conexao::getInstace();

         $sql = "insert into tb_cliente (nome, email, telefone, celular, celular2, celular3, endereco, dt_cadastro,
         bairro, cidade, estado, cep, referencia, observacao, cpf_cnpj) values ('{$nome}', '{$email}', '{$telefone}', '{$celular}', '{$celular2}',
         '{$celular3}', '{$endereco}', now(), '{$bairro}', '{$cidade}', '{$estado}', '{$cep}', '{$referencia}', '{$observacao}', '{$cpf_cnpj}' );";

         $q = mysqli_query($conn, $sql);

          if($q){
            echo "cadastro realizado com sucesso!";

            echo "<meta http-equiv='refresh' content='2;url={$getUrl}listagemClientes.php'/>";
         }
      } catch (Exception $e) {
         die($e);
      }

   
?>