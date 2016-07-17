<?php
require('./db/Conexao.class.php');

$id = isset($_POST['id_cliente']) ? $_POST['id_cliente'] : '';

$nome = $_POST['fname'];
$email = $_POST['email'];
$cpf_cnpj = $_POST['cpf_cnpj'];
$telefone = $_POST['phone'];
$celular = $_POST['celular'];
$celular2 = $_POST['celular2'];
$celular3 = $_POST['celular3'];
$endereco = $_POST['endereco'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$cep = $_POST['cep'];
$referencia = $_POST['referencia'];
$observacao = $_POST['observacao'];

   try {
      $conn = Conexao::getInstace();

      $sql = "update tb_cliente
            set
            nome = '{$nome}',
            email = '{$email}',
            telefone = '{$telefone}',
            celular = '{$celular}',
            celular2 = '{$celular2}',
            celular3 = '{$celular3}',
            endereco = '{$endereco}',
            dt_alteracao = now(),
            bairro = '{$bairro}',
            cidade = '{$cidade}',
            estado = '{$estado}',
            cep = '{$cep}',
            referencia = '{$referencia}',
            observacao = '{$observacao}',
            cpf_cnpj = '{$cpf_cnpj}'
            where id_cliente = {$id}";

      $q = mysqli_query($conn, $sql);

      if($q){
         echo "Alteração realizada com sucesso!";
         echo "<meta HTTP-EQUIV='refresh' CONTENT='2;URL=/detalhes.php?id={$id}'>";
      }

   } catch (Exception $e) {
      echo $e;
   }

   
?>